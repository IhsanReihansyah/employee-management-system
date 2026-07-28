<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Detail Profil Karyawan') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Informasi berkas data personal, divisi instansi, dan kontak aktif
                    staf.</p>
            </div>
            <a href="{{ route('employees.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <!-- 💳 Kontainer Kartu Utama Terpadu -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition-all">

                <!-- 🟦 Bagian Atas: Header Informasi Ringkas -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-6 sm:p-8 text-white relative">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 relative z-10">

                        <!-- Foto Profil & Nama Utama -->
                        <div class="flex items-center gap-5">
                            <div
                                class="w-20 h-20 rounded-2xl border-2 border-white/20 shadow-md overflow-hidden bg-white/10 flex items-center justify-center flex-shrink-0">
                                @if($employee->photo)
                                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="{{ $employee->full_name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full bg-blue-500 text-white font-bold text-2xl flex items-center justify-center uppercase">
                                        {{ substr($employee->full_name ?? 'E', 0, 1) }}
                                    </div>
                                @endif
                            </div>

                            <div>
                                <span
                                    class="inline-block bg-white/10 text-blue-100 text-[10px] font-mono font-bold tracking-wider uppercase px-2 py-0.5 rounded border border-white/10 mb-1.5">
                                    {{ $employee->employee_code ?? '-' }}
                                </span>
                                <h2 class="text-2xl font-bold tracking-tight leading-tight">
                                    {{ $employee->full_name }}
                                </h2>
                                <p class="text-blue-100/90 text-sm mt-1 font-medium">
                                    {{ $employee->position ?? '-' }} — <span
                                        class="opacity-80">{{ $employee->department->department_name ?? 'Umum' }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Badge Status Keaktifan -->
                        <div class="flex-shrink-0">
                            @if(strtolower($employee->status) === 'active' || strtolower($employee->status) === 'aktif')
                                <span
                                    class="inline-flex items-center px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 text-emerald-200 border border-emerald-400/30 shadow-sm">
                                    <span class="w-2 h-2 rounded-full mr-2 bg-emerald-400 animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-3.5 py-1.5 rounded-xl text-xs font-bold bg-slate-500/20 text-slate-300 border border-slate-400/30 shadow-sm">
                                    <span class="w-2 h-2 rounded-full mr-2 bg-slate-400"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                <!-- ⬜ Bagian Bawah: Kisi Grid Informasi Detail Lengkap -->
                <div class="p-6 sm:p-8 space-y-6">
                    <div class="border-b border-slate-100 pb-3">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Biodata Lengkap Karyawan
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        <!-- ID / Kode Karyawan -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl mr-4 text-lg">🆔</div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kode
                                    Karyawan</label>
                                <span
                                    class="text-sm font-bold text-slate-800 font-mono">{{ $employee->employee_code ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl mr-4 text-lg">👤</div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                    Lengkap</label>
                                <span class="text-sm font-bold text-slate-800">{{ $employee->full_name }}</span>
                            </div>
                        </div>

                        <!-- Departemen -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-amber-50 text-amber-600 rounded-xl mr-4 text-lg">🏢</div>
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Departemen
                                    / Divisi</label>
                                <span
                                    class="text-sm font-bold text-slate-800">{{ $employee->department->department_name ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- Jabatan -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-teal-50 text-teal-600 rounded-xl mr-4 text-lg">💼</div>
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Jabatan
                                    / Posisi</label>
                                <span class="text-sm font-bold text-slate-800">{{ $employee->position ?? '-' }}</span>
                            </div>
                        </div>
                        <!-- Alamat Email -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-rose-50 text-rose-600 rounded-xl mr-4 text-lg">✉️</div>
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Alamat
                                    Email</label>
                                <span
                                    class="text-sm font-bold text-slate-800 break-all">{{ $employee->email ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm">
                            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl mr-4 text-lg">📞</div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">No.
                                    Telepon / WA</label>
                                <span class="text-sm font-bold text-slate-800">{{ $employee->phone ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- Status Kerja Tambahan -->
                        <div
                            class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60 shadow-sm sm:col-span-2">
                            <div class="p-2.5 bg-slate-100 text-slate-600 rounded-xl mr-4 text-lg">⚙️</div>
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status
                                    Kepegawaian</label>
                                <span class="text-sm font-bold text-slate-800">
                                    {{ strtolower($employee->status) === 'active' || strtolower($employee->status) === 'aktif' ? 'Karyawan Aktif Perusahaan' : 'Karyawan Nonaktif / Keluar' }}
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- 🔘 Tombol Pintasan Aksi Cepat -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                        <a href="{{ route('employees.index') }}"
                            class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm rounded-xl border border-slate-200 shadow-sm transition-colors">
                            Kembali
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                            Ubah Data Profil
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>