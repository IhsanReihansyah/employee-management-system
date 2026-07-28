<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 tracking-tight">
                    {{ __('Dashboard Ringkasan') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Pantau statistik, metrik, dan aktivitas karyawan terbaru hari
                    ini.</p>
            </div>
            <span class="text-xs font-semibold px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg border border-blue-100">
                Sistem Manajemen Karyawan
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 📊 Grid Kartu Statistik Utama -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Total Karyawan -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all flex items-center justify-between group">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wide text-slate-500 uppercase">
                            {{ __('Total Karyawan') }}
                        </h3>
                        <p class="text-3xl font-extrabold text-slate-900 mt-2">
                            {{ $totalEmployees }}
                        </p>
                    </div>
                    <div
                        class="h-12 w-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                        👥
                    </div>
                </div>

                <!-- Departemen -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all flex items-center justify-between group">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wide text-slate-500 uppercase">{{ __('Departemen') }}
                        </h3>
                        <p class="text-3xl font-extrabold text-slate-900 mt-2">
                            {{ $totalDepartments }}
                        </p>
                    </div>
                    <div
                        class="h-12 w-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-xl group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                        🏢
                    </div>
                </div>

                <!-- Karyawan Aktif -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all flex items-center justify-between group">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wide text-slate-500 uppercase">
                            {{ __('Karyawan Aktif') }}
                        </h3>
                        <p class="text-3xl font-extrabold text-emerald-600 mt-2">
                            {{ $activeEmployees }}
                        </p>
                    </div>
                    <div
                        class="h-12 w-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-sm">
                        ✅
                    </div>
                </div>

                <!-- Karyawan Nonaktif -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all flex items-center justify-between group">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wide text-slate-500 uppercase">
                            {{ __('Karyawan Nonaktif') }}
                        </h3>
                        <p class="text-3xl font-extrabold text-rose-600 mt-2">
                            {{ $inactiveEmployees }}
                        </p>
                    </div>
                    <div
                        class="h-12 w-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center text-xl group-hover:bg-rose-600 group-hover:text-white transition-all shadow-sm">
                        ❌
                    </div>
                </div>

            </div>

            <!-- 🏢 Baris Layout: Tabel & Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- 📜 Tabel Karyawan Terbaru -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm lg:col-span-2 overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h2 class="text-lg font-bold text-slate-900 tracking-tight">
                                    {{ __('Karyawan Terbaru') }}
                                </h2>
                                <p class="text-xs text-slate-500 mt-0.5">Daftar staf yang baru saja ditambahkan ke
                                    sistem.</p>
                            </div>
                            <span
                                class="text-xs font-medium text-slate-400 bg-slate-50 px-2 py-1 rounded">Terbaru</span>
                        </div>

                        <div class="overflow-x-auto -mx-6">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50 border-y border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        <th class="py-3 px-6">{{ __('Kode') }}</th>
                                        <th class="py-3 px-6">{{ __('Nama Lengkap') }}</th>
                                        <th class="py-3 px-6">{{ __('Departemen') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-slate-100">
                                    @forelse($recentEmployees as $employee)
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="py-3.5 px-6 font-mono text-xs font-semibold text-slate-600">
                                                <span class="bg-slate-100 px-2 py-0.5 rounded border border-slate-200">
                                                    {{ $employee->employee_code }}
                                                </span>
                                            </td>
                                            <td class="py-3.5 px-6 font-semibold text-slate-800">
                                                {{ $employee->full_name }}
                                            </td>
                                            <td class="py-3.5 px-6 text-slate-600">
                                                <span
                                                    class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100/50">
                                                    {{ $employee->department->department_name ?? 'N/A' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-8 text-center text-slate-400 text-sm">
                                                Belum ada data karyawan terbaru.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 📊 Grafik Departemen -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900 tracking-tight mb-1">
                            {{ __('Karyawan Per Departemen') }}
                        </h2>
                        <p class="text-xs text-slate-500 mb-6">Distribusi persentase penempatan divisi karyawan.</p>

                        <div class="relative max-h-[260px] flex items-center justify-center">
                            <canvas id="departmentChart"
                                data-labels='@json($employeePerDepartment->pluck("department_name"))'
                                data-values='@json($employeePerDepartment->pluck("employees_count"))'>
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.getElementById('departmentChart');
            if (el) {
                const labels = JSON.parse(el.getAttribute('data-labels') || '[]');
                const values = JSON.parse(el.getAttribute('data-values') || '[]');

                new Chart(el, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: [
                                '#2563eb', '#4f46e5', '#10b981', '#f59e0b', '#ec4899', '#6366f1'
                            ],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 12,
                                    padding: 15,
                                    font: { family: 'Plus Jakarta Sans', size: 11 }
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            }
        });
    </script>

</x-app-layout>