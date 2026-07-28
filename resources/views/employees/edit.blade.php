<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Ubah Data Karyawan') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Perbarui informasi profil, penempatan divisi, atau status kerja
                    anggota staf.</p>
            </div>
            <a href="{{ route('employees.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

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
                    <h3 class="text-lg font-bold text-slate-900">Formulir Pembaruan Data</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Ubah bidang yang diperlukan. Kolom kode karyawan umumnya
                        bersifat permanen.</p>
                </div>

                <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- 🗂️ Grid Layout 2 Kolom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Kode Karyawan -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Kode Karyawan</label>
                            <input type="text" name="employee_code"
                                value="{{ old('employee_code', $employee->employee_code) }}"
                                class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono text-slate-500 focus:outline-none cursor-not-allowed"
                                readonly title="Kode karyawan tidak dapat diubah">
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Nama Lengkap</label>
                            <input type="text" name="full_name" value="{{ old('full_name', $employee->full_name) }}"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Email Perusahaan -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email', $employee->email) }}"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- No. Telepon -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">No. Telepon /
                                WhatsApp</label>
                            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Pilihan Departemen -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Departemen / Divisi</label>
                            <select name="department_id"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900 cursor-pointer">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jabatan -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Jabatan / Posisi</label>
                            <input type="text" name="position" value="{{ old('position', $employee->position) }}"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>

                        <!-- Status Kerja -->
                        <div>
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Status Kerja</label>
                            <select name="status"
                                class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900 cursor-pointer">
                                <option value="Active" {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}>Aktif (Active)</option>
                                <option value="Inactive" {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}>Nonaktif (Inactive)</option>
                            </select>
                        </div>

                        <!-- Ganti Foto & Pratinjau Terpadu -->
                        <div class="md:col-span-2">
                            <label class="text-sm font-semibold text-slate-700 block mb-1.5">Foto Profil
                                Karyawan</label>
                            <div
                                class="flex flex-col sm:flex-row gap-4 items-center p-4 bg-slate-50/50 border border-slate-200 rounded-2xl">

                                <!-- Foto Saat Ini -->
                                <div class="flex-shrink-0 text-center sm:text-left">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Foto
                                        Sekarang</p>
                                    @if($employee->photo)
                                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Foto Karyawan"
                                            class="h-20 w-20 object-cover rounded-xl border border-slate-200 shadow-sm">
                                    @else
                                        <div
                                            class="h-20 w-20 bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-xs font-semibold">
                                            No Photo
                                        </div>
                                    @endif
                                </div>

                                <!-- Input Unggah Baru -->
                                <div
                                    class="relative flex-1 w-full border-2 border-dashed border-slate-200 hover:border-blue-400 rounded-xl p-3 bg-white hover:bg-slate-50 transition-all flex flex-col items-center justify-center text-center cursor-pointer group">
                                    <span class="text-xl mb-0.5 group-hover:scale-110 transition-transform">🔄</span>
                                    <p class="text-xs font-semibold text-slate-600">Unggah foto baru untuk mengganti</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">JPG, PNG (Maks. 2MB). Biarkan kosong
                                        jika tidak diubah.</p>
                                    <input type="file" name="photo"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('employees.index') }}"
                class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm rounded-xl border border-slate-200 shadow-sm transition-colors">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                Perbarui Data Karyawan
            </button>
        </div>
            </div>
        </div>

        <!-- 🔘 Tombol Aksi Simpan Perubahan -->
        

        </form>
    </div>

    </div>
    </div>

</x-app-layout>