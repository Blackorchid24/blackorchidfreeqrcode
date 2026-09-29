<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Create Account · Blackorchid</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>

<body class="min-h-screen bg-[#07070a] text-slate-100">

    <div class="flex min-h-screen items-center justify-center p-6">

        <div class="w-full max-w-md">

            <div class="mb-8 text-center">

                <div
                    class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-2xl text-xl font-black">
                    <div class="grid h-11 w-11 place-items-center">
                        <img src="{{ asset('images/blackorchidIcon.png') }}" alt="Blackorchid"
                            class="h-11 w-11 object-contain">
                    </div>
                </div>

                <h1 class="text-2xl font-bold">
                    BLACKORCHID
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Free QR Code Generator
                </p>

            </div>

            <div class="rounded-3xl border border-white/10 bg-white/0.03 p-7 shadow-2xl">

                <div class="mb-6">

                    <h2 class="flex items-center gap-3 text-2xl font-semibold">
                        <i class="fa-solid fa-user-plus text-violet-400"></i>
                        Create your account
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Create an account to start generating QR codes.
                    </p>

                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-400/20 bg-red-400/10 p-4 text-sm text-red-300">
                        <div class="flex items-center gap-2 font-medium">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Please check the following:
                        </div>

                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-user mr-2 text-slate-600"></i>
                            Full Name
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input type="text" name="name" value="{{ old('name') }}" required
                                autocomplete="name" placeholder="Your full name"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-envelope mr-2 text-slate-600"></i>
                            Email
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="you@example.com"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-lock mr-2 text-slate-600"></i>
                            Password
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input type="password" name="password" required autocomplete="new-password"
                                placeholder="Minimum 8 characters"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-slate-400">
                            <i class="fa-solid fa-lock mr-2 text-slate-600"></i>
                            Confirm Password
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>

                            <input type="password" name="password_confirmation" required autocomplete="new-password"
                                placeholder="Repeat your password"
                                class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                        </div>
                    </div>

                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3 font-semibold transition hover:bg-violet-500 hover:shadow-lg hover:shadow-violet-900/20">
                        <i class="fa-solid fa-user-plus"></i>
                        Create Account
                    </button>

                </form>

                <div class="mt-6 text-center text-sm text-slate-500">
                    Already have an account?

                    <a href="{{ route('login') }}"
                        class="ml-1 inline-flex items-center gap-1 text-violet-400 transition hover:text-violet-300">
                        <i class="fa-solid fa-right-to-bracket text-xs"></i>
                        Sign in
                    </a>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
