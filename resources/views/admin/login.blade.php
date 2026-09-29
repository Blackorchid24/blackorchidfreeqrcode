<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="http://127.0.0.1:8000/images/blackorchidIcon.png">
<title>Admin Login · Blackorchid</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="grid min-h-screen place-items-center bg-[#050507] p-6 text-slate-100">

<div class="w-full max-w-md rounded-3xl border border-white/10 bg-white/0.03 p-8 shadow-2xl">

    <div class="flex flex-col items-center text-center">

        <div class="flex h-24 w-24 items-center justify-center">
            <img
                src="{{ asset('images/blackorchidIcon.png') }}"
                alt="Blackorchid"
                class="h-24 w-24 object-contain"
            >
        </div>

        <p class="mt-5 flex items-center justify-center gap-2 text-xs uppercase tracking-[0.3em] text-violet-400">
            <i class="fa-solid fa-shield-halved"></i>
            Blackorchid Control Center
        </p>

        <h1 class="mt-3 text-3xl font-semibold tracking-tight">
            Administrator sign in
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Sign in to manage clients and QR codes.
        </p>

    </div>

    @if ($errors->any())
        <div class="mt-6 flex items-start gap-3 rounded-xl border border-red-400/20 bg-red-400/10 p-3 text-sm text-red-300">
            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

            <span>
                {{ $errors->first() }}
            </span>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.store') }}" class="mt-7 space-y-4">
        @csrf

        <div>
            <label class="mb-2 block text-sm text-slate-400">
                Username
            </label>

            <div class="relative">
                <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                <input
                    name="username"
                    value="{{ old('username') }}"
                    required
                    autocomplete="username"
                    placeholder="Enter your username"
                    class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition placeholder:text-slate-600 focus:border-violet-500/50 focus:bg-white/[0.07]"
                >
            </div>
        </div>

        <div>
            <label class="mb-2 block text-sm text-slate-400">
                Password
            </label>

            <div class="relative">
                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition placeholder:text-slate-600 focus:border-violet-500/50 focus:bg-white/[0.07]"
                >
            </div>
        </div>

        <div class="flex items-center gap-2">
            <input
                id="remember"
                name="remember"
                type="checkbox"
                value="1"
                class="h-4 w-4 rounded border-white/10 bg-white/5 text-violet-600 focus:ring-violet-500/30"
            >

            <label for="remember" class="text-sm text-slate-400">
                Remember me
            </label>
        </div>

        <button
            type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3 font-semibold transition hover:bg-violet-500"
        >
            <i class="fa-solid fa-right-to-bracket"></i>
            Sign in
        </button>
    </form>

    <div class="mt-6 flex items-center justify-center gap-2 text-xs text-slate-600">
        <i class="fa-solid fa-lock"></i>
        Protected Administrator Area
    </div>

</div>

</body>

</html>
