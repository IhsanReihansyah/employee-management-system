<section>
    <header class="border-b border-slate-100 pb-4">
        <h2 class="text-xl font-bold text-slate-900 tracking-tight">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanan data perusahaan.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <!-- Kata Sandi Saat Ini -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900" 
                autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
        </div>

        <!-- Kata Sandi Baru -->
        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900" 
                autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900" 
                autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
        </div>

        <!-- Tombol Aksi Simpan -->
        <div class="flex items-center gap-4 pt-2 border-t border-slate-100">
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:translate-y-0 cursor-pointer">
                {{ __('Perbarui Sandi') }}
            </button>

            <!-- Notifikasi Berhasil (Toast Efek via AlpineJS) -->
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100 flex items-center gap-1.5"
                >
                    <span>🔒</span> {{ __('Kata sandi berhasil diubah.') }}
                </p>
            @endif
        </div>
    </form>

