<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/blackorchidIcon.png') }}">
    <title>Sign in · Blackorchid</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>

<body class="min-h-screen bg-[#07070a] text-slate-100">

    <div class="grid min-h-screen lg:grid-cols-2">

        <section
            class="hidden .bg-gradient-to-br {
 --tw-gradient-position: to bottom right in oklab;
 background-image: linear-gradient(var(--tw-gradient-stops));
} from-violet-950 via-[#0d0b14] to-[#07070a] p-12 lg:flex lg:flex-col lg:justify-between">

            <div>
                <div class="flex items-center gap-3">
                    <div class="grid h-11 w-11 place-items-center">
                        <img src="{{ asset('images/blackorchidIcon.png') }}" alt="Blackorchid"
                            class="h-11 w-11 object-contain">
                    </div>

                    <span class="text-3xl font-extrabold tracking-[0.08em]">
                        BLACKORCHID
                    </span>
                </div>
            </div>

            <div>
                <p class="mb-4 flex items-center gap-2 text-sm uppercase tracking-[0.3em] text-violet-300">
                    <i class="fa-solid fa-qrcode"></i>
                    Free QR Code Generator
                </p>

                <h1 class="max-w-xl text-5xl font-semibold leading-tight">
                    Create polished QR codes for your links.
                </h1>

                <p class="mt-5 flex max-w-lg items-start gap-3 text-slate-400">
                    <i class="fa-solid fa-wand-magic-sparkles mt-1 text-violet-400"></i>
                    <span>
                        Generate, customize and manage QR codes with optional image logos from one clean workspace.
                    </span>
                </p>
            </div>

            <p class="flex items-center gap-2 text-xs text-slate-600">
                <i class="fa-solid fa-layer-group"></i>
                BLACKORCHID DIGITAL TOOLS
            </p>

        </section>

        <section class="flex items-center justify-center p-6">

            <div class="w-full max-w-md">

                <div class="mb-8 lg:hidden">
                    <div
                        class="mb-4 grid h-12 w-12 place-items-center rounded-2xl bg-violet-600 text-xl font-black shadow-lg shadow-violet-900/30">
                        <i class="fa-solid fa-b"></i>
                    </div>

                    <div class="flex items-center gap-2 font-bold">
                        <i class="fa-solid fa-qrcode text-violet-400"></i>
                        BLACKORCHID
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="flex items-center gap-3 text-3xl font-extrabold tracking-[0.08em]">
                        <i class="fa-solid fa-right-to-bracket text-violet-400"></i>
                        Welcome back
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Sign in to your client workspace.
                    </p>
                </div>

                @if ($errors->any())
                    <div
                        class="mt-5 flex items-start gap-3 rounded-xl border border-red-400/20 bg-red-400/10 p-3 text-sm text-red-300">
                        <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="mt-7 space-y-4">
                    @csrf

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-envelope mr-2 text-slate-500"></i>
                            Email
                        </label>

                        <div class="relative">
                            <i
                                class="fa-solid fa-envelope pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input name="email" type="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="you@example.com"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-lock mr-2 text-slate-500"></i>
                            Password
                        </label>

                        <div class="relative">
                            <i
                                class="fa-solid fa-lock pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input name="password" type="password" required autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-500">
                        <input type="checkbox" name="remember"
                            class="rounded border-white/10 bg-white/5 text-violet-600 focus:ring-violet-500">
                        <span>Remember me</span>
                    </label>

                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3 font-semibold transition hover:bg-violet-500 hover:shadow-lg hover:shadow-violet-900/20">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Sign in
                    </button>
                </form>

                <div class="my-5 flex items-center gap-3 text-xs text-slate-600">
                    <span class="h-px flex-1 bg-white/10"></span>

                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-circle text-[4px]"></i>
                        OR
                        <i class="fa-solid fa-circle text-[4px]"></i>
                    </span>

                    <span class="h-px flex-1 bg-white/10"></span>
                </div>

                <a href="{{ route('google.redirect') }}"
                    class="flex w-full items-center justify-center gap-3 rounded-xl border border-white/10 bg-white px-4 py-3 font-medium text-slate-900 transition hover:bg-slate-100">
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path fill="#4285F4"
                            d="M23.49 12.27c0-.79-.07-1.55-.2-2.27H12v4.3h6.44a5.5 5.5 0 0 1-2.39 3.61v3h3.87c2.27-2.09 3.57-5.17 3.57-8.64Z" />
                        <path fill="#34A853"
                            d="M12 24c3.24 0 5.96-1.07 7.95-2.91l-3.87-3c-1.07.72-2.44 1.15-4.08 1.15-3.13 0-5.79-2.11-6.74-4.95H1.26v3.09A12 12 0 0 0 12 24Z" />
                        <path fill="#FBBC05"
                            d="M5.26 14.29A7.22 7.22 0 0 1 4.88 12c0-.8.14-1.58.38-2.29V6.62H1.26A12 12 0 0 0 0 12c0 1.94.46 3.77 1.26 5.38l4-3.09Z" />
                        <path fill="#EA4335"
                            d="M12 4.76c1.77 0 3.36.61 4.61 1.81l3.45-3.45C17.95 1.14 15.24 0 12 0A12 12 0 0 0 1.26 6.62l4 3.09C6.21 6.87 8.87 4.76 12 4.76Z" />
                    </svg>

                    <span>Continue with Google</span>
                </a>

                <p class="mt-7 text-center text-sm text-slate-500">
                    No account?
                    <a class="inline-flex items-center gap-1 text-violet-400 transition hover:text-violet-300"
                        href="{{ route('register') }}">
                        <i class="fa-solid fa-user-plus text-xs"></i>
                        Create one
                    </a>
                </p>

                <div class="mt-8 flex items-center justify-center gap-2 text-xs text-slate-700">
                    <i class="fa-solid fa-shield-halved"></i>
                    Secure client access
                </div>

            </div>

        </section>

    </div>

</body>

</html>
