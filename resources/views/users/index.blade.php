<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Manajemen Pengguna') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Kelola kredensial akun login, hak akses, dan peran (role) operator sistem HR.</p>
            </div>
            
            <!-- Tombol Tambah Pengguna -->
            <a href="{{ route('users.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-100 transition-all hover:-translate-y-0.5">
                ➕ Tambah Pengguna
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 💳 Kontainer Utama -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-900">Daftar Akun Operator</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Pengguna terdaftar yang memiliki otoritas mengelola data kepegawaian perusahaan.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/70 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                <th class="py-4 px-6" width="35%">{{ __('Nama Operator') }}</th>
                                <th class="py-4 px-6" width="30%">{{ __('Alamat Email') }}</th>
                                <th class="py-4 px-6" width="20%">{{ __('Hak Akses / Peran') }}</th>
                                <th class="py-4 px-6 text-center" width="15%">{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-100">
                            @foreach($users as $user)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <!-- Nama Operator + Avatar Ringkas -->
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div class="h-9 w-9 bg-blue-100 text-blue-600 font-bold rounded-xl flex items-center justify-center text-sm shadow-inner uppercase">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <span class="font-bold text-slate-800">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    
                                    <!-- Alamat Email -->
                                    <td class="py-4 px-6 text-slate-600 font-medium">
                                        {{ $user->email }}
                                    </td>

                                    <!-- Role / Peran dengan Badge -->
                                    <td class="py-4 px-6">
                                        @php $roleNames = $user->roles->pluck('name')->join(', '); @endphp
                                        @if(!empty($roleNames))
                                            <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                                🛡️ {{ $roleNames }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-500 border border-slate-200">
                                                Staf Biasa
                                            </span>
                                        @endif
                                    </td>
                                    
                                    <!-- Pilihan Aksi Cepat -->
                                    <td class="py-4 px-6">
                                        <div class="flex justify-center items-center gap-2">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('users.edit', $user->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all" title="Edit Pengguna">
                                                ✏️
                                            </a>
                                            
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-slate-500 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus akun operator ini? Hak akses mereka ke sistem akan dicabut secara permanen.')" title="Hapus Pengguna">
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
                    {{ $users->links() }}
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
