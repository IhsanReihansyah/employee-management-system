<x-guest-layout>
    <div class="mb-8 text-center">
        <!-- Icon Koper / HR -->
        <div class="mx-auto h-12 w-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm mb-4">
            💼
        </div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Portal Masuk Karyawan</h2>
        <p class="mt-2 text-sm text-slate-500">Silakan masuk untuk mengakses dashboard HR Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 text-sm shadow-sm" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Perusahaan')" class="text-sm font-semibold text-slate-700 mb-1.5 block" />
            <x-text-input id="email" class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@perusahaan.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1.5">
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-sm font-semibold text-slate-700 block" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-blue-600 hover:text-blue-700 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 shadow-sm transition-all"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded-lg border border-rose-100" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500/30 transition-all cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-slate-600 font-medium">{{ __('Ingat perangkat ini') }}</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full inline-flex items-center justify-center px-5 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-lg shadow-blue-100 hover:shadow-xl transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:translate-y-0">
                {{ __('Masuk ke Akun') }}
            </button>
        </div>
    </form>
</x-guest-layout>
