<x-layouts.client>
    <x-slot:title>Profile · Blackorchid</x-slot:title>
    <x-slot:heading>Profile</x-slot:heading>

    <div class="w-full max-w-6xl">
        <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/0.03 shadow-xl shadow-black/10">

            <div class="border-b border-white/10 px-6 py-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-600/15 text-violet-400">
                        <i class="fa-solid fa-user text-lg"></i>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-white">
                            Account settings
                        </h2>

                        <p class="text-sm text-slate-400">
                            Manage your Blackorchid account information.
                        </p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                class="space-y-6 p-6">
                @csrf
                @method('PUT')

                <div class="rounded-2xl border border-white/10 bg-black/20 p-5">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                        <div class="relative shrink-0">

                            @if ($user->avatar)
                                <img id="profilePreview"
                                    src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . $user->avatar) }}"
                                    alt="{{ $user->name }}"
                                    class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-500/10">

                                <div id="profilePlaceholder"
                                    class="hidden h-24 w-24 items-center justify-center rounded-full bg-violet-500/10 text-violet-400 ring-4 ring-violet-500/10">
                                    <i class="fa-solid fa-user text-3xl"></i>
                                </div>
                            @else
                                <div id="profilePlaceholder"
                                    class="flex h-24 w-24 items-center justify-center rounded-full bg-violet-500/10 text-violet-400 ring-4 ring-violet-500/10">
                                    <i class="fa-solid fa-user text-3xl"></i>
                                </div>

                                <img id="profilePreview" src="" alt="{{ $user->name }}"
                                    class="hidden h-24 w-24 rounded-full object-cover ring-4 ring-violet-500/10">
                            @endif

                        </div>

                        <div class="min-w-0">
                            <h3 class="font-semibold text-white">
                                Profile picture
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Upload a JPG, PNG, or WebP image up to 5 MB.
                            </p>

                            <div class="mt-4 flex flex-wrap gap-2">

                                <label for="avatar"
                                    class="inline-flex cursor-pointer items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm font-medium text-slate-200 transition hover:border-violet-500/40 hover:bg-violet-500/10 hover:text-violet-300">
                                    <i class="fa-solid fa-camera"></i>
                                    Choose picture
                                </label>

                                @if ($user->avatar)
                                    <button type="submit" form="deleteAvatarForm"
                                        onclick="return confirm('Remove your profile picture?')"
                                        class="inline-flex items-center gap-2 rounded-xl border border-red-400/20 bg-red-400/5 px-4 py-2.5 text-sm font-medium text-red-300 transition hover:bg-red-400/10">
                                        <i class="fa-solid fa-trash"></i>
                                        Remove
                                    </button>
                                @endif

                            </div>

                            <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp"
                                class="hidden">

                            @error('avatar')
                                <p class="mt-3 text-sm text-red-400">
                                    <i class="fa-solid fa-circle-exclamation mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>

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

            @if ($user->avatar)
                <form id="deleteAvatarForm" method="POST" action="{{ route('profile.avatar.destroy') }}"
                    class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            @endif

        </div>
    </div>

    <script>
        const avatarInput = document.getElementById('avatar');
        const profilePreview = document.getElementById('profilePreview');
        const profilePlaceholder = document.getElementById('profilePlaceholder');

        if (avatarInput) {
            avatarInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    if (profilePreview) {
                        profilePreview.src = e.target.result;
                        profilePreview.classList.remove('hidden');
                    }

                    if (profilePlaceholder) {
                        profilePlaceholder.classList.add('hidden');
                        profilePlaceholder.classList.remove('flex');
                    }
                };

                reader.readAsDataURL(file);
            });
        }
    </script>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    @endpush
</x-layouts.client>
