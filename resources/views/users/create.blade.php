<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Tambah Pengguna') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Daftarkan akun operator baru dan tentukan peran otoritas aksesnya di dalam sistem.</p>
            </div>
            <a href="{{ route('users.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <!-- 🔔 Kotak Notifikasi Error Validasi -->
            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 shadow-sm">
                    <div class="flex items-center gap-2 mb-2 font-bold text-sm">
                        <span>⚠️</span>
                        <p>Periksa kembali isian formulir Anda:</p>
                    </div>
                    <ul class="text-xs space-y-1 pl-6 list-disc font-medium text-rose-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 💳 Kontainer Formulir Utama -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-900">Formulir Akun Operator Baru</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Pastikan kata sandi yang diketik kuat dan mudah diingat oleh pengguna baru.</p>
                </div>

                <form action="{{ route('users.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- 🗂️ Grid Layout 2 Kolom menyamping -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Nama Operator</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Admin HRD"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Email Login -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Pilihan Hak Akses / Role -->
                        <div class="md:col-span-2">
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Hak Akses / Peran (Role)</label>
                            <select name="role" 
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900 cursor-pointer">
                                <option value="">-- Pilih Peran Sistem --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kata Sandi -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Kata Sandi</label>
                            <input type="password" name="password" placeholder="••••••••" required
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Konfirmasi Kata Sandi -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                    </div>

                    <!-- 🔘 Tombol Aksi Pembatalan & Simpan -->
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                        <a href="{{ route('users.index') }}" class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm rounded-xl border border-slate-200 shadow-sm transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                            Simpan Akun Operator
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>
