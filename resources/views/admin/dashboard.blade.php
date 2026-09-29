<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/blackorchidIcon.png') }}">

    <title>Admin Dashboard · Blackorchid</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        :root {
            --animation-fast: 180ms;
            --animation-normal: 320ms;
            --animation-slow: 650ms;
            --animation-ease: cubic-bezier(0.22, 1, 0.36, 1);
        }

        body {
            animation: pageEnter 700ms var(--animation-ease) both;
        }

        @keyframes pageEnter {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        #sidebar {
            will-change: transform;
            transition:
                transform 500ms var(--animation-ease),
                box-shadow 500ms var(--animation-ease);
        }

        #mainContent {
            transition:
                padding-left 500ms var(--animation-ease);
        }

        @media (min-width: 1024px) {
            #sidebar {
                box-shadow: 20px 0 50px rgba(0, 0, 0, 0.08);
            }
        }

        header {
            animation: headerEnter 700ms 100ms var(--animation-ease) both;
        }

        @keyframes headerEnter {
            from {
                opacity: 0;
                transform: translateY(-18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        main {
            animation: mainEnter 800ms 150ms var(--animation-ease) both;
        }

        @keyframes mainEnter {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        main > div:first-child {
            animation: heroEnter 850ms 180ms var(--animation-ease) both;
        }

        @keyframes heroEnter {
            from {
                opacity: 0;
                transform: translateY(25px) scale(0.985);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .dashboard-card {
            opacity: 0;
            transform: translateY(25px);
            animation: cardEnter 700ms var(--animation-ease) forwards;
            will-change: transform, opacity;
        }

        .dashboard-card:nth-child(1) {
            animation-delay: 300ms;
        }

        .dashboard-card:nth-child(2) {
            animation-delay: 380ms;
        }

        .dashboard-card:nth-child(3) {
            animation-delay: 460ms;
        }

        .dashboard-card:nth-child(4) {
            animation-delay: 540ms;
        }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-card:hover {
            transform: translateY(-6px) scale(1.005);
            transition:
                transform var(--animation-normal) var(--animation-ease),
                border-color var(--animation-normal) ease,
                box-shadow var(--animation-normal) ease;
        }

        .animated-section {
            opacity: 0;
            transform: translateY(25px);
            animation: sectionEnter 750ms 600ms var(--animation-ease) forwards;
        }

        @keyframes sectionEnter {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .quick-action {
            transition:
                transform 250ms var(--animation-ease),
                background-color 250ms ease,
                border-color 250ms ease;
        }

        .quick-action:hover {
            transform: translateX(5px);
        }

        .quick-action i.fa-chevron-right {
            transition: transform 250ms var(--animation-ease);
        }

        .quick-action:hover i.fa-chevron-right {
            transform: translateX(4px);
        }

        .system-status-card {
            transition:
                transform 280ms var(--animation-ease),
                border-color 280ms ease,
                background-color 280ms ease;
        }

        .system-status-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.12);
            background-color: rgba(255, 255, 255, 0.015);
        }

        .client-row {
            opacity: 0;
            transform: translateY(12px);
            animation: rowEnter 500ms var(--animation-ease) forwards;
            transition:
                background-color 220ms ease,
                transform 220ms var(--animation-ease);
        }

        .client-row:nth-child(1) {
            animation-delay: 700ms;
        }

        .client-row:nth-child(2) {
            animation-delay: 750ms;
        }

        .client-row:nth-child(3) {
            animation-delay: 800ms;
        }

        .client-row:nth-child(4) {
            animation-delay: 850ms;
        }

        .client-row:nth-child(5) {
            animation-delay: 900ms;
        }

        .client-row:nth-child(6) {
            animation-delay: 950ms;
        }

        .client-row:nth-child(7) {
            animation-delay: 1000ms;
        }

        .client-row:nth-child(8) {
            animation-delay: 1050ms;
        }

        .client-row:nth-child(9) {
            animation-delay: 1100ms;
        }

        .client-row:nth-child(10) {
            animation-delay: 1150ms;
        }

        @keyframes rowEnter {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .client-row:hover {
            transform: translateX(3px);
        }

        .client-profile-image,
        .client-row .fa-user {
            transition:
                transform 300ms var(--animation-ease),
                box-shadow 300ms ease;
        }

        .client-row:hover .client-profile-image {
            transform: scale(1.08);
        }

        .client-row a {
            transition:
                transform 250ms var(--animation-ease),
                background-color 250ms ease,
                border-color 250ms ease;
        }

        .client-row a:hover {
            transform: translateX(3px);
        }

        #analytics {
            opacity: 0;
            transform: translateY(25px);
            animation: analyticsEnter 850ms 900ms var(--animation-ease) forwards;
        }

        @keyframes analyticsEnter {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #analytics article {
            transition:
                transform 300ms var(--animation-ease),
                border-color 300ms ease,
                box-shadow 300ms ease;
        }

        #analytics article:hover {
            transform: translateY(-4px);
            border-color: rgba(167, 139, 250, 0.14);
        }

        .icon-animated {
            transition:
                transform 300ms var(--animation-ease),
                background-color 300ms ease;
        }

        .group:hover .icon-animated {
            transform: scale(1.1) rotate(2deg);
        }

        .live-indicator {
            animation: livePulse 2.2s ease-in-out infinite;
        }

        @keyframes livePulse {
            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.55;
            }
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        button {
            transition:
                transform 180ms var(--animation-ease),
                background-color 180ms ease,
                border-color 180ms ease,
                color 180ms ease;
        }

        button:active {
            transform: scale(0.96);
        }

        #refreshIcon {
            transition: transform 300ms var(--animation-ease);
        }

        .notification-button i {
            transition:
                transform 300ms var(--animation-ease),
                color 200ms ease;
        }

        .notification-button:hover i {
            transform: rotate(12deg) scale(1.08);
        }

        #sidebar nav a {
            position: relative;
            transition:
                transform 250ms var(--animation-ease),
                background-color 250ms ease,
                color 250ms ease;
        }

        #sidebar nav a:hover {
            transform: translateX(4px);
        }

        #sidebar nav a span {
            transition:
                transform 250ms var(--animation-ease),
                background-color 250ms ease;
        }

        #sidebar nav a:hover span {
            transform: scale(1.06);
        }

        #mobileOverlay {
            transition:
                opacity 300ms ease,
                backdrop-filter 300ms ease;
        }

        #clientSearch {
            transition:
                border-color 250ms ease,
                box-shadow 250ms ease,
                background-color 250ms ease,
                transform 250ms var(--animation-ease);
        }

        #clientSearch:focus {
            transform: translateY(-1px);
            box-shadow: 0 8px 30px rgba(139, 92, 246, 0.08);
        }

        footer {
            opacity: 0;
            animation: footerEnter 700ms 1100ms var(--animation-ease) forwards;
        }

        @keyframes footerEnter {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .client-scroll {
            max-height: 500px;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .client-scroll::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        .client-scroll.is-scrolling {
            scrollbar-width: thin;
            scrollbar-color: rgba(139, 92, 246, 0.45) transparent;
        }

        .client-scroll.is-scrolling::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        .client-scroll.is-scrolling::-webkit-scrollbar-track {
            background: transparent;
        }

        .client-scroll.is-scrolling::-webkit-scrollbar-thumb {
            background: rgba(139, 92, 246, 0.45);
            border-radius: 999px;
        }

        .client-scroll.is-scrolling::-webkit-scrollbar-thumb:hover {
            background: rgba(139, 92, 246, 0.7);
        }

        .sidebar-hidden {
            box-shadow: none !important;
        }

        .refreshing {
            animation: refreshFlash 400ms ease;
        }

        @keyframes refreshFlash {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.65;
            }

            100% {
                opacity: 1;
            }
        }

        @media (max-width: 1023px) {
            #mainContent {
                padding-left: 0 !important;
            }
        }

        @media (max-width: 639px) {
            main {
                width: 100%;
                max-width: 100%;
            }

            header {
                width: 100%;
            }

            .mobile-dashboard-title {
                font-size: 1.5rem;
                line-height: 2rem;
            }

            .mobile-chart {
                height: 240px !important;
            }

            .mobile-pie-chart {
                height: 220px !important;
                max-width: 220px !important;
            }

            #clients {
                width: 100%;
            }

            #clients .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
            }

            #clients table {
                min-width: 700px;
            }

            #clients .border-b > div {
                width: 100%;
            }

            #clientSearch {
                min-width: 0;
            }

            #analytics article {
                min-width: 0;
            }

            #analytics canvas {
                max-width: 100%;
            }
        }

        @media (max-width: 475px) {
            main {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            header > div {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            .mobile-hide-text {
                display: none;
            }

            #sidebar {
                width: min(18rem, 88vw);
            }

            #analytics article {
                padding: 1rem;
            }

            #analytics .relative.h-\[300px\] {
                height: 230px !important;
            }

            #analytics .relative.h-\[320px\] {
                height: 250px !important;
            }

            #analytics .relative.h-\[260px\] {
                height: 220px !important;
            }

            #analytics .grid.grid-cols-2 {
                gap: 0.5rem;
            }

            #analytics .grid.grid-cols-2 > div {
                padding: 0.65rem;
            }

            #analytics h3 {
                font-size: 0.875rem;
            }

            #analytics p {
                font-size: 0.7rem;
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

<body class="min-h-screen bg-[#050507] text-slate-100">

    <div id="mobileOverlay"
        class="fixed inset-0 z-40 hidden bg-black/70 opacity-0 backdrop-blur-sm lg:hidden"
        onclick="closeSidebar()">
    </div>

    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r border-white/10 bg-transparent transition-transform duration-500 ease-out lg:translate-x-0">

        <div class="flex h-20 items-center border-b border-white/10 px-6">

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl">
                    <img src="{{ asset('images/blackorchidIcon.png') }}"
                        alt="Blackorchid"
                        class="h-11 w-11 object-contain">
                </div>

                <div>
                    <p class="font-bold tracking-[0.18em] text-white">
                        BLACKORCHID
                    </p>

                    <p class="text-[10px] font-medium tracking-[0.2em] text-violet-400">
                        CONTROL CENTER
                    </p>
                </div>

            </div>

            <button type="button"
                onclick="closeSidebar()"
                class="ml-auto flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-white/5 hover:text-white lg:hidden">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>

        <div class="flex-1 overflow-y-auto px-4 py-6">

            <p class="px-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-slate-600">
                Main Menu
            </p>

            <nav class="mt-3 space-y-1">

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl bg-violet-600/10 px-3 py-3 text-sm font-medium text-violet-300">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-500/10">
                        <i class="fa-solid fa-chart-pie"></i>
                    </span>

                    Dashboard

                </a>

                <a href="#clients"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/5">
                        <i class="fa-solid fa-users"></i>
                    </span>

                    Clients

                </a>

                <a href="#clients"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/5">
                        <i class="fa-solid fa-qrcode"></i>
                    </span>

                    QR Codes

                </a>

            </nav>

            <p class="mt-8 px-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-slate-600">
                System
            </p>

            <nav class="mt-3 space-y-1">

                <a href="#analytics"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/5">
                        <i class="fa-solid fa-chart-line"></i>
                    </span>

                    Analytics

                </a>

                <a href="#system"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/5">
                        <i class="fa-solid fa-gear"></i>
                    </span>

                    Settings

                </a>

            </nav>

        </div>

        <div class="border-t border-white/10 p-4">

            <div class="rounded-2xl border border-white/10 p-4 transition duration-300 hover:border-violet-500/20 hover:bg-violet-500/[0.02]">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400 transition duration-300 hover:scale-105">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div class="min-w-0">

                        <p class="truncate text-sm font-medium text-white">
                            {{ ucwords(Auth::guard('admin')->user()->username) }}
                        </p>

                        <p class="flex items-center gap-1 text-xs text-emerald-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Online
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </aside>

    <div id="mainContent"
        class="pl-0 transition-all duration-500 ease-out lg:pl-72">

        <header class="sticky top-0 z-30 border-b border-white/10 bg-transparent backdrop-blur-xl">

            <div class="flex h-20 items-center justify-between px-5 sm:px-6 lg:px-8">

                <div class="flex items-center gap-4">

                    <button type="button"
                        onclick="openSidebar()"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-slate-400 transition hover:bg-white/5 hover:text-white lg:hidden">

                        <i class="fa-solid fa-bars"></i>

                    </button>

                    <div class="hidden sm:block">

                        <p class="text-xs text-slate-500">
                            Blackorchid Administration
                        </p>

                        <p class="mt-0.5 text-sm font-medium text-white">
                            Control Center
                        </p>

                    </div>

                </div>

                <div class="flex items-center gap-2 sm:gap-3">

                    <div class="hidden items-center gap-2 rounded-xl border border-emerald-500/10 bg-emerald-500/5 px-3 py-2 sm:flex"
                        title="Dashboard automatically refreshes every 30 seconds">

                        <span class="relative flex h-2 w-2 live-indicator">

                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-60"></span>

                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>

                        </span>

                        <span class="text-xs font-medium text-emerald-300">
                            Live
                        </span>

                        <span class="text-[10px] text-slate-600">
                            ·
                        </span>

                        <span id="refreshCountdown"
                            class="text-[10px] text-slate-500">
                            30s
                        </span>

                    </div>

                    <button type="button"
                        onclick="manualRefresh()"
                        title="Refresh dashboard now"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-slate-400 transition hover:bg-white/5 hover:text-white">

                        <i id="refreshIcon"
                            class="fa-solid fa-rotate-right"></i>

                    </button>

                    <button type="button"
                        class="notification-button relative flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-slate-400 transition hover:bg-white/5 hover:text-white">

                        <i class="fa-regular fa-bell"></i>

                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-violet-500"></span>

                    </button>

                    <div class="hidden h-8 w-px bg-transparent sm:block"></div>

                    <div class="hidden text-right sm:block">

                        <p class="text-sm font-medium text-white">
                            {{ ucwords(Auth::guard('admin')->user()->username) }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Super Administrator
                        </p>

                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-violet-500/20 bg-violet-500/10 text-violet-400 transition duration-300 hover:scale-105 hover:bg-violet-500/15">

                        <i class="fa-solid fa-user-shield"></i>

                    </div>

                    <form method="POST"
                        action="{{ route('admin.logout') }}">

                        @csrf

                        <button type="submit"
                            title="Sign out"
                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-slate-500 transition hover:border-red-400/20 hover:bg-red-400/10 hover:text-red-300 sm:h-auto sm:w-auto sm:px-3 sm:py-2">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            <span class="ml-2 hidden text-sm sm:inline">
                                Sign out
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </header>

        <main class="mx-auto max-w-[1600px] p-5 sm:p-6 lg:p-8">

            <div class="relative overflow-hidden rounded-3xl border border-white/10 p-6 sm:p-8">

                <div class="absolute -right-24 -top-24 h-64 w-64 rounded-full bg-violet-600/10 blur-3xl transition duration-700 hover:scale-125"></div>

                <div class="absolute -bottom-24 -left-24 h-56 w-56 rounded-full bg-amber-500/[0.03] blur-3xl"></div>

                <div class="relative flex flex-col justify-between gap-6 lg:flex-row lg:items-center">

                    <div>

                        <div class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-violet-400">

                            <i class="fa-solid fa-sparkles"></i>

                            Overview

                        </div>

                        <h1 class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">
                            Administration Dashboard
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                            Monitor your Blackorchid clients, QR code generation activity,
                            and overall system usage from one place.
                        </p>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="rounded-2xl border border-white/10 bg-black/20 px-4 py-3 transition duration-300 hover:-translate-y-1 hover:border-emerald-400/20">

                            <p class="text-[10px] uppercase tracking-widest text-slate-600">
                                System
                            </p>

                            <div class="mt-1 flex items-center gap-2">

                                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>

                                <span class="text-sm font-medium text-emerald-300">
                                    Operational
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                <div class="dashboard-card group rounded-2xl border border-white/10 p-5 transition duration-300 hover:-translate-y-1 hover:border-blue-400/20">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Clients
                            </p>

                            <p class="mt-3 text-3xl font-semibold tracking-tight">
                                {{ $stats['clients'] }}
                            </p>

                            <p class="mt-2 flex items-center gap-1 text-xs text-slate-600">
                                <i class="fa-solid fa-users"></i>
                                Registered accounts
                            </p>

                        </div>

                        <div class="icon-animated flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/10 text-blue-400">
                            <i class="fa-solid fa-users text-lg"></i>
                        </div>

                    </div>

                </div>

                <div class="dashboard-card group rounded-2xl border border-white/10 p-5 transition duration-300 hover:-translate-y-1 hover:border-emerald-400/20">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Active Clients
                            </p>

                            <p class="mt-3 text-3xl font-semibold tracking-tight">
                                {{ $stats['active_clients'] }}
                            </p>

                            <p class="mt-2 flex items-center gap-1 text-xs text-emerald-400">
                                <i class="fa-solid fa-circle-check"></i>
                                Currently active
                            </p>

                        </div>

                        <div class="icon-animated flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/10 text-emerald-400">
                            <i class="fa-solid fa-user-check text-lg"></i>
                        </div>

                    </div>

                </div>

                <div class="dashboard-card group rounded-2xl border border-white/10 p-5 transition duration-300 hover:-translate-y-1 hover:border-violet-400/20">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total QR Codes
                            </p>

                            <p class="mt-3 text-3xl font-semibold tracking-tight">
                                {{ $stats['qr_codes'] }}
                            </p>

                            <p class="mt-2 flex items-center gap-1 text-xs text-violet-400">
                                <i class="fa-solid fa-qrcode"></i>
                                Generated codes
                            </p>

                        </div>

                        <div class="icon-animated flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-500/10 text-violet-400">
                            <i class="fa-solid fa-qrcode text-lg"></i>
                        </div>

                    </div>

                </div>

                <div class="dashboard-card group rounded-2xl border border-white/10 p-5 transition duration-300 hover:-translate-y-1 hover:border-amber-400/20">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Generated Today
                            </p>

                            <p class="mt-3 text-3xl font-semibold tracking-tight">
                                {{ $stats['today'] }}
                            </p>

                            <p class="mt-2 flex items-center gap-1 text-xs text-amber-400">
                                <i class="fa-solid fa-calendar-day"></i>
                                Today's activity
                            </p>

                        </div>

                        <div class="icon-animated flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/10 text-amber-400">
                            <i class="fa-solid fa-chart-column text-lg"></i>
                        </div>

                    </div>

                </div>

            </div>

            <div class="animated-section mt-6 grid gap-5 lg:grid-cols-3">

                <div class="rounded-2xl border border-white/10 p-6">

                    <div class="flex items-center gap-3">

                        <div class="icon-animated flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400">
                            <i class="fa-solid fa-bolt"></i>
                        </div>

                        <div>

                            <h2 class="font-semibold">
                                Quick Actions
                            </h2>

                            <p class="text-xs text-slate-600">
                                Frequently used tools
                            </p>

                        </div>

                    </div>

                    <div class="mt-5 grid gap-3">

                        <a href="#clients"
                            class="quick-action flex items-center justify-between rounded-xl border border-white/5 p-3 transition hover:border-violet-500/20 hover:bg-violet-500/5">

                            <div class="flex items-center gap-3">

                                <i class="fa-solid fa-users text-sm text-blue-400"></i>

                                <span class="text-sm text-slate-300">
                                    Manage Clients
                                </span>

                            </div>

                            <i class="fa-solid fa-chevron-right text-xs text-slate-600"></i>

                        </a>

                        <a href="#clients"
                            class="quick-action flex items-center justify-between rounded-xl border border-white/5 p-3 transition hover:border-violet-500/20 hover:bg-violet-500/5">

                            <div class="flex items-center gap-3">

                                <i class="fa-solid fa-qrcode text-sm text-violet-400"></i>

                                <span class="text-sm text-slate-300">
                                    View QR Activity
                                </span>

                            </div>

                            <i class="fa-solid fa-chevron-right text-xs text-slate-600"></i>

                        </a>

                        <a href="#system"
                            class="quick-action flex items-center justify-between rounded-xl border border-white/5 p-3 transition hover:border-violet-500/20 hover:bg-violet-500/5">

                            <div class="flex items-center gap-3">

                                <i class="fa-solid fa-chart-line text-sm text-emerald-400"></i>

                                <span class="text-sm text-slate-300">
                                    System Overview
                                </span>

                            </div>

                            <i class="fa-solid fa-chevron-right text-xs text-slate-600"></i>

                        </a>

                    </div>

                </div>

                <div id="system"
                    class="rounded-2xl border border-white/10 p-6 lg:col-span-2">

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <div class="icon-animated flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400">
                                <i class="fa-solid fa-server"></i>
                            </div>

                            <div>

                                <h2 class="font-semibold">
                                    System Status
                                </h2>

                                <p class="text-xs text-slate-600">
                                    Current Blackorchid services
                                </p>

                            </div>

                        </div>

                        <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs text-emerald-300">
                            Operational
                        </span>

                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-3">

                        <div class="system-status-card rounded-xl border border-white/5 bg-black/10 p-4">

                            <div class="flex items-center gap-2 text-sm text-slate-400">

                                <i class="fa-solid fa-globe text-emerald-400"></i>

                                Application

                            </div>

                            <p class="mt-3 text-sm font-medium text-emerald-400">
                                Online
                            </p>

                        </div>

                        <div class="system-status-card rounded-xl border border-white/5 bg-black/10 p-4">

                            <div class="flex items-center gap-2 text-sm text-slate-400">

                                <i class="fa-solid fa-database text-blue-400"></i>

                                Database

                            </div>

                            <p class="mt-3 text-sm font-medium text-emerald-400">
                                Connected
                            </p>

                        </div>

                        <div class="system-status-card rounded-xl border border-white/5 bg-black/10 p-4">

                            <div class="flex items-center gap-2 text-sm text-slate-400">

                                <i class="fa-solid fa-qrcode text-violet-400"></i>

                                QR Service

                            </div>

                            <p class="mt-3 text-sm font-medium text-emerald-400">
                                Ready
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div id="clients"
                class="animated-section mt-6 overflow-hidden rounded-2xl border border-white/10">

                <div class="border-b border-white/10 p-5 sm:p-6">

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="icon-animated flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400">
                                <i class="fa-solid fa-users"></i>
                            </div>

                            <div>

                                <h2 class="font-semibold">
                                    Client Management
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Registered Blackorchid clients and their QR activity.
                                </p>

                            </div>

                        </div>

                        <div class="flex w-full items-center gap-2 lg:w-auto">

                            <div class="relative w-full lg:w-72">

                                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-xs text-slate-600"></i>

                                <input id="clientSearch"
                                    type="search"
                                    placeholder="Search clients..."
                                    class="w-full rounded-xl border border-white/10 bg-black/20 py-2.5 pl-10 pr-4 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-violet-500/40">

                            </div>

                        </div>

                    </div>

                </div>

                <div id="clientScroll"
                    class="client-scroll overflow-x-auto overflow-y-auto">

                    <table class="w-full min-w-[760px] text-left text-sm">

                        <thead class="sticky top-0 z-10 border-b border-white/5 bg-transparent text-xs uppercase tracking-wider text-slate-600">

                            <tr>

                                <th class="px-5 py-4 sm:px-6">
                                    Client
                                </th>

                                <th class="px-5 py-4 sm:px-6">
                                    Status
                                </th>

                                <th class="px-5 py-4 sm:px-6">
                                    QR Codes
                                </th>

                                <th class="px-5 py-4 sm:px-6">
                                    Account
                                </th>

                                <th class="px-5 py-4 text-right sm:px-6">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody id="clientTable"
                            class="divide-y divide-white/5">

                            @forelse ($clients as $client)

                                <tr class="client-row transition hover:bg-white/[0.02]"
                                    data-search="{{ strtolower($client->name . ' ' . $client->email) }}">

                                    <td class="px-5 py-4 sm:px-6">

                                        <div class="flex items-center gap-3">

                                            <div class="relative h-10 w-10 shrink-0">

                                                @php
                                                    $avatar = $client->avatar ?? null;
                                                    $profilePicture = $client->profile_picture ?? null;

                                                    $avatarUrl = null;
                                                    $profilePictureUrl = null;

                                                    if ($avatar) {
                                                        $avatarUrl =
                                                            \Illuminate\Support\Str::startsWith($avatar, [
                                                                'http://',
                                                                'https://',
                                                            ])
                                                                ? $avatar
                                                                : asset('storage/' . ltrim($avatar, '/'));
                                                    }

                                                    if ($profilePicture) {
                                                        $profilePictureUrl =
                                                            \Illuminate\Support\Str::startsWith(
                                                                $profilePicture,
                                                                ['http://', 'https://'],
                                                            )
                                                                ? $profilePicture
                                                                : asset('storage/' . ltrim($profilePicture, '/'));
                                                    }

                                                    $primaryImage = $avatarUrl ?: $profilePictureUrl;

                                                    $fallbackImage =
                                                        $avatarUrl && $profilePictureUrl
                                                            ? $profilePictureUrl
                                                            : null;
                                                @endphp

                                                @if ($primaryImage)

                                                    <img src="{{ $primaryImage }}"
                                                        alt="{{ $client->name }}"
                                                        class="client-profile-image h-10 w-10 rounded-xl object-cover ring-1 ring-white/10"
                                                        data-fallback="{{ $fallbackImage ?? '' }}"
                                                        onerror="
                                                            const fallback = this.dataset.fallback;
                                                            if (fallback && this.src !== fallback) {
                                                                this.src = fallback;
                                                                this.dataset.fallback = '';
                                                            } else {
                                                                this.style.display = 'none';
                                                                this.nextElementSibling.classList.remove('hidden');
                                                                this.nextElementSibling.classList.add('flex');
                                                            }
                                                        ">

                                                    <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-violet-500/10 text-violet-300">

                                                        <i class="fa-solid fa-user"></i>

                                                    </div>

                                                @else

                                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-500/10 text-violet-300">

                                                        <i class="fa-solid fa-user"></i>

                                                    </div>

                                                @endif

                                            </div>

                                            <div class="min-w-0">

                                                <div class="truncate font-medium text-white">
                                                    {{ $client->name }}
                                                </div>

                                                <div class="mt-0.5 truncate text-xs text-slate-600">
                                                    {{ $client->email }}
                                                </div>

                                            </div>

                                        </div>

                                    </td>

                                    <td class="px-5 py-4 sm:px-6">

                                        @if ($client->last_seen_at && $client->last_seen_at->gte(now()->subMinutes(1)))

                                            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-400/10 bg-emerald-400/10 px-3 py-1.5 text-xs font-medium text-emerald-300">

                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>

                                                Online

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-2 rounded-full border border-slate-400/10 bg-slate-400/10 px-3 py-1.5 text-xs font-medium text-slate-400">

                                                <span class="h-1.5 w-1.5 rounded-full bg-slate-500"></span>

                                                Offline

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-5 py-4 sm:px-6">

                                        <div class="flex items-center gap-2">

                                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-500/10 text-violet-400 transition duration-300 hover:scale-110">

                                                <i class="fa-solid fa-qrcode text-xs"></i>

                                            </div>

                                            <span class="font-medium text-slate-300">
                                                {{ $client->qr_codes_count }}
                                            </span>

                                        </div>

                                    </td>

                                    <td class="px-5 py-4 sm:px-6">

                                        <span class="text-xs text-slate-500">
                                            Registered
                                        </span>

                                        <div class="mt-1 text-xs text-slate-400">
                                            {{ $client->created_at?->format('M d, Y') }}
                                        </div>

                                    </td>

                                    <td class="px-5 py-4 text-right sm:px-6">

                                        <a href="{{ route('admin.client', $client) }}"
                                            class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-3 py-2 text-xs font-medium text-violet-400 transition hover:border-violet-500/20 hover:bg-violet-500/10 hover:text-violet-300">

                                            View

                                            <i class="fa-solid fa-arrow-right text-[10px]"></i>

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="px-6 py-16 text-center">

                                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 text-slate-600">
                                            <i class="fa-solid fa-users-slash text-xl"></i>
                                        </div>

                                        <p class="mt-4 font-medium text-slate-400">
                                            No clients found
                                        </p>

                                        <p class="mt-1 text-sm text-slate-600">
                                            Registered clients will appear here.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="flex flex-col gap-4 border-t border-white/5 p-5 sm:p-6 md:flex-row md:items-center md:justify-between">

                    <p class="text-xs text-slate-600">
                        Showing registered clients
                    </p>

                    <div>
                        {{ $clients->links() }}
                    </div>

                </div>

            </div>

            <section id="analytics"
                class="mt-6"
                aria-labelledby="analytics-title">

                <div class="mb-5 flex items-center gap-3">

                    <div class="icon-animated flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <div>

                        <h2 id="analytics-title"
                            class="font-semibold text-white">
                            Analytics Overview
                        </h2>

                        <p class="text-xs text-slate-600">
                            Monitor QR generation and client activity
                        </p>

                    </div>

                </div>

                <div class="grid gap-5 xl:grid-cols-3">

                    <article class="rounded-2xl border border-white/10 p-5 sm:p-6 xl:col-span-2">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <div class="flex items-center gap-2">

                                    <span class="icon-animated flex h-9 w-9 items-center justify-center rounded-lg bg-violet-500/10 text-violet-400">
                                        <i class="fa-solid fa-chart-line"></i>
                                    </span>

                                    <h3 class="font-semibold text-white">
                                        QR Generation Activity
                                    </h3>

                                </div>

                                <p class="mt-2 text-xs text-slate-600">
                                    QR codes generated during the last 7 days
                                </p>

                            </div>

                            <div class="flex items-center gap-2 rounded-lg border border-violet-500/10 bg-violet-500/5 px-3 py-2 transition duration-300 hover:-translate-y-0.5">

                                <span class="h-2 w-2 rounded-full bg-violet-400 animate-pulse"></span>

                                <span class="text-xs text-violet-300">
                                    QR Codes
                                </span>

                            </div>

                        </div>

                        <div class="relative mt-6 h-[300px]">
                            <canvas id="qrLineChart"></canvas>
                        </div>

                    </article>

                    <article class="rounded-2xl border border-white/10 p-5 sm:p-6">

                        <div>

                            <div class="flex items-center gap-2">

                                <span class="icon-animated flex h-9 w-9 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                    <i class="fa-solid fa-chart-pie"></i>
                                </span>

                                <h3 class="font-semibold text-white">
                                    Client Status
                                </h3>

                            </div>

                            <p class="mt-2 text-xs text-slate-600">
                                Online and Offline client accounts
                            </p>

                        </div>

                        <div class="relative mx-auto mt-6 h-[260px] max-w-[260px]">
                            <canvas id="clientPieChart"></canvas>
                        </div>

                        <div class="mt-5 grid grid-cols-2 gap-3">

                            <div class="rounded-xl border border-slate-500/10 bg-slate-500/5 p-3 transition duration-300 hover:-translate-y-1">

                                <div class="flex items-center gap-2">

                                    <span class="h-2 w-2 rounded-full bg-slate-500"></span>

                                    <span class="text-xs text-slate-500">
                                        Offline
                                    </span>

                                </div>

                                <p class="mt-2 text-xl font-semibold text-slate-300">
                                    {{ $stats['offline_clients'] }}
                                </p>

                            </div>

                            <div class="rounded-xl border border-emerald-500/10 bg-emerald-500/5 p-3 transition duration-300 hover:-translate-y-1">

                                <div class="flex items-center gap-2">

                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

                                    <span class="text-xs text-emerald-400">
                                        Online
                                    </span>

                                </div>

                                <p class="mt-2 text-xl font-semibold text-emerald-300">
                                    {{ $stats['online_clients'] }}
                                </p>

                            </div>

                        </div>

                    </article>

                </div>

                <article class="mt-5 rounded-2xl border border-white/10 p-5 sm:p-6">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="flex items-center gap-2">

                                <span class="icon-animated flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-400">
                                    <i class="fa-solid fa-chart-column"></i>
                                </span>

                                <h3 class="font-semibold text-white">
                                    Monthly QR Generation
                                </h3>

                            </div>

                            <p class="mt-2 text-xs text-slate-600">
                                QR codes generated during the last 6 months
                            </p>

                        </div>

                        <div class="flex items-center gap-2 rounded-lg border border-emerald-500/10 bg-emerald-500/5 px-3 py-2">

                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>

                            <span class="text-xs text-emerald-300">
                                Monthly Activity
                            </span>

                        </div>

                    </div>

                    <div class="relative mt-6 h-[320px]">
                        <canvas id="qrBarChart"></canvas>
                    </div>

                </article>

            </section>

            <footer class="mt-8 flex flex-col items-center justify-between gap-3 border-t border-white/5 py-6 text-xs text-slate-700 sm:flex-row">

                <p>
                    © {{ date('Y') }} Blackorchid Free QR Code
                </p>

                <p class="flex items-center gap-2">

                    <i class="fa-solid fa-shield-halved"></i>

                    Administrator Control Center

                </p>

            </footer>

        </main>

    </div>

    <script>
        const AUTO_REFRESH_SECONDS = 30;

        let refreshSeconds = AUTO_REFRESH_SECONDS;
        let refreshTimer = null;

        let lastScrollTop = window.scrollY || 0;
        let scrollTicking = false;

        function setDesktopSidebarState(showSidebar) {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (!sidebar || !mainContent) {
                return;
            }

            if (window.innerWidth < 1024) {
                sidebar.style.transform = '';
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('lg:translate-x-0');

                mainContent.style.paddingLeft = '';

                return;
            }

            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.remove('lg:translate-x-0');

            if (showSidebar) {
                sidebar.style.transform = 'translateX(0)';
                sidebar.classList.remove('sidebar-hidden');

                mainContent.style.paddingLeft = '18rem';
            } else {
                sidebar.style.transform = 'translateX(-100%)';
                sidebar.classList.add('sidebar-hidden');

                mainContent.style.paddingLeft = '0';
            }
        }

        function handlePageScroll() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (!sidebar || !mainContent) {
                scrollTicking = false;
                return;
            }

            const currentScroll =
                window.scrollY ||
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                0;

            if (window.innerWidth < 1024) {
                sidebar.style.transform = '';
                mainContent.style.paddingLeft = '';

                lastScrollTop = currentScroll;
                scrollTicking = false;

                return;
            }

            const difference = currentScroll - lastScrollTop;

            if (currentScroll <= 80) {
                setDesktopSidebarState(true);
            } else if (difference > 3) {
                setDesktopSidebarState(false);
            } else if (difference < -3) {
                setDesktopSidebarState(true);
            }

            lastScrollTop = Math.max(currentScroll, 0);
            scrollTicking = false;
        }

        window.addEventListener('scroll', function() {
            if (!scrollTicking) {
                window.requestAnimationFrame(handlePageScroll);
                scrollTicking = true;
            }
        }, {
            passive: true
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const currentScroll = window.scrollY || 0;

                if (currentScroll <= 80) {
                    setDesktopSidebarState(true);
                } else {
                    setDesktopSidebarState(true);
                }
            } else {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');

                if (sidebar) {
                    sidebar.style.transform = '';
                    sidebar.classList.add('-translate-x-full');
                }

                if (mainContent) {
                    mainContent.style.paddingLeft = '';
                }
            }

            lastScrollTop = window.scrollY || 0;
        });

        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.style.transform = '';

            sidebar.classList.remove('-translate-x-full');

            overlay.classList.remove('hidden');

            requestAnimationFrame(function() {
                overlay.style.opacity = '1';
            });
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            if (!sidebar || !overlay) {
                return;
            }

            if (window.innerWidth >= 1024) {
                setDesktopSidebarState(true);
                return;
            }

            sidebar.style.transform = '';

            sidebar.classList.add('-translate-x-full');

            overlay.style.opacity = '0';

            setTimeout(function() {
                if (
                    window.innerWidth < 1024 &&
                    sidebar.classList.contains('-translate-x-full')
                ) {
                    overlay.classList.add('hidden');
                }
            }, 300);
        }

        function updateRefreshCountdown() {
            const countdown =
                document.getElementById('refreshCountdown');

            if (countdown) {
                countdown.textContent =
                    refreshSeconds + 's';
            }
        }

        function resetRefreshTimer() {
            refreshSeconds = AUTO_REFRESH_SECONDS;
            updateRefreshCountdown();
        }

        function manualRefresh() {
            const icon =
                document.getElementById('refreshIcon');

            if (icon) {
                icon.classList.add('fa-spin');
            }

            document.body.classList.add('refreshing');

            setTimeout(function() {
                window.location.reload();
            }, 250);
        }

        refreshTimer = setInterval(function() {
            refreshSeconds--;

            updateRefreshCountdown();

            if (refreshSeconds <= 0) {
                clearInterval(refreshTimer);
                window.location.reload();
            }
        }, 1000);

        document.addEventListener(
            'visibilitychange',
            function() {
                if (!document.hidden) {
                    resetRefreshTimer();
                }
            }
        );

        const clientSearch =
            document.getElementById('clientSearch');

        if (clientSearch) {
            clientSearch.addEventListener(
                'input',
                function() {
                    const search =
                        this.value.toLowerCase().trim();

                    const rows =
                        document.querySelectorAll('.client-row');

                    rows.forEach(function(row) {
                        const content =
                            row.getAttribute('data-search') || '';

                        if (content.includes(search)) {
                            row.classList.remove('hidden');

                            requestAnimationFrame(function() {
                                row.style.opacity = '1';
                                row.style.transform =
                                    'translateY(0)';
                            });
                        } else {
                            row.classList.add('hidden');
                        }
                    });
                }
            );
        }

        document.addEventListener(
            'keydown',
            function(event) {
                if (event.key === 'Escape') {
                    closeSidebar();
                }
            }
        );

        document.querySelectorAll(
            '#sidebar nav a[href^="#"]'
        ).forEach(function(link) {
            link.addEventListener(
                'click',
                function() {
                    if (window.innerWidth < 1024) {
                        closeSidebar();
                    }
                }
            );
        });

        document.querySelectorAll(
            'a[href^="#"]'
        ).forEach(function(link) {
            link.addEventListener(
                'click',
                function(event) {
                    const targetId =
                        this.getAttribute('href');

                    if (
                        !targetId ||
                        targetId === '#'
                    ) {
                        return;
                    }

                    const target =
                        document.querySelector(targetId);

                    if (!target) {
                        return;
                    }

                    event.preventDefault();

                    const header =
                        document.querySelector('header');

                    const headerHeight =
                        header
                            ? header.offsetHeight
                            : 80;

                    const targetPosition =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        headerHeight -
                        20;

                    window.scrollTo({
                        top: Math.max(targetPosition, 0),
                        behavior: 'smooth'
                    });

                    if (window.innerWidth < 1024) {
                        closeSidebar();
                    }
                }
            );
        });

        if (window.innerWidth >= 1024) {
            setDesktopSidebarState(true);
        }
    </script>

    <script>
        const lineLabels = @json($lineLabels);
        const lineData = @json($lineData);

        const pieLabels = @json($pieLabels);
        const pieData = @json($pieData);

        const barLabels = @json($barLabels);
        const barData = @json($barData);

        Chart.defaults.color = '#64748b';

        Chart.defaults.font.family =
            'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';

        const chartGridColor =
            'rgba(255,255,255,0.05)';

        const chartAnimation = {
            duration: 1400,
            easing: 'easeOutQuart'
        };

        const lineCanvas =
            document.getElementById('qrLineChart');

        if (lineCanvas) {
            new Chart(lineCanvas, {
                type: 'line',

                data: {
                    labels: lineLabels,

                    datasets: [{
                        label: 'QR Codes Generated',
                        data: lineData,
                        borderColor: '#a78bfa',
                        backgroundColor: 'rgba(139,92,246,0.12)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#a78bfa',
                        pointBorderColor: '#09090d',
                        pointBorderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: chartAnimation,

                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },

                    plugins: {
                        legend: {
                            display: false
                        },

                        tooltip: {
                            backgroundColor: '#111116',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 12,
                            titleColor: '#ffffff',
                            bodyColor: '#cbd5e1',
                            displayColors: false
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: false
                            },

                            border: {
                                display: false
                            },

                            ticks: {
                                color: '#64748b'
                            }
                        },

                        y: {
                            beginAtZero: true,

                            grid: {
                                color: chartGridColor
                            },

                            border: {
                                display: false
                            },

                            ticks: {
                                color: '#64748b',
                                precision: 0
                            }
                        }
                    }
                }
            });
        }

        const pieCanvas =
            document.getElementById('clientPieChart');

        if (pieCanvas) {
            new Chart(pieCanvas, {
                type: 'doughnut',

                data: {
                    labels: pieLabels,

                    datasets: [{
                        data: pieData,

                        backgroundColor: [
                            'rgba(139, 92, 246, 0.85)',
                            'rgba(71, 85, 105, 0.35)'
                        ],

                        borderColor:
                            'rgba(139, 92, 246, 0.15)',

                        borderWidth: 3,
                        hoverOffset: 8
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',

                    animation: {
                        animateRotate: true,
                        animateScale: true,
                        duration: 1400,
                        easing: 'easeOutQuart'
                    },

                    plugins: {
                        legend: {
                            display: false
                        },

                        tooltip: {
                            backgroundColor:
                                'rgba(15, 10, 25, 0.95)',

                            borderColor:
                                'rgba(167, 139, 250, 0.35)',

                            borderWidth: 1,
                            padding: 12,
                            titleColor: '#c4b5fd',
                            bodyColor: '#e9d5ff'
                        }
                    }
                }
            });
        }

        const barCanvas =
            document.getElementById('qrBarChart');

        if (barCanvas) {
            new Chart(barCanvas, {
                type: 'bar',

                data: {
                    labels: barLabels,

                    datasets: [{
                        label: 'QR Codes',
                        data: barData,
                        backgroundColor: 'rgba(139,92,246,0.65)',
                        borderColor: '#a78bfa',
                        borderWidth: 1,
                        borderRadius: 8,
                        borderSkipped: false,
                        maxBarThickness: 55
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    animation: {
                        duration: 1400,
                        easing: 'easeOutQuart',

                        delay: function(context) {
                            return context.dataIndex * 100;
                        }
                    },

                    plugins: {
                        legend: {
                            display: false
                        },

                        tooltip: {
                            backgroundColor: '#111116',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 12,
                            titleColor: '#ffffff',
                            bodyColor: '#cbd5e1',
                            displayColors: false
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: false
                            },

                            border: {
                                display: false
                            },

                            ticks: {
                                color: '#64748b'
                            }
                        },

                        y: {
                            beginAtZero: true,

                            grid: {
                                color: chartGridColor
                            },

                            border: {
                                display: false
                            },

                            ticks: {
                                color: '#64748b',
                                precision: 0
                            }
                        }
                    }
                }
            });
        }
    </script>

    <script>
        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const scrollContainer =
                    document.getElementById('clientScroll');

                if (!scrollContainer) {
                    return;
                }

                let scrollTimeout;

                scrollContainer.addEventListener(
                    'scroll',
                    function() {

                        scrollContainer.classList.add(
                            'is-scrolling'
                        );

                        clearTimeout(scrollTimeout);

                        scrollTimeout = setTimeout(
                            function() {

                                scrollContainer.classList.remove(
                                    'is-scrolling'
                                );

                            },
                            700
                        );

                    }, {
                        passive: true
                    }
                );

            }
        );
    </script>

</body>

</html>