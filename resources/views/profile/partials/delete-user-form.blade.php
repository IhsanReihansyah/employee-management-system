<section class="space-y-6">
    <header class="border-b border-slate-100 pb-4">
        <h2 class="text-xl font-bold text-rose-600 tracking-tight">
            {{ __('Hapus Akun Pengguna') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan terhapus secara permanen dari sistem HR. Sebelum melanjutkan, pastikan Anda telah mengunduh data penting yang mungkin masih diperlukan.') }}
        </p>
    </header>

    <!-- Tombol Pemicu Modal Kontrol Bahaya -->
    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center justify-center px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-rose-100 transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-rose-500/20 active:translate-y-0 cursor-pointer"
    >
        {{ __('Hapus Akun Saya') }}
    </button>

    <!-- Popup Window Modal Konfirmasi Keamanan -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 space-y-5">
            @csrf
            @method('delete')

            <div>
                <h2 class="text-lg font-bold text-slate-900 tracking-tight">
                    {{ __('Apakah Anda yakin ingin menghapus akun ini secara permanen?') }}
                </h2>

                <p class="mt-2 text-sm text-slate-500 leading-relaxed">
                    {{ __('Tindakan ini tidak dapat dibatalkan. Masukkan kata sandi konfirmasi akun Anda untuk memvalidasi bahwa Anda adalah pemilik sah yang berwenang menghapus akses ini.') }}
                </p>
            </div>

            <!-- Isian Verifikasi Sandi Operasi -->
            <div>
                <x-input-label for="password" value="{{ __('Kata Sandi Konfirmasi') }}" class="text-sm font-semibold text-slate-700 mb-1.5 block" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 shadow-sm transition-all text-slate-900"
                    placeholder="Masukkan kata sandi Anda"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
            </div>

            <!-- Tombol Navigasi Pilihan -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <!-- Tombol Batal -->
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm rounded-xl border border-slate-200 shadow-sm transition-colors cursor-pointer"
                >
                    {{ __('Batal') }}
                </button>

                <!-- Tombol Eksekusi Hapus -->
                <button 
                    type="submit"
                    class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-rose-100 transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-rose-500/20 active:translate-y-0 cursor-pointer"
                >
                    {{ __('Ya, Hapus Permanen') }}
                </button>
            </div>
        </form>
    </x-modal>

