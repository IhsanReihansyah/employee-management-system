<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Manajemen Karyawan') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Kelola biodata, departemen, jabatan, dan status keaktifan seluruh staf.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <!-- Tombol Eksport PDF -->
                <a href="{{ route('employees.export.pdf') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-50 text-rose-700 hover:bg-rose-100 font-semibold text-sm rounded-xl border border-rose-200/60 shadow-sm transition-all">
                    📄 Export PDF
                </a>
                
                <!-- Tombol Tambah Karyawan -->
                <a href="{{ route('employees.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                    ➕ Tambah Karyawan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 🔔 Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3.5 rounded-xl mb-6 shadow-sm flex items-center gap-3 text-sm">
                    <span>✅</span>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- 💳 Kontainer Utama -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                
                <!-- 🔍 Bilah Pencarian Alat -->
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <form method="GET" action="{{ route('employees.index') }}" class="flex flex-col sm:flex-row gap-3 max-w-md">
                        <div class="relative flex-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400 text-sm">
                                🔍
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari nama atau kode karyawan..." 
                                class="block w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all text-slate-900">
                        </div>
                        <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold rounded-xl shadow-sm transition-colors">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- 📜 Kontainer Tabel -->
                @if($employees->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/70 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-4 px-6">{{ __('Kode') }}</th>
                                    <th class="py-4 px-6">{{ __('Nama Lengkap') }}</th>
                                    <th class="py-4 px-6">{{ __('Departemen') }}</th>
                                    <th class="py-4 px-6">{{ __('Jabatan') }}</th>
                                    <th class="py-4 px-6">{{ __('Status') }}</th>
                                    <th class="py-4 px-6 text-center">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-slate-100">
                                @foreach($employees as $employee)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <!-- Kode -->
                                        <td class="py-4 px-6 font-mono text-xs font-semibold text-slate-600">
                                            <span class="bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200">
                                                {{ $employee->employee_code }}
                                              </span>
                                        </td>
                                        
                                        <!-- Nama -->
                                        <td class="py-4 px-6 font-bold text-slate-800">
                                            {{ $employee->full_name }}
                                        </td>
                                        
                                        <!-- Departemen -->
                                        <td class="py-4 px-6 text-slate-600 font-medium">
                                            {{ $employee->department->department_name ?? '-' }}
                                        </td>
                                        
                                        <!-- Jabatan -->
                                        <td class="py-4 px-6 text-slate-500">
                                            {{ $employee->position }}
                                        </td>
                                        
                                        <!-- Status dengan Badge Berwarna -->
                                        <td class="py-4 px-6">
                                            @if(strtolower($employee->status) === 'active' || strtolower($employee->status) === 'aktif')
                                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                    ● Aktif
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                                    ● Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <!-- Tombol Pilihan Aksi -->
                                        <td class="py-4 px-6">
                                            <div class="flex justify-center items-center gap-2">
                                                <!-- View -->
                                                <a href="{{ route('employees.show', $employee->id) }}" class="p-1.5 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Detail">
                                                    👁️
                                                </a>
                                                
                                                <!-- Edit -->
                                                <a href="{{ route('employees.edit', $employee->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all" title="Edit">
                                                    ✏️
                                                </a>
                                                
                                                <!-- Delete -->
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')"" title="Hapus">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- 🔀 Bagian Navigasi Paginasi -->
                    <div class="p-6 bg-slate-50/30 border-t border-slate-100">
                        {{ $employees->links() }}
                    </div>
                @else
                    <!-- 📦 Keadaan Kosong (Empty State) -->
                    <div class="text-center py-16 px-4">
                        <div class="text-4xl mb-3">📁</div>
                        <h3 class="text-md font-bold text-slate-700">Data Karyawan Kosong</h3>
                        <p class="text-sm text-slate-400 mt-1 max-w-xs mx-auto">Tidak ada staf yang cocok dengan kriteria pencarian atau database Anda masih kosong.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

</x-app-layout>
