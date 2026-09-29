<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/blackorchidIcon.png') }}">

    <title>{{ $user->name }} · Blackorchid</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="min-h-screen overflow-x-hidden bg-[#050507] text-slate-100">

    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-violet-600/10 blur-3xl"></div>
        <div class="absolute -right-32 top-20 h-96 w-96 rounded-full bg-fuchsia-600/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-indigo-600/5 blur-3xl"></div>
    </div>

    <main class="mx-auto max-w-7xl p-5 sm:p-8 lg:p-10">

        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">

            <a href="{{ route('admin.dashboard') }}"
                class="group inline-flex items-center gap-2 rounded-xl border border-white/10 .bg-white\/\[0\.03\] {
 background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 3%, transparent);
} px-4 py-2.5 text-sm text-slate-400 transition hover:border-violet-500/30 hover:bg-violet-500/10 hover:text-white">
                <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                Dashboard
            </a>

            <div class="flex items-center gap-2 text-xs text-slate-600">
                <i class="fa-solid fa-shield-halved"></i>
                Admin Client Management
            </div>

        </div>

        <section
            class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/[0.035] shadow-2xl shadow-black/30">

            <div
                class="absolute inset-x-0 top-0 h-px .bg-gradient-to-r {
                --tw-gradient-position: to right in oklab;
                background-image: linear-gradient(var(--tw-gradient-stops));
                } from-transparent via-violet-500/60 to-transparent">
            </div>

            <div class="absolute right-0 top-0 h-48 w-48 rounded-full bg-violet-500/10 blur-3xl"></div>

            <div class="relative p-6 sm:p-8">

                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div class="flex min-w-0 items-center gap-5">

                        <div class="relative shrink-0">

                            @if ($user->avatar)
                                <img src="{{ \Illuminate\Support\Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . $user->avatar) }}"
                                    alt="{{ $user->name }}"
                                    class="h-20 w-20 rounded-2xl object-cover ring-1 ring-white/10 shadow-xl">
                            @else
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-2xl .bg-gradient-to-br {
                                    --tw-gradient-position: to bottom right in oklab;
                                    background-image: linear-gradient(var(--tw-gradient-stops));
                                    } from-violet-500/20 to-fuchsia-500/10 text-violet-300 ring-1 ring-violet-500/20 shadow-xl shadow-violet-500/10">
                                    <i class="fa-solid fa-user text-3xl"></i>
                                </div>
                            @endif

                            <span
                                class="absolute -bottom-1.5 -right-1.5 flex h-6 w-6 items-center justify-center rounded-full border-4 border-[#09090b] bg-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-950"></span>
                            </span>

                        </div>

                        <div class="min-w-0">

                            <div class="mb-1 flex flex-wrap items-center gap-2">

                                <span
                                    class="rounded-full border border-violet-400/10 bg-violet-500/10 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wider text-violet-300">
                                    Client
                                </span>

                                <span
                                    class="rounded-full border border-emerald-400/10 bg-emerald-400/10 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wider text-emerald-300">
                                    {{ $user->status }}
                                </span>

                            </div>

                            <h1 class="truncate text-2xl font-bold tracking-tight text-white sm:text-3xl">
                                {{ $user->name }}
                            </h1>

                            <p class="mt-1 flex items-center gap-2 truncate text-sm text-slate-500">
                                <i class="fa-solid fa-envelope text-[11px]"></i>
                                {{ $user->email }}
                            </p>

                        </div>

                    </div>

                    <div class="flex shrink-0 items-center gap-3">

                        <div class="rounded-2xl border border-white/10 bg-black/20 px-5 py-3 text-center">
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                                QR Codes
                            </p>

                            <p class="mt-1 text-2xl font-bold text-white">
                                {{ $qrCodes->total() }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="grid border-t border-white/5 sm:grid-cols-3">

                <div
                    class="group border-b border-white/5 p-5 transition @media (hover: hover) {
                    .hover\:bg-white\/\[0\.02\]:hover {
                    background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 2%, transparent);
                    }
                    } sm:border-b-0 sm:border-r">
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400 transition group-hover:bg-violet-500/15">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                                Account
                            </p>

                            <p class="mt-1 text-sm font-medium text-slate-300">
                                Client account
                            </p>
                        </div>

                    </div>
                </div>

                <div
                    class="group border-b border-white/5 p-5 transition @media (hover: hover) {
                    .hover\:bg-white\/\[0\.02\]:hover {
                    background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 2%, transparent);
                    }
                    } sm:border-b-0 sm:border-r">
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400 transition group-hover:bg-sky-500/15">
                            <i class="fa-solid fa-at"></i>
                        </div>

                        <div class="min-w-0">
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                                Email
                            </p>

                            <p class="mt-1 truncate text-sm font-medium text-slate-300">
                                {{ $user->email }}
                            </p>
                        </div>

                    </div>
                </div>

                <div
                    class="group p-5 transition @media (hover: hover) {
                    .hover\:bg-white\/\[0\.02\]:hover {
                    background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 2%, transparent);
                    }
                    }">
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400 transition group-hover:bg-emerald-500/15">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                                Status
                            </p>

                            <p class="mt-1 text-sm font-medium capitalize text-emerald-400">
                                {{ $user->status }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </section>

        <section class="mt-10">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <p
                        class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] text-violet-400">
                        <i class="fa-solid fa-qrcode"></i>
                        QR Library
                    </p>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                        Generated QR codes
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        QR codes generated by this client account.
                    </p>

                </div>

                <div
                    class="flex items-center gap-2 self-start rounded-xl border border-white/10 .border-white\/10 {
                    border-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 10%, transparent);
                    } px-4 py-2.5 text-sm text-slate-400">
                    <i class="fa-solid fa-layer-group text-violet-400"></i>
                    <span>{{ $qrCodes->total() }}</span>
                    <span>total</span>
                </div>

            </div>

            <div class="mt-6 grid gap-2 sm:grid-cols-2 lg:grid-cols-5">

                @forelse($qrCodes as $qr)
                    <article
                        class=".w-\[240px\] {
                        width: 240px;
                        } group overflow-hidden rounded-1xl border border-white/10 .border-white\/10 {
                        border-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 10%, transparent);
                        } shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-1 hover:border-violet-500/30 @media (hover: hover) {
                        .hover\:bg-white\/\[0\.045\]:hover {
                        background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 4.5%, transparent);
                        }
                        } hover:shadow-violet-500/5">

                        <div
                            class="relative flex .h-\[160px\] {
                            height: 160px;
                            } .w-\[240px\] {
                            width: 240px;
                            } items-center justify-center overflow-hidden bg-transparent p-3">
                            <div
                                class="absolute inset-0 .bg-gradient-to-br {
                            --tw-gradient-position: to bottom right in oklab;
                            background-image: linear-gradient(var(--tw-gradient-stops));
                            } from-white via-white to-slate-100">
                            </div>

                            <img src="{{ asset('storage/qrcodes/' . $qr->user_id . '/' . $qr->filename) }}"
                                alt="{{ $qr->title ?? 'QR Code' }}"
                                class="relative z-10 .h-\[140px\] {
                                        height: 140px;
                                        } .w-\[140px\] {
                                        width: 140px;
                                        } object-contain transition duration-300 group-hover:scale-[1.03]"
                                loading="lazy">

                            <div
                                class="absolute left-2 top-2 z-20 rounded-md bg-black/70 px-2 py-1 text-[9px] font-semibold uppercase tracking-wider text-white opacity-0 backdrop-blur transition duration-300 group-hover:opacity-100">
                                <i class="fa-solid fa-qrcode mr-1"></i>
                                QR
                            </div>
                        </div>

                        <div class="p-5">

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="truncate font-semibold text-white">
                                        {{ $qr->title ?: 'Untitled QR Code' }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-600">
                                        QR ID #{{ $qr->id }}
                                    </p>

                                </div>

                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-violet-500/10 bg-violet-500/10 text-violet-400 transition group-hover:bg-violet-500/15">
                                    <i class="fa-solid fa-qrcode"></i>
                                </div>

                            </div>

                            <div class="mt-4 rounded-xl border border-white/5 bg-black/20 p-3">

                                <div class="flex items-start gap-2">

                                    <i class="fa-solid fa-link mt-0.5 text-[10px] text-slate-600"></i>

                                    <p class="line-clamp-2 break-all text-xs leading-5 text-slate-500">
                                        {{ $qr->url }}
                                    </p>

                                </div>

                            </div>

                            <div class="mt-4 grid grid-cols-2 gap-2">

                                <a href="{{ asset('storage/qrcodes/' . $qr->user_id . '/' . $qr->filename) }}"
                                    target="_blank"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/10 .bg-white\/\[0\.03\] {
                                    background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 3%, transparent);
                                    } px-3 py-2.5 text-xs font-medium text-slate-300 transition hover:border-violet-500/30 hover:bg-violet-500/10 hover:text-white">
                                    <i class="fa-solid fa-eye"></i>
                                    View
                                </a>

                                <form action="{{ route('qr.destroy', $qr->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this QR code?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/10 .bg-white\/\[0\.03\] {
                                    background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 3%, transparent);
                                    } px-3 py-2.5 text-xs font-medium text-slate-300 transition hover:border-violet-500/30 hover:bg-violet-500/10 hover:text-white">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @empty

                    <div
                        class="col-span-full overflow-hidden rounded-3xl border border-dashed border-white/10 .bg-white\/\[0\.02\] {
                            background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 2%, transparent);
                            } py-20 text-center">

                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl border border-white/10 .bg-white\/\[0\.03\] {
                            background-color: color-mix(in oklab, var(--color-white) /* #fff = #ffffff */ 3%, transparent);
                            } text-slate-600 shadow-xl">
                            <i class="fa-solid fa-qrcode text-3xl"></i>
                        </div>

                        <h3 class="mt-5 text-lg font-semibold text-slate-300">
                            No QR codes yet
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm text-slate-600">
                            This client has not generated any QR codes yet.
                        </p>

                    </div>
                @endforelse

            </div>

            @if ($qrCodes->hasPages())
                <div class="mt-8 rounded-2xl border border-white/10 p-4">
                    {{ $qrCodes->links() }}
                </div>
            @endif
            <div class="w-full p-5 lg:p-10">

                @if (session('success'))
                    <div id="successToast"
                        class="fixed left-1/2 top-5 z-50 w-[calc(100%-2.5rem)] max-w-sm -translate-x-1/2 rounded-2xl border border-violet-500/20 bg-[#111116]/95 p-4 opacity-100 shadow-2xl shadow-black/40 backdrop-blur-xl transition-all duration-500">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="mt-1 text-sm leading-5 text-slate-400">
                                    {{ session('success') }}
                                </p>

                            </div>

                            <button type="button" onclick="closeSuccessToast()"
                                class="text-slate-500 transition hover:text-white" aria-label="Close notification">

                                <i class="fa-solid fa-xmark"></i>

                            </button>

                        </div>

                        <div class="mt-3 h-1 overflow-hidden rounded-full bg-white/5">

                            <div id="successToastProgress"
                                class="h-full w-full origin-left rounded-full bg-violet-500">
                            </div>

                        </div>

                    </div>
                @endif

                @if ($errors->any())
                    <div id="errorToast"
                        class="fixed left-1/2 top-5 z-50 w-[calc(100%-2.5rem)] max-w-sm -translate-x-1/2 rounded-2xl border border-red-500/20 bg-[#111116]/95 p-4 opacity-100 shadow-2xl shadow-black/40 backdrop-blur-xl transition-all duration-500">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-500/10 text-red-400">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>

                            <div class="min-w-0 flex-1">

                                <p class="text-sm font-semibold text-white">
                                    Something went wrong
                                </p>

                                <p class="mt-1 text-sm leading-5 text-slate-400">
                                    {{ $errors->first() }}
                                </p>

                            </div>

                            <button type="button" onclick="closeErrorToast()"
                                class="text-slate-500 transition hover:text-white" aria-label="Close notification">

                                <i class="fa-solid fa-xmark"></i>

                            </button>

                        </div>

                        <div class="mt-3 h-1 overflow-hidden rounded-full bg-white/5">

                            <div id="errorToastProgress" class="h-full w-full origin-left rounded-full bg-red-500">
                            </div>

                        </div>

                    </div>
                @endif

            </div>
        </section>

        <footer class="mt-12 border-t border-white/5 pt-6 text-center">

            <p class="text-xs text-slate-700">
                <i class="fa-solid fa-shield-halved mr-1"></i>
                Blackorchid Free QR Code
            </p>

        </footer>

    </main>

    <script>
        function closeSuccessToast() {
            const toast = document.getElementById('successToast');

            if (!toast) {
                return;
            }

            toast.classList.add('-translate-y-3', 'opacity-0');

            setTimeout(() => {
                toast.remove();
            }, 500);
        }

        function closeErrorToast() {
            const toast = document.getElementById('errorToast');

            if (!toast) {
                return;
            }

            toast.classList.add('-translate-y-3', 'opacity-0');

            setTimeout(() => {
                toast.remove();
            }, 500);
        }

        document.addEventListener('DOMContentLoaded', () => {

            const successToast = document.getElementById('successToast');
            const successProgress = document.getElementById('successToastProgress');

            if (successToast) {

                if (successProgress) {
                    successProgress.style.transition = 'transform 1s linear';
                    successProgress.style.transform = 'scaleX(0)';
                }

                setTimeout(() => {
                    closeSuccessToast();
                }, 1000);
            }

            const errorToast = document.getElementById('errorToast');
            const errorProgress = document.getElementById('errorToastProgress');

            if (errorToast) {

                if (errorProgress) {
                    errorProgress.style.transition = 'transform 1s linear';
                    errorProgress.style.transform = 'scaleX(0)';
                }

                setTimeout(() => {
                    closeErrorToast();
                }, 1000);
            }

        });
    </script>
</body>

</html>
