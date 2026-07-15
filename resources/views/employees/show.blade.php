<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Details
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto my-8 animate-fade-in">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-t-xl p-6 shadow-md text-white">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
            
            <!-- Foto & Detail Nama -->
            <div class="flex items-center gap-4">
                <!-- Wrapper Foto Profil -->
                <div class="w-20 h-20 rounded-full border-4 border-white/20 shadow-md overflow-hidden bg-white/10 flex items-center justify-center flex-shrink-0">
                    @if($employee->photo)
                        <!-- Jika foto ada di database -->
                        <img src="{{ asset('storage/' . $employee->photo) }}" 
                             alt="{{ $employee->full_name }}" 
                             class="w-full h-full object-cover">
                    @else
                        <!-- Jika foto kosong, tampilkan inisial nama -->
                        <img src="{{ asset('images/Photo Default.png') }}"
                             class="w-full h-full object-cover">
                    @endif
                </div>

                <div>
                    <p class="text-blue-100 text-xs font-semibold tracking-wider uppercase mb-1">
                        {{ $employee->employee_code ?? '-' }}
                    </p>
                    <h2 class="text-2xl font-bold tracking-tight">
                        {{ $employee->full_name ?? $employee->name }}
                    </h2>
                    <p class="text-indigo-100 text-sm mt-0.5">
                        {{ $employee->position ?? '-' }} — {{ $employee->department->department_name ?? 'Tanpa Departemen' }}
                    </p>
                </div>
            </div>

            <!-- Status Badge -->
            <div>
                @if($employee->status == 'Active')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-200 border border-green-500/30 shadow-sm">
                        <span class="w-2 h-2 rounded-full mr-2 bg-green-400"></span>
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-200 border border-red-500/30 shadow-sm">
                        <span class="w-2 h-2 rounded-full mr-2 bg-red-400"></span>
                        Inactive
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Body Card -->
    <div class="bg-white rounded-b-xl shadow-xl border-x border-b border-gray-100 p-6 sm:p-8 space-y-6">
        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">Informasi Profil</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Employee Code -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Employee Code</label>
                    <span class="text-sm font-semibold text-gray-800">{{ $employee->employee_code ?? '-' }}</span>
                </div>
            </div>

            <!-- Full Name -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-purple-50 text-purple-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Full Name</label>
                    <span class="text-sm font-semibold text-gray-800">{{ $employee->full_name ?? $employee->name }}</span>
                </div>
            </div>

            <!-- Department -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-amber-50 text-amber-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Department</label>
                    <span class="text-sm font-semibold text-gray-800">
                        {{ $employee->department->department_name ?? 'Tidak Ada Departemen' }}
                    </span>
                </div>
            </div>

            <!-- Position -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-teal-50 text-teal-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Position</label>
                    <span class="text-sm font-semibold text-gray-800">{{ $employee->position ?? '-' }}</span>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-red-50 text-red-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Email Address</label>
                    <span class="text-sm font-semibold text-gray-800 break-all">{{ $employee->email ?? '-' }}</span>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-green-50 text-green-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase">Phone Number</label>
                    <span class="text-sm font-semibold text-gray-800">{{ $employee->phone ?? '-' }}</span>
                </div>
            </div>

            <!-- Status -->
            <div class="flex items-start p-4 rounded-lg bg-gray-50 border border-gray-100">
                <div class="p-3 bg-gray-100 text-gray-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 uppercase mb-1">Status</label>
                    @if($employee->status == 'Active')
                        <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-semibold">
                            Active
                        </span>
                    @else
                        <span class="inline-block bg-red-100 text-red-700 px-2 py-1 rounded text-sm font-semibold">
                            Inactive
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 pt-4 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-3">
            <a href="{{ route('employees.edit', $employee->id) }}" class="w-full sm:w-auto text-center bg-amber-500 hover:bg-amber-600 text-white font-medium px-5 py-2 rounded-lg shadow-sm transition duration-150 text-sm">
                Edit Pegawai
            </a>
            <a href="{{ route('employees.index') }}" class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-600 font-medium px-5 py-2 rounded-lg transition duration-150 text-sm">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>


</x-app-layout>