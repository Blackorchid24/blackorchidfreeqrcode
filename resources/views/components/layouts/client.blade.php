@props(['title' => 'Blackorchid', 'heading' => 'Dashboard'])

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/blackorchidIcon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        .animate-page {
            animation: pageEnter 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-sidebar {
            animation: sidebarEnter 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-header {
            animation: headerEnter 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-item {
            opacity: 0;
            animation: itemEnter 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-item:nth-child(1) {
            animation-delay: 0.08s;
        }

        .animate-item:nth-child(2) {
            animation-delay: 0.16s;
        }

        .animate-item:nth-child(3) {
            animation-delay: 0.24s;
        }

        .animate-item:nth-child(4) {
            animation-delay: 0.32s;
        }

        .animate-item:nth-child(5) {
            animation-delay: 0.40s;
        }

        .animate-item:nth-child(6) {
            animation-delay: 0.48s;
        }

        .animate-card {
            transition:
                transform 0.35s cubic-bezier(0.22, 1, 0.36, 1),
                border-color 0.35s ease,
                background-color 0.35s ease,
                box-shadow 0.35s ease;
        }

        .animate-card:hover {
            transform: translateY(-4px);
        }

        .animate-button {
            transition:
                transform 0.25s cubic-bezier(0.22, 1, 0.36, 1),
                background-color 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .animate-button:hover {
            transform: translateY(-2px);
        }

        .animate-icon {
            transition:
                transform 0.35s cubic-bezier(0.22, 1, 0.36, 1),
                rotate 0.35s ease;
        }

        .animate-card:hover .animate-icon {
            transform: scale(1.08) rotate(4deg);
        }

        .animate-link {
            transition:
                transform 0.25s ease,
                color 0.25s ease,
                background-color 0.25s ease;
        }

        .animate-link:hover {
            transform: translateX(3px);
        }

        .animate-image {
            transition:
                transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.45s ease;
        }

        .animate-image:hover {
            transform: scale(1.03);
        }

        .animate-input {
            transition:
                border-color 0.25s ease,
                background-color 0.25s ease,
                box-shadow 0.25s ease,
                transform 0.25s ease;
        }

        .animate-input:focus {
            transform: translateY(-1px);
        }

        .animate-menu {
            animation: menuEnter 0.3s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-toast {
            animation: toastEnter 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-modal {
            animation: modalEnter 0.35s ease both;
        }

        .animate-modal-content {
            animation: modalContentEnter 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .animate-nav {
            transition:
                transform 0.25s cubic-bezier(0.22, 1, 0.36, 1),
                background-color 0.25s ease,
                color 0.25s ease;
        }

        .animate-nav:hover {
            transform: translateX(3px);
        }

        @keyframes pageEnter {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes sidebarEnter {
            from {
                opacity: 0;
                transform: translateX(-25px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes headerEnter {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes itemEnter {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes menuEnter {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes toastEnter {
            from {
                opacity: 0;
                transform: translate(-50%, -15px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translate(-50%, 0) scale(1);
            }
        }

        @keyframes modalEnter {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes modalContentEnter {
            from {
                opacity: 0;
                transform: translateY(15px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>

</head>

<body class="min-h-screen bg-[#07070a] font-['Plus_Jakarta_Sans'] text-slate-100 antialiased">

    <div class="min-h-screen lg:flex animate-page">

        <aside class="hidden w-72 shrink-0 border-r border-white/10 bg-transparent p-6 lg:block animate-sidebar">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 animate-link">

                <div class="grid h-11 w-11 place-items-center animate-icon">

                    <img src="{{ asset('images/blackorchidIcon.png') }}" alt="Blackorchid"
                        class="h-11 w-11 object-contain">

                </div>

                <div>

                    <div class="text-xl font-extrabold tracking-[0.08em]">
                        BLACKORCHID
                    </div>

                    <div class="flex items-center gap-1.5 text-xs text-slate-500">

                        <i class="fa-solid fa-qrcode text-[10px]"></i>

                        FREE QR CODE

                    </div>

                </div>

            </a>

            <nav class="mt-10 space-y-2">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 animate-nav
                {{ request()->routeIs('dashboard')
                    ? 'bg-violet-600/15 text-violet-300'
                    : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                    <i class="fa-solid fa-chart-pie w-5 text-center"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('qr.generator') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 animate-nav
                {{ request()->routeIs('qr.generator')
                    ? 'bg-violet-600/15 text-violet-300'
                    : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                    <i class="fa-solid fa-qrcode w-5 text-center"></i>

                    <span>
                        QR Generator
                    </span>

                </a>

                <a href="{{ route('profile') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 animate-nav
                {{ request()->routeIs('profile')
                    ? 'bg-violet-600/15 text-violet-300'
                    : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                    <i class="fa-solid fa-user w-5 text-center"></i>

                    <span>
                        Profile
                    </span>

                </a>

            </nav>

            <div class="mt-10 border-t border-white/5 pt-6">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl border border-white/10 px-4 py-3 text-left text-sm text-slate-400 animate-button hover:border-red-400/20 hover:bg-red-400/10 hover:text-red-300">

                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>

                        <span>
                            Sign out
                        </span>

                    </button>

                </form>

            </div>

            <div class="mt-6 rounded-2xl border border-white/5 p-4 animate-card">

                <div class="flex items-center gap-3">

                    @if (auth()->user()?->avatar)

                        @if (str_starts_with(auth()->user()->avatar, 'http://') || str_starts_with(auth()->user()->avatar, 'https://'))
                            <img src="{{ auth()->user()->avatar }}"
                                class="h-10 w-10 shrink-0 rounded-full object-cover ring-2 ring-violet-500/20 animate-image"
                                alt="Profile">
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                class="h-10 w-10 shrink-0 rounded-full object-cover ring-2 ring-violet-500/20 animate-image"
                                alt="Profile">
                        @endif
                    @else
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-violet-500/10 text-violet-400 animate-icon">

                            <i class="fa-solid fa-user"></i>

                        </div>

                    @endif

                    <div class="min-w-0">

                        <p class="truncate text-sm font-medium text-white">
                            {{ auth()->user()?->name ?? 'User' }}
                        </p>

                        <p class="truncate text-xs text-slate-500">
                            {{ auth()->user()?->email ?? '' }}
                        </p>

                    </div>

                </div>

            </div>

        </aside>

        <main class="min-w-0 flex-1">

            <header
                class="sticky top-0 z-40 border-b border-white/10 bg-transparent backdrop-blur lg:hidden animate-header">

                <div class="flex min-h-[64px] items-center justify-between gap-3 px-4">

                    <a href="{{ route('dashboard') }}" class="flex min-w-0 items-center gap-2.5 animate-link">

                        <img src="{{ asset('images/blackorchidIcon.png') }}" alt="Blackorchid"
                            class="h-9 w-9 shrink-0 object-contain animate-icon">

                        <div class="min-w-0">

                            <div class="truncate text-sm font-extrabold tracking-[0.08em]">
                                BLACKORCHID
                            </div>

                            <div class="flex items-center gap-1 text-[9px] text-slate-500">

                                <i class="fa-solid fa-qrcode text-[8px]"></i>

                                FREE QR CODE

                            </div>

                        </div>

                    </a>

                    <div class="flex shrink-0 items-center gap-2">

                        @if (auth()->user()?->avatar)

                            @if (str_starts_with(auth()->user()->avatar, 'http://') || str_starts_with(auth()->user()->avatar, 'https://'))
                                <img src="{{ auth()->user()->avatar }}"
                                    class="h-8 w-8 rounded-full object-cover ring-2 ring-white/5 animate-image"
                                    alt="Profile">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                    class="h-8 w-8 rounded-full object-cover ring-2 ring-white/5 animate-image"
                                    alt="Profile">
                            @endif
                        @else
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-violet-500/10 text-xs text-violet-400 animate-icon">

                                <i class="fa-solid fa-user"></i>

                            </div>

                        @endif

                        <button type="button" id="mobileMenuButton" onclick="toggleMobileMenu()"
                            aria-label="Open navigation menu" aria-expanded="false"
                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-slate-400 animate-button hover:bg-white/5 hover:text-white">

                            <i id="mobileMenuIcon" class="fa-solid fa-bars"></i>

                        </button>

                    </div>

                </div>

                <div id="mobileMenu" class="hidden border-t border-white/10 bg-[#0b0b10] px-4 pb-4">

                    <nav class="space-y-1.5 pt-3">

                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm animate-nav
                        {{ request()->routeIs('dashboard')
                            ? 'bg-violet-600/15 text-violet-300'
                            : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                            <i class="fa-solid fa-chart-pie w-5 text-center"></i>

                            <span>
                                Dashboard
                            </span>

                            @if (request()->routeIs('dashboard'))
                                <i class="fa-solid fa-chevron-right ml-auto text-[10px]"></i>
                            @endif

                        </a>

                        <a href="{{ route('qr.generator') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm animate-nav
                        {{ request()->routeIs('qr.generator')
                            ? 'bg-violet-600/15 text-violet-300'
                            : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                            <i class="fa-solid fa-qrcode w-5 text-center"></i>

                            <span>
                                QR Generator
                            </span>

                            @if (request()->routeIs('qr.generator'))
                                <i class="fa-solid fa-chevron-right ml-auto text-[10px]"></i>
                            @endif

                        </a>

                        <a href="{{ route('profile') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm animate-nav
                        {{ request()->routeIs('profile')
                            ? 'bg-violet-600/15 text-violet-300'
                            : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">

                            <i class="fa-solid fa-user w-5 text-center"></i>

                            <span>
                                Profile
                            </span>

                            @if (request()->routeIs('profile'))
                                <i class="fa-solid fa-chevron-right ml-auto text-[10px]"></i>
                            @endif

                        </a>

                    </nav>

                    <div class="mt-3 border-t border-white/5 pt-3">

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="flex w-full items-center gap-3 rounded-xl border border-white/10 px-4 py-3 text-left text-sm text-slate-400 animate-button hover:border-red-400/20 hover:bg-red-400/10 hover:text-red-300">

                                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>

                                <span>
                                    Sign out
                                </span>

                            </button>

                        </form>

                    </div>

                    <div class="mt-3 rounded-2xl border border-white/5 bg-white/[0.02] p-3 animate-card">

                        <div class="flex items-center gap-3">

                            @if (auth()->user()?->avatar)

                                @if (str_starts_with(auth()->user()->avatar, 'http://') || str_starts_with(auth()->user()->avatar, 'https://'))
                                    <img src="{{ auth()->user()->avatar }}"
                                        class="h-9 w-9 shrink-0 rounded-full object-cover ring-2 ring-violet-500/20 animate-image"
                                        alt="Profile">
                                @else
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                        class="h-9 w-9 shrink-0 rounded-full object-cover ring-2 ring-violet-500/20 animate-image"
                                        alt="Profile">
                                @endif
                            @else
                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-violet-500/10 text-violet-400 animate-icon">

                                    <i class="fa-solid fa-user text-sm"></i>

                                </div>

                            @endif

                            <div class="min-w-0">

                                <p class="truncate text-sm font-medium text-white">
                                    {{ auth()->user()?->name ?? 'User' }}
                                </p>

                                <p class="truncate text-xs text-slate-500">
                                    {{ auth()->user()?->email ?? '' }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </header>

            <header
                class="hidden border-b border-white/10 bg-transparent px-5 py-4 backdrop-blur lg:block lg:px-10 animate-header">

                <div class="flex items-center justify-between gap-6">

                    <div class="min-w-0">

                        <p class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-violet-400">

                            <i class="fa-solid fa-shield-halved text-[10px]"></i>

                            Client Portal

                        </p>

                        <h1 class="mt-1 truncate text-xl font-semibold">
                            {{ $heading }}
                        </h1>

                    </div>

                    <div class="flex shrink-0 items-center gap-3">

                        @if (auth()->user()?->avatar)

                            @if (str_starts_with(auth()->user()->avatar, 'http://') || str_starts_with(auth()->user()->avatar, 'https://'))
                                <img src="{{ auth()->user()->avatar }}"
                                    class="h-9 w-9 rounded-full object-cover ring-2 ring-white/5 animate-image"
                                    alt="Profile">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                    class="h-9 w-9 rounded-full object-cover ring-2 ring-white/5 animate-image"
                                    alt="Profile">
                            @endif
                        @else
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-violet-500/10 text-sm text-violet-400 animate-icon">

                                <i class="fa-solid fa-user"></i>

                            </div>

                        @endif

                        <span class="hidden max-w-48 truncate text-sm text-slate-300 sm:block">
                            {{ auth()->user()?->name ?? 'User' }}
                        </span>

                    </div>

                </div>

            </header>

            <div class="w-full px-3 py-4 sm:px-5 sm:py-5 lg:p-10">

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
                        class="fixed left-3 right-3 top-4 z-50 rounded-2xl border border-red-500/20 bg-[#111116]/95 p-3 opacity-100 shadow-2xl shadow-black/40 backdrop-blur-xl transition-all duration-500 animate-toast sm:left-1/2 sm:right-auto sm:w-[calc(100%-2.5rem)] sm:max-w-sm sm:-translate-x-1/2 sm:p-4">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-500/10 text-red-400 sm:h-10 sm:w-10 animate-icon">

                                <i class="fa-solid fa-circle-exclamation"></i>

                            </div>

                            <div class="min-w-0 flex-1">

                                <p class="text-sm font-semibold text-white">
                                    Something went wrong
                                </p>

                                <p class="mt-1 break-words text-xs leading-5 text-slate-400 sm:text-sm">
                                    {{ $errors->first() }}
                                </p>

                            </div>

                            <button type="button" onclick="closeErrorToast()"
                                class="shrink-0 text-slate-500 animate-button hover:text-white"
                                aria-label="Close notification">

                                <i class="fa-solid fa-xmark"></i>

                            </button>

                        </div>

                        <div class="mt-3 h-1 overflow-hidden rounded-full bg-white/5">

                            <div id="errorToastProgress" class="h-full w-full origin-left rounded-full bg-red-500">
                            </div>

                        </div>

                    </div>
                @endif

                <div class="w-full min-w-0">
                    {{ $slot }}
                </div>

            </div>

        </main>

    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const button = document.getElementById('mobileMenuButton');
            const icon = document.getElementById('mobileMenuIcon');

            if (!menu || !button || !icon) {
                return;
            }

            const isHidden = menu.classList.contains('hidden');

            if (isHidden) {
                menu.classList.remove('hidden');
                menu.classList.remove('animate-menu');

                void menu.offsetWidth;

                menu.classList.add('animate-menu');

                button.setAttribute('aria-expanded', 'true');
                button.setAttribute('aria-label', 'Close navigation menu');

                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                menu.classList.add('hidden');

                button.setAttribute('aria-expanded', 'false');
                button.setAttribute('aria-label', 'Open navigation menu');

                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        }

        function closeMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const button = document.getElementById('mobileMenuButton');
            const icon = document.getElementById('mobileMenuIcon');

            if (!menu || !button || !icon) {
                return;
            }

            menu.classList.add('hidden');

            button.setAttribute('aria-expanded', 'false');
            button.setAttribute('aria-label', 'Open navigation menu');

            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }

        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = document.getElementById('mobileMenuButton');

            if (!menu || !button) {
                return;
            }

            if (menu.classList.contains('hidden')) {
                return;
            }

            if (!menu.contains(event.target) && !button.contains(event.target)) {
                closeMobileMenu();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeMobileMenu();
            }
        });

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

    @auth
        <script>
            setInterval(() => {
                fetch('{{ route('heartbeat') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
            }, 60000);
        </script>
    @endauth

</body>

</html>
