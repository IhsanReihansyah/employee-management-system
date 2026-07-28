<section>
    <header class="border-b border-slate-100 pb-4">
        <h2 class="text-xl font-bold text-slate-900 tracking-tight">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            {{ __("Perbarui data nama profil akun Anda dan alamat email perusahaan yang aktif.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <!-- Input Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="name" name="name" type="text" 
                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" :messages="$errors->get('name')" />
        </div>

        <!-- Input Email -->
        <div>
            <x-input-label for="email" :value="__('Alamat Email Perusahaan')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="email" name="email" type="email" 
                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900" 
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" :messages="$errors->get('email')" />

            <!-- Penanganan Verifikasi Email (Jika Aktif) -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-amber-50 rounded-xl border border-amber-200 text-amber-800 text-xs">
                    <p class="font-medium">
                        {{ __('Alamat email Anda belum terverifikasi.') }}

                        <button form="send-verification" class="underline font-bold text-amber-900 hover:text-amber-950 transition-colors ml-1 focus:outline-none">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-emerald-700 bg-emerald-50 p-2 rounded-lg border border-emerald-100">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Tombol Aksi Simpan -->
        <div class="flex items-center gap-4 pt-2 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:translate-y-0 cursor-pointer">
                {{ __('Simpan Perubahan') }}
            </button>

            <!-- Notifikasi Berhasil (Toast Efek via AlpineJS) -->
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100 flex items-center gap-1.5"
                >
                    <span>✨</span> {{ __('Berhasil disimpan.') }}
                </p>
            @endif
        </div>
    </form>

