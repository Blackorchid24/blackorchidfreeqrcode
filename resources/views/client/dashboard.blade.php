<x-layouts.client>

    <x-slot name="title">
        Blackorchid Free QR Code
    </x-slot>

    <x-slot name="heading">
        Dashboard
    </x-slot>

    <div class="grid grid-cols-1 gap-4 sm:gap-5 md:grid-cols-3">

        <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-5 sm:p-6">
            <div class="flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-xs text-slate-500 sm:text-sm">
                        Total QR codes
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-blue-300 sm:text-md">
                        {{ $total }}
                    </p>
                </div>

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-qrcode text-lg sm:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-5 sm:p-6">
            <div class="flex items-center justify-between gap-4">

                <div class="min-w-0 flex-1">
                    <p class="text-xs text-slate-500 sm:text-sm">
                        Account
                    </p>

                    <p class="mt-2 truncate text-base font-semibold text-blue-300 sm:text-md">
                        {{ $user->email }}
                    </p>
                </div>

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-user text-base sm:text-lg"></i>
                </div>

            </div>
        </div>

        <div class="rounded-2xl border border-violet-500/20 bg-violet-500/10 p-5 sm:p-6">

            <div class="flex items-center justify-between gap-4">

                <div class="min-w-0">
                    <p class="text-sm text-violet-300">
                        Create something
                    </p>

                    <a href="{{ route('qr.generator') }}"
                        class="mt-3 inline-flex items-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-violet-500 active:scale-[0.98]">
                        <i class="fa-solid fa-plus"></i>
                        Generate QR
                    </a>
                </div>

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-violet-500/20 text-violet-300 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-wand-magic-sparkles text-base sm:text-lg"></i>
                </div>

            </div>

        </div>

    </div>

    <div class="mt-6 rounded-2xl border border-white/10 bg-white/[0.03] p-4 sm:mt-8 sm:p-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex min-w-0 items-center gap-3">

                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>

                <div class="min-w-0">
                    <h2 class="font-semibold text-white">
                        Recent QR codes
                    </h2>

                    <p class="text-xs text-slate-500">
                        Your recently generated QR images
                    </p>
                </div>

            </div>

            <a href="{{ route('qr.generator') }}"
                class="inline-flex w-fit items-center gap-2 text-sm text-violet-400 transition hover:text-violet-300">

                <i class="fa-solid fa-plus"></i>

                <span class="hidden sm:inline">
                    Create QR
                </span>

                <span class="sm:hidden">
                    Create
                </span>

            </a>

        </div>

        <div class="mt-5 grid gap-3">

            @forelse($qrCodes as $qr)
                @php
                    $qrPath = 'qrcodes/' . $user->id . '/' . $qr->filename;

                    $qrImage = asset('storage/' . $qrPath);

                    $qrExists = \Illuminate\Support\Facades\Storage::disk('public')->exists($qrPath);

                    $qrTitle = $qr->title ?: 'Untitled QR Code';
                @endphp

                <div
                    class="group flex flex-col gap-4 rounded-2xl border border-white/5 bg-black/20 p-4 transition hover:border-violet-500/30 hover:bg-white/[0.03] sm:flex-row sm:items-center">

                    <button type="button"
                        onclick="openQrPreview(
                        @js($qrImage),
                        @js($qrTitle),
                        @js($qr->url)
                    )"
                        class="group/qr relative mx-auto flex h-28 w-28 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-white/10 bg-transparent p-1 shadow-lg transition hover:scale-[1.03] hover:border-violet-500/40 sm:mx-0 sm:h-24 sm:w-24">

                        <img src="{{ $qrImage }}" alt="QR Code for {{ $qrTitle }}"
                            class="block h-full w-full object-contain" loading="lazy">

                        <div
                            class="absolute inset-0 flex items-center justify-center bg-black/0 transition group-hover/qr:bg-black/40">

                            <i
                                class="fa-solid fa-expand text-xl text-white opacity-0 transition group-hover/qr:opacity-100">
                            </i>

                        </div>

                    </button>

                    <div class="min-w-0 flex-1 text-center sm:text-left">

                        <div class="flex items-center justify-center gap-2 sm:justify-start">

                            <i class="fa-solid fa-qrcode shrink-0 text-sm text-violet-400"></i>

                            <p class="max-w-full truncate font-medium text-white">
                                {{ $qrTitle }}
                            </p>

                        </div>

                        <div class="mt-2 flex min-w-0 items-start justify-center gap-2 sm:justify-start">

                            <i class="fa-solid fa-link mt-1 shrink-0 text-xs text-slate-600"></i>

                            <p class="min-w-0 break-all text-sm text-slate-500 sm:truncate">
                                {{ $qr->url }}
                            </p>

                        </div>

                        <div
                            class="mt-2 flex items-center justify-center gap-2 text-xs text-slate-600 sm:justify-start">

                            <i class="fa-regular fa-clock"></i>

                            <span>
                                {{ $qr->created_at?->format('M d, Y h:i A') }}
                            </span>

                        </div>

                    </div>

                    <div class="flex w-full shrink-0 gap-2 sm:w-auto">

                        <button type="button"
                            onclick="openQrPreview(
                            @js($qrImage),
                            @js($qrTitle),
                            @js($qr->url)
                        )"
                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg border border-white/10 px-3 py-2.5 text-sm text-slate-300 transition hover:border-violet-500/30 hover:bg-violet-500/10 hover:text-white sm:flex-none">

                            <i class="fa-solid fa-eye"></i>

                            <span>
                                View
                            </span>

                        </button>

                        <a href="{{ $qrImage }}" download
                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg bg-violet-600 px-3 py-2.5 text-sm font-medium text-white transition hover:bg-violet-500 active:scale-[0.98] sm:flex-none">

                            <i class="fa-solid fa-download"></i>

                            <span>
                                Download
                            </span>

                        </a>

                    </div>

                </div>

            @empty

                <div class="py-10 text-center">

                    <div
                        class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 text-slate-600">

                        <i class="fa-solid fa-qrcode text-xl"></i>

                    </div>

                    <p class="mt-4 text-sm text-slate-500">
                        No QR codes yet.
                    </p>

                    <a href="{{ route('qr.generator') }}"
                        class="mt-4 inline-flex items-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-violet-500">

                        <i class="fa-solid fa-plus"></i>

                        Create your first QR

                    </a>

                </div>
            @endforelse

        </div>

    </div>

    <div id="qrPreviewModal"
        class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/80 p-3 backdrop-blur-sm sm:p-4"
        onclick="closeQrPreview(event)">

        <div class="relative my-auto max-h-[95vh] w-full max-w-lg overflow-y-auto rounded-2xl border border-white/10 bg-[#0d0b14] shadow-2xl shadow-black/50 sm:rounded-3xl"
            onclick="event.stopPropagation()">

            <div
                class="sticky top-0 z-10 flex items-center justify-between border-b border-white/10 bg-[#0d0b14]/95 px-4 py-3 backdrop-blur sm:px-5 sm:py-4">

                <div class="flex min-w-0 items-center gap-3">

                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400 sm:h-10 sm:w-10">

                        <i class="fa-solid fa-qrcode"></i>

                    </div>

                    <div class="min-w-0">

                        <h3 id="qrPreviewTitle" class="truncate text-sm font-semibold text-white sm:text-base">
                            QR Code
                        </h3>

                        <p class="text-xs text-slate-500">
                            QR Code Preview
                        </p>

                    </div>

                </div>

                <button type="button" onclick="closeQrPreview()"
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-slate-500 transition hover:bg-white/5 hover:text-white">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            <div class="p-4 sm:p-6">

                <div class="flex justify-center">

                    <div
                        class="flex w-full max-w-[360px] items-center justify-center rounded-2xl bg-transparent p-3 shadow-2xl sm:p-4">

                        <div id="qrPreviewLoading"
                            class="flex aspect-square w-full max-w-[300px] items-center justify-center sm:max-w-[320px]">

                            <i class="fa-solid fa-spinner fa-spin text-3xl text-violet-500"></i>

                        </div>

                        <img id="qrPreviewImage" src="" alt="QR Code Preview"
                            class="hidden aspect-square w-full max-w-[300px] object-contain sm:max-w-[320px]">

                        <div id="qrPreviewError"
                            class="hidden aspect-square w-full max-w-[300px] flex-col items-center justify-center gap-3 px-4 text-center sm:max-w-[320px]">

                            <i class="fa-solid fa-image text-4xl text-slate-400"></i>

                            <div>

                                <p class="font-semibold text-slate-700">
                                    Image unavailable
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    The QR image could not be loaded.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="mt-4 rounded-xl border border-white/10 bg-white/[0.03] p-3 sm:mt-5 sm:p-4">

                    <div class="flex items-start gap-3">

                        <i class="fa-solid fa-link mt-1 shrink-0 text-violet-400"></i>

                        <p id="qrPreviewUrl" class="min-w-0 break-all text-xs leading-5 text-slate-400 sm:text-sm">
                        </p>

                    </div>

                </div>

                <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:gap-3">

                    <a id="qrPreviewDownload" href="#" download
                        class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-violet-500">

                        <i class="fa-solid fa-download"></i>

                        Download PNG

                    </a>

                    <a id="qrPreviewOpen" href="#" target="_blank" rel="noopener"
                        class="flex items-center justify-center gap-2 rounded-xl border border-white/10 px-4 py-3 text-slate-300 transition hover:bg-white/5 hover:text-white sm:w-14">

                        <i class="fa-solid fa-arrow-up-right-from-square"></i>

                        <span class="sm:hidden">
                            Open Image
                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <script>
        function openQrPreview(imageUrl, title, url) {

            const modal = document.getElementById('qrPreviewModal');
            const image = document.getElementById('qrPreviewImage');
            const loading = document.getElementById('qrPreviewLoading');
            const error = document.getElementById('qrPreviewError');

            const titleElement = document.getElementById('qrPreviewTitle');
            const urlElement = document.getElementById('qrPreviewUrl');

            const download = document.getElementById('qrPreviewDownload');
            const open = document.getElementById('qrPreviewOpen');

            titleElement.textContent = title || 'QR Code';
            urlElement.textContent = url || '';

            image.classList.add('hidden');

            loading.classList.remove('hidden');
            loading.classList.add('flex');

            error.classList.add('hidden');
            error.classList.remove('flex');

            image.onload = function() {

                loading.classList.add('hidden');
                loading.classList.remove('flex');

                error.classList.add('hidden');
                error.classList.remove('flex');

                image.classList.remove('hidden');
            };

            image.onerror = function() {

                loading.classList.add('hidden');
                loading.classList.remove('flex');

                image.classList.add('hidden');

                error.classList.remove('hidden');
                error.classList.add('flex');
            };

            image.src = imageUrl;

            download.href = imageUrl;
            open.href = imageUrl;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.body.classList.add('overflow-hidden');
        }

        function closeQrPreview(event) {

            if (event && event.target !== event.currentTarget) {
                return;
            }

            const modal = document.getElementById('qrPreviewModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');

            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                closeQrPreview();
            }

        });
    </script>

</x-layouts.client>
