<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Manajemen Departemen') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Kelola daftar divisi, struktur organisasi, dan kode internal instansi.</p>
            </div>
            
            <!-- Tombol Tambah Departemen -->
            <a href="{{ route('departments.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                ➕ Tambah Departemen
            </a>
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
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-900">Daftar Divisi Perusahaan</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Seluruh departemen resmi yang terdaftar dan aktif di dalam sistem HR.</p>
                </div>

                @if($departments->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/70 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-4 px-6" width="25%">{{ __('Kode Departemen') }}</th>
                                    <th class="py-4 px-6" width="55%">{{ __('Nama Departemen / Divisi') }}</th>
                                    <th class="py-4 px-6 text-center" width="20%">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-slate-100">
                                @foreach($departments as $department)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <!-- Kode Departemen -->
                                        <td class="py-4 px-6 font-mono text-xs font-semibold text-slate-600">
                                            <span class="bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200">
                                                {{ $department->department_code }}
                                            </span>
                                        </td>
                                        
                                        <!-- Nama Departemen -->
                                        <td class="py-4 px-6 font-bold text-slate-800">
                                            {{ $department->department_name }}
                                        </td>
                                        
                                        <!-- Pilihan Aksi Cepat -->
                                        <td class="py-4 px-6">
                                            <div class="flex justify-center items-center gap-3">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('departments.edit', $department->id) }}" class="p-2 text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all text-xs font-semibold border border-slate-100 bg-slate-50" title="Edit">
                                                    ✏️ Edit
                                                </a>
                                                
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 text-slate-500 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all text-xs font-semibold border border-slate-100 bg-slate-50"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus Departemen ini? Semua relasi karyawan mungkin terpengaruh.')" title="Hapus">
                                                        🗑️ Hapus
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
                        {{ $departments->links() }}
                    </div>
                @else
                    <!-- 📦 Keadaan Kosong (Empty State) -->
                    <div class="text-center py-16 px-4">
                        <div class="text-4xl mb-3">🏢</div>
                        <h3 class="text-md font-bold text-slate-700">Data Departemen Kosong</h3>
                        <p class="text-sm text-slate-400 mt-1 max-w-xs mx-auto">Silakan tambahkan departemen baru terlebih dahulu untuk mulai mengelompokkan data karyawan.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

</x-app-layout>
