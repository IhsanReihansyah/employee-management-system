<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts via Vite -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Tailwind CSS v4 Browser CDN -->
        <script src="https://jsdelivr.net"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: "Plus Jakarta Sans", "sans-serif";
            }
        </style>
    @endif
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen selection:bg-blue-600 selection:text-white">

    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md shadow-blue-200">
                        💼
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">Employee Management</span>
                </div>

                <!-- Auth Navigation -->
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Dashboard Portal</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Portal HR</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 px-5 py-2.5 rounded-xl shadow-lg shadow-blue-100 transition-all hover:-translate-y-0.5">Daftar Perusahaan</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative overflow-hidden pt-20 pb-24 lg:pt-28 lg:pb-32 bg-gradient-to-b from-white to-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <!-- Badge Info -->
                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100 mb-6">
                    🌐 Solusi All-in-One Kebutuhan HR Modern
                </span>
                
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    Kelola Karyawan Anda <br class="hidden sm:inline">Dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Lebih Efisien</span>
                </h1>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                    Sederhanakan administrasi HR, pantau kehadiran, kelola data performa, dan optimalkan produktivitas perusahaan Anda dalam satu platform terpusat.
                </p>
                <div class="mt-10 flex flex-wrap justify-center gap-4">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-6 py-3.5 bg-slate-950 text-white font-medium rounded-xl hover:bg-slate-800 shadow-xl transition-all hover:-translate-y-0.5">
                            Masuk Ke Dashboard
                        </a>
                    @endif
                    <a href="#features" class="px-6 py-3.5 bg-white text-slate-700 font-medium rounded-xl hover:bg-slate-50 border border-slate-200 shadow-sm transition-all hover:-translate-y-0.5">
                        Pelajari Fitur Platform &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- Background Grid & Glow Decor -->
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full">
                <div class="absolute top-12 left-10 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-300 rounded-full blur-3xl"></div>
            </div>
        </div>
    </header>

    <!-- Stats Section -->
    <section class="border-y border-slate-200 bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">100%</div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 mt-2">Data Terpusat & Aman</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">45%</div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 mt-2">Pangkas Waktu Admin HR</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">Real-Time</div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 mt-2">Pelacakan Absensi</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">Mudah</div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 mt-2">Skalabilitas Perusahaan</div>
                </div>
            </div>
        </div>
    

    <!-- Features Grid Section -->
    <section id="features" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Fitur Utama Manajemen Karyawan</h2>
                <p class="mt-4 text-slate-600">Dirancang khusus untuk memenuhi standar operasional HRD perusahaan skala kecil hingga enterprise.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1: Employee Directory -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        👥
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Database Karyawan</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Kelola profil lengkap karyawan, informasi kontrak kerja, jabatan, divisi, dan riwayat mutasi dalam satu repositori aman.</p>
                </div>

                <!-- Card 2: Attendance Tracking -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        📅
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Absensi & Manajemen Cuti</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Pantau logs kehadiran harian karyawan, kelola sisa kuota tahunan, serta verifikasi pengajuan cuti dan izin secara instan.</p>
                </div>

                <!-- Card 3: Performance & Analytics -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        📊
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Laporan & Analitik HR</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Dapatkan visualisasi data demografi karyawan, rasio turnover, metrik kehadiran, serta pertumbuhan organisasi secara real-time.</p>
                </div>
            </div>
        </div>
    

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-6">
            <p class="text-sm text-slate-500">&copy; {{ date('Y') }} Employee Management System. Hak Cipta Dilindungi.</p>
            <div class="flex gap-6 text-sm text-slate-500">
                <a href="#" class="hover:text-blue-600 transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Ketentuan Layanan</a>
