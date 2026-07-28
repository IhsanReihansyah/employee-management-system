<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Pengaturan Akun') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Kelola informasi profil pribadi, amankan kata sandi, dan atur preferensi login Anda.</p>
            </div>
            <span class="text-xs font-semibold px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg border border-blue-100">
                Profil Operator
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- 🗂️ Grid Layout Responsif -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <!-- 📋 Kolom Kiri: Informasi Utama Profil (Lebih Lebar) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="p-6 sm:p-8 bg-white rounded-2xl border border-slate-200/80 shadow-sm transition-all">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- 🔒 Kolom Kanan: Kredensial & Keamanan Akun (Lebih Ringkas) -->
                <div class="space-y-6">
                    <!-- Form Ubah Kata Sandi -->
                    <div class="p-6 sm:p-8 bg-white rounded-2xl border border-slate-200/80 shadow-sm transition-all">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Form Bahaya: Hapus Akun -->
                    <div class="p-6 sm:p-8 bg-white rounded-2xl border border-red-100 bg-gradient-to-b from-white to-red-50/30 shadow-sm transition-all">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
