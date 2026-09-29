<x-layouts.client>
    
<x-slot:title>
    QR Generator · Blackorchid
</x-slot:title>

<x-slot:heading>
    QR Generator
</x-slot:heading>

<div class="grid grid-cols-1 gap-5 xl:grid-cols-[1fr_1.2fr] xl:gap-8">

    <form method="POST"
        action="{{ route('qr.store') }}"
        enctype="multipart/form-data"
        class="rounded-2xl border border-white/10 bg-white/[0.03] p-4 sm:p-6">

        @csrf

        <div class="flex items-start gap-3 sm:gap-4">

            <div
                class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-violet-500/10 text-violet-400 sm:h-11 sm:w-11">

                <i class="fa-solid fa-qrcode text-base sm:text-lg"></i>

            </div>

            <div class="min-w-0">

                <h2 class="text-base font-semibold text-white sm:text-lg">
                    Create a QR code
                </h2>

                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                    Customize the visual output and optionally add a logo.
                </p>

            </div>

        </div>

        @if ($errors->any())

            <div class="mt-5 rounded-xl border border-red-400/20 bg-red-400/10 p-3 text-sm text-red-300 sm:p-4">

                <div class="flex items-start gap-3">

                    <i class="fa-solid fa-circle-exclamation mt-0.5 shrink-0"></i>

                    <div class="min-w-0">

                        <p class="font-medium text-red-200">
                            Please check the following:
                        </p>

                        <ul class="mt-2 space-y-1">

                            @foreach ($errors->all() as $error)

                                <li class="flex gap-2">

                                    <i class="fa-solid fa-angle-right mt-1 shrink-0 text-[10px]"></i>

                                    <span class="break-words">
                                        {{ $error }}
                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif

        <div class="mt-5 space-y-5 sm:mt-6">

            <div>

                <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                    <i class="fa-solid fa-heading text-xs text-violet-400"></i>

                    QR Title

                </label>

                <div class="relative">

                    <i
                        class="fa-solid fa-tag absolute left-3.5 top-1/2 -translate-y-1/2 text-sm text-slate-500 sm:left-4"></i>

                    <input name="title"
                        value="{{ old('title') }}"
                        placeholder="QR title"
                        class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-10 pr-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-violet-500 focus:bg-white/[0.07] sm:pl-11 sm:pr-4 sm:text-base">

                </div>

            </div>

            <div>

                <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                    <i class="fa-solid fa-link text-xs text-violet-400"></i>

                    Destination URL

                </label>

                <div class="relative">

                    <i
                        class="fa-solid fa-globe absolute left-3.5 top-1/2 -translate-y-1/2 text-sm text-slate-500 sm:left-4"></i>

                    <input name="url"
                        value="{{ old('url') }}"
                        required
                        type="url"
                        placeholder="https://example.com"
                        class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-10 pr-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-violet-500 focus:bg-white/[0.07] sm:pl-11 sm:pr-4 sm:text-base">

                </div>

            </div>

            <div>

                <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                    <i class="fa-solid fa-image text-xs text-violet-400"></i>

                    Logo Image

                </label>

                <label
                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-dashed border-white/10 bg-white/5 p-3 transition hover:border-violet-500/50 hover:bg-white/[0.07] sm:gap-4 sm:p-4">

                    <div
                        class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-violet-500/10 text-violet-400 sm:h-11 sm:w-11">

                        <i class="fa-solid fa-cloud-arrow-up text-base sm:text-lg"></i>

                    </div>

                    <div class="min-w-0 flex-1">

                        <p class="truncate text-sm font-medium text-white">
                            Choose logo image
                        </p>

                        <p class="mt-1 text-[11px] leading-4 text-slate-500 sm:text-xs">
                            PNG, JPG, JPEG or WEBP · Max 2MB
                        </p>

                    </div>

                    <i class="fa-solid fa-chevron-right shrink-0 text-xs text-slate-600"></i>

                    <input name="logo"
                        type="file"
                        accept=".png,.jpg,.jpeg,.webp"
                        class="hidden">

                </label>

            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div>

                    <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                        <i class="fa-solid fa-expand text-xs text-violet-400"></i>

                        Size

                    </label>

                    <div class="relative">

                        <i
                            class="fa-solid fa-ruler-combined absolute left-3.5 top-1/2 -translate-y-1/2 text-sm text-slate-500 sm:left-4"></i>

                        <input name="size"
                            type="number"
                            value="{{ old('size', 400) }}"
                            min="180"
                            max="1000"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-10 pr-3 text-sm text-white outline-none transition focus:border-violet-500 sm:pl-11 sm:pr-4 sm:text-base">

                    </div>

                    <p class="mt-1.5 text-xs text-slate-600">
                        180–1000 pixels
                    </p>

                </div>

                <div>

                    <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                        <i class="fa-solid fa-border-all text-xs text-violet-400"></i>

                        Margin

                    </label>

                    <div class="relative">

                        <i
                            class="fa-solid fa-arrows-left-right absolute left-3.5 top-1/2 -translate-y-1/2 text-sm text-slate-500 sm:left-4"></i>

                        <input name="margin"
                            type="number"
                            value="{{ old('margin', 5) }}"
                            min="0"
                            max="50"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-10 pr-3 text-sm text-white outline-none transition focus:border-violet-500 sm:pl-11 sm:pr-4 sm:text-base">

                    </div>

                    <p class="mt-1.5 text-xs text-slate-600">
                        0–50 pixels
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div>

                    <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                        <i class="fa-solid fa-palette text-xs text-violet-400"></i>

                        Foreground

                    </label>

                    <div
                        class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-2.5 sm:p-2">

                        <input name="foreground"
                            type="color"
                            value="{{ old('foreground', '#111827') }}"
                            class="h-10 w-12 shrink-0 cursor-pointer rounded-lg border-0 bg-transparent sm:w-14">

                        <div class="min-w-0">

                            <p class="text-xs text-slate-500">
                                QR Color
                            </p>

                            <p class="truncate text-sm font-medium text-white">
                                {{ old('foreground', '#111827') }}
                            </p>

                        </div>

                    </div>

                </div>

                <div>

                    <label class="mb-2 flex items-center gap-2 text-xs text-slate-400 sm:text-sm">

                        <i class="fa-solid fa-fill-drip text-xs text-violet-400"></i>

                        Background

                    </label>

                    <div
                        class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-2.5 sm:p-2">

                        <input name="background"
                            type="color"
                            value="{{ old('background', '#ffffff') }}"
                            class="h-10 w-12 shrink-0 cursor-pointer rounded-lg border-0 bg-transparent sm:w-14">

                        <div class="min-w-0">

                            <p class="text-xs text-slate-500">
                                Background
                            </p>

                            <p class="truncate text-sm font-medium text-white">
                                {{ old('background', '#ffffff') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3.5 text-sm font-semibold text-white transition hover:bg-violet-500 active:scale-[0.99] sm:text-base">

                <i class="fa-solid fa-wand-magic-sparkles"></i>

                Generate QR Code

            </button>

        </div>

    </form>


    <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-4 sm:p-6">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                <div
                    class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-violet-500/10 text-violet-400 sm:h-11 sm:w-11">

                    <i class="fa-solid fa-layer-group text-base sm:text-lg"></i>

                </div>

                <div class="min-w-0">

                    <h2 class="text-base font-semibold text-white sm:text-lg">
                        Your QR Library
                    </h2>

                    <p class="mt-1 text-xs text-slate-500 sm:text-sm">
                        Your generated QR codes
                    </p>

                </div>

            </div>

            <div
                class="w-fit rounded-lg border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-400">

                <i class="fa-solid fa-qrcode mr-1 text-violet-400"></i>

                {{ $qrCodes->total() }}
                {{ Str::plural('QR code', $qrCodes->total()) }}

            </div>

        </div>

        <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">

            @forelse($qrCodes as $qr)

                <div
                    class="group rounded-2xl border border-white/10 bg-black/20 p-3.5 transition hover:border-violet-500/30 hover:bg-black/30 sm:p-4">

                    <div
                        class="relative flex aspect-square w-full items-center justify-center rounded-xl bg-transparent p-1 sm:p-1">

                        <img src="{{ asset('storage/qrcodes/' . $qr->user_id . '/' . $qr->filename) }}"
                            alt="{{ $qr->title ?? 'QR Code' }}"
                            class="block h-full w-full max-h-[280px] max-w-[280px] object-contain"
                            loading="lazy">

                        <div
                            class="absolute right-2 top-2 rounded-lg bg-black/70 px-2 py-1 text-[10px] text-white opacity-0 backdrop-blur transition group-hover:opacity-100 sm:right-3 sm:top-3 sm:text-xs">

                            <i class="fa-solid fa-qrcode mr-1"></i>

                            QR

                        </div>

                    </div>

                    <div class="mt-4 flex items-start gap-3">

                        <div
                            class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-violet-500/10 text-violet-400">

                            <i class="fa-solid fa-qrcode"></i>

                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="truncate text-sm font-medium text-white sm:text-base">
                                {{ $qr->title ?? 'Untitled QR Code' }}
                            </p>

                            <p class="mt-1 flex min-w-0 items-start gap-1.5 text-xs text-slate-500">

                                <i class="fa-solid fa-link mt-0.5 shrink-0 text-[9px]"></i>

                                <span class="min-w-0 break-all sm:truncate">
                                    {{ $qr->url }}
                                </span>

                            </p>

                        </div>

                    </div>

                    <div class="mt-4 flex gap-2">

                        <a href="{{ route('qr.download', ['qrCode' => $qr->id]) }}"
                            class="flex flex-1 items-center justify-center gap-2 rounded-lg border border-white/10 px-3 py-2.5 text-center text-sm text-blue-300 transition hover:bg-white/5 active:scale-[0.98]">

                            <i class="fa-solid fa-download"></i>

                            <span>
                                Download
                            </span>

                        </a>

                        <form method="POST"
                            action="{{ route('qr.destroy', ['qrCode' => $qr->id]) }}">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                title="Delete QR Code"
                                class="flex h-full items-center justify-center rounded-lg border border-red-400/20 px-3 py-2.5 text-sm text-red-300 transition hover:bg-red-400/10 active:scale-[0.98]">

                                <i class="fa-solid fa-trash-can"></i>

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="py-16 text-center sm:col-span-2 sm:py-20">

                    <div
                        class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-violet-500/10 text-violet-400 sm:h-16 sm:w-16">

                        <i class="fa-solid fa-qrcode text-xl sm:text-2xl"></i>

                    </div>

                    <h3 class="mt-5 font-medium text-white">
                        No QR codes yet
                    </h3>

                    <p class="mx-auto mt-2 max-w-sm px-4 text-xs leading-5 text-slate-500 sm:text-sm">
                        Create your first QR code using the generator. Your saved QR will appear here.
                    </p>

                </div>

            @endforelse

        </div>

        @if ($qrCodes->hasPages())

            <div class="mt-5 overflow-x-auto border-t border-white/10 pt-5">
                {{ $qrCodes->links() }}
            </div>

        @endif

    </div>

</div>

</x-layouts.client>
