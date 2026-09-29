<x-layouts.client>
    <x-slot:title>Profile · Blackorchid</x-slot:title>
    <x-slot:heading>Profile</x-slot:heading>

    <div class="max-w-6xl">
        <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/0.03 shadow-xl shadow-black/10">

            <div class="border-b border-white/10 px-6 py-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-600/15 text-violet-400">
                        <i class="fa-solid fa-user text-lg"></i>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-white">Account settings</h2>
                        <p class="text-sm text-slate-400">Manage your Blackorchid account information.</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5 p-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-300">
                        Full name
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                            required autocomplete="name"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 text-white outline-none transition placeholder:text-slate-500 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20">
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-400">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-300">
                        Email address
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                            required autocomplete="email"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 text-white outline-none transition placeholder:text-slate-500 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20">
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-400">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-300">
                        New password
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                        <input id="password" name="password" type="password" placeholder="New password (optional)"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 text-white outline-none transition placeholder:text-slate-500 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20">
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-400">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-300">
                        Confirm new password
                    </label>

                    <div class="relative">
                        <i
                            class="fa-solid fa-shield-halved absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>

                        <input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm new password" autocomplete="new-password"
                            class="w-full rounded-xl border border-white/10 bg-white/5 py-3 pl-11 pr-4 text-white outline-none transition placeholder:text-slate-500 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20">
                    </div>
                </div>

                <div class="flex items-center justify-end border-t border-white/10 pt-5">
                    <button type="submit"
                        class="inline-flex cursor-pointer items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm font-medium text-slate-200 transition hover:border-violet-500/40 hover:bg-violet-500/10 hover:text-violet-300">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save changes
                    </button>
                </div>
            
            </form>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    @endpush
</x-layouts.client>
