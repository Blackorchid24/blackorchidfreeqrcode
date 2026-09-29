<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class QrCodeController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please sign in first.');
        }

        $userId = $user->id;

        $qrCodes = QrCode::where('user_id', $userId)
            ->latest()
            ->paginate(8);

        $total = QrCode::where('user_id', $userId)
            ->count();

        return view(
            'client.dashboard',
            compact(
                'user',
                'qrCodes',
                'total'
            )
        );
    }

    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please sign in first.');
        }

        $userId = $user->id;

        $qrCodes = QrCode::where('user_id', $userId)
            ->latest()
            ->paginate(10);

        return view(
            'client.qr-generator',
            compact('qrCodes')
        );
    }

    public function download(QrCode $qrCode)
    {
        abort_unless($qrCode->user_id === auth()->id(), 403);

        $path = storage_path(
            'app/public/qrcodes/' .
            $qrCode->user_id .
            '/' .
            $qrCode->filename
        );

        abort_unless(file_exists($path), 404);

        return response()->download(
            $path,
            $qrCode->filename,
            [
                'Content-Type' => mime_content_type($path) ?: 'image/png',
            ]
        );
    }

    public function store(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please sign in first.');
        }

        $data = $request->validate([
            'url' => [
                'required',
                'url',
                'max:2000',
            ],
            'title' => [
                'nullable',
                'string',
                'max:100',
            ],
            'logo' => [
                'nullable',
                'image',
                'mimes:png,jpg,jpeg,webp',
                'max:2048',
            ],
            'size' => [
                'required',
                'integer',
                'min:180',
                'max:1000',
            ],
            'margin' => [
                'required',
                'integer',
                'min:0',
                'max:50',
            ],
            'foreground' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],
            'background' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],
        ]);

        $userId = $user->id;

        $base = 'qrcodes/' . $userId;

        Storage::disk('public')->makeDirectory($base);

        $filename = 'qr_' . uniqid() . '.png';

        $qrPath = Storage::disk('public')->path(
            $base . '/' . $filename
        );

        $foreground = $this->hexRgb(
            $data['foreground']
        );

        $background = $this->hexRgb(
            $data['background']
        );

        $foregroundColor = new Color(
            $foreground[0],
            $foreground[1],
            $foreground[2]
        );

        $backgroundColor = new Color(
            $background[0],
            $background[1],
            $background[2]
        );

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($data['url'])
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(
                ErrorCorrectionLevel::High
            )
            ->size($data['size'])
            ->margin($data['margin'])
            ->foregroundColor($foregroundColor)
            ->backgroundColor($backgroundColor)
            ->build();

        $result->saveToFile($qrPath);

        $logoFilename = null;

        if ($request->hasFile('logo')) {
            $manager = new ImageManager(
                new Driver()
            );

            $qrImage = $manager->read($qrPath);

            $logoSize = max(
                40,
                (int) ($data['size'] * 0.20)
            );

            $circularLogoPath = $this->createCircularLogo(
                $request
                    ->file('logo')
                    ->getRealPath(),
                $logoSize
            );

            $circularLogo = $manager->read(
                $circularLogoPath
            );

            $x = (int) (
                ($data['size'] - $logoSize) / 2
            );

            $y = (int) (
                ($data['size'] - $logoSize) / 2
            );

            $qrImage->place(
                $circularLogo,
                'top-left',
                $x,
                $y
            );

            $qrImage
                ->toPng()
                ->save($qrPath);

            $logoFilename =
                'logo_' . uniqid() . '.png';

            $logoPath =
                Storage::disk('public')->path(
                    $base . '/' . $logoFilename
                );

            copy(
                $circularLogoPath,
                $logoPath
            );

            if (file_exists($circularLogoPath)) {
                unlink($circularLogoPath);
            }
        }

        QrCode::create([
            'user_id' => $userId,
            'title' => $data['title'] ?? null,
            'url' => $data['url'],
            'filename' => $filename,
            'logo_filename' => $logoFilename,
            'size' => $data['size'],
            'margin' => $data['margin'],
            'foreground' => $data['foreground'],
            'background' => $data['background'],
        ]);

        return redirect()
            ->route('qr.generator')
            ->with(
                'success',
                'QR Code generated successfully.'
            );
    }

    private function createCircularLogo(
        string $sourcePath,
        int $size
    ): string {
        $imageInfo = getimagesize($sourcePath);

        if (!$imageInfo) {
            throw new \RuntimeException(
                'Unable to read the uploaded logo.'
            );
        }

        $mime = $imageInfo['mime'];

        switch ($mime) {
            case 'image/png':
                $source = imagecreatefrompng($sourcePath);
                break;

            case 'image/jpeg':
                $source = imagecreatefromjpeg($sourcePath);
                break;

            case 'image/webp':
                $source = imagecreatefromwebp($sourcePath);
                break;

            default:
                throw new \RuntimeException(
                    'Unsupported logo image format.'
                );
        }

        if (!$source) {
            throw new \RuntimeException(
                'Unable to process the uploaded logo.'
            );
        }

        imagealphablending($source, true);
        imagesavealpha($source, true);

        $sourceWidth = imagesx($source);
        $sourceHeight = imagesy($source);

        $squareSize = min(
            $sourceWidth,
            $sourceHeight
        );

        $sourceX = (int) (
            ($sourceWidth - $squareSize) / 2
        );

        $sourceY = (int) (
            ($sourceHeight - $squareSize) / 2
        );

        $canvas = imagecreatetruecolor(
            $size,
            $size
        );

        imagealphablending(
            $canvas,
            false
        );

        imagesavealpha(
            $canvas,
            true
        );

        $transparent = imagecolorallocatealpha(
            $canvas,
            0,
            0,
            0,
            127
        );

        imagefill(
            $canvas,
            0,
            0,
            $transparent
        );

        $logo = imagecreatetruecolor(
            $size,
            $size
        );

        imagealphablending(
            $logo,
            false
        );

        imagesavealpha(
            $logo,
            true
        );

        $logoTransparent = imagecolorallocatealpha(
            $logo,
            0,
            0,
            0,
            127
        );

        imagefill(
            $logo,
            0,
            0,
            $logoTransparent
        );

        imagecopyresampled(
            $logo,
            $source,
            0,
            0,
            $sourceX,
            $sourceY,
            $size,
            $size,
            $squareSize,
            $squareSize
        );

        imagealphablending(
            $canvas,
            true
        );

        imagecopy(
            $canvas,
            $logo,
            0,
            0,
            0,
            0,
            $size,
            $size
        );

        $temporaryPath = tempnam(
            sys_get_temp_dir(),
            'blackorchid_logo_'
        ) . '.png';

        imagealphablending(
            $canvas,
            false
        );

        imagesavealpha(
            $canvas,
            true
        );

        imagepng(
            $canvas,
            $temporaryPath,
            6
        );

        imagedestroy($source);
        imagedestroy($logo);
        imagedestroy($canvas);

        return $temporaryPath;
    }

    public function destroy(
        Request $request,
        $id
    ) {
        $user = $request->user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please sign in first.');
        }

        $userId = $user->id;

        $qrCode = QrCode::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $base = 'qrcodes/' . $userId;

        Storage::disk('public')->delete(
            $base . '/' . $qrCode->filename
        );

        if ($qrCode->logo_filename) {
            Storage::disk('public')->delete(
                $base . '/' . $qrCode->logo_filename
            );
        }

        $qrCode->delete();

        return back()->with(
            'success',
            'QR Code deleted successfully.'
        );
    }

    private function hexRgb(
        string $hex
    ): array {
        $hex = ltrim($hex, '#');

        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }
}
