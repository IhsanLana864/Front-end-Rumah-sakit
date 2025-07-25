<x-guest-layout>
    <!--
        File login.blade.php ini adalah implementasi final.
        Menggabungkan TAMPILAN dari template CodePen pilihan Anda
        dengan FUNGSIONALITAS LENGKAP dari kode Laravel Breeze Anda.
    -->

    <div class="flex flex-col items-center">

        <!-- Judul Form -->
        <div class="mb-10 text-center">
            <p class="text-gray-500 mt-2">Silakan masuk untuk melanjutkan.</p>
        </div>

        <!-- Menampilkan status sesi (Fungsionalitas dari kode asli Anda) -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <div class="w-full flex-1">
            <!-- Form utama yang sudah disesuaikan untuk Laravel -->
            <form method="POST" action="{{ route('login') }}" class="mx-auto max-w-xs">
                @csrf

                <!-- Input Email -->
                <div>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        class="w-full px-6 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-rs-primary focus:ring-1 focus:ring-rs-primary"
                        placeholder="{{ __('Email') }}" />
                    <!-- Penanganan Error (Fungsionalitas dari kode asli Anda) -->
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Input Password -->
                <div class="mt-5">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="w-full px-6 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-rs-primary focus:ring-1 focus:ring-rs-primary"
                        placeholder="{{ __('Password') }}" />
                    <!-- Penanganan Error (Fungsionalitas dari kode asli Anda) -->
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Opsi Remember Me & Lupa Password (Fungsionalitas dari kode asli Anda) -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-rs-primary shadow-sm focus:ring-rs-primary" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>
{{-- 
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rs-primary" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif --}}
                </div>

                <!-- Tombol Masuk -->
                <button
                    type="submit"
                    class="mt-6 tracking-wide font-semibold bg-rs-primary text-white w-full py-4 rounded-lg hover:bg-rs-primary-dark transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                    </svg>
                    <!-- Teks diubah sesuai permintaan -->
                    <span class="ml-3">
                        {{ __('Masuk') }}
                    </span>
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
