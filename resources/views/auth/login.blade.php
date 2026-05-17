<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Masuk ke Akun</h2>
            <p class="mt-1 text-sm text-slate-600">Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-700">Daftar di sini</a></p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="alert-info" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="form-stack">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Anda')" />
                <x-text-input 
                    id="email" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    class="form-input"
                    required 
                    autofocus 
                    autocomplete="username" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input 
                    id="password" 
                    type="password"
                    name="password" 
                    class="form-input"
                    required 
                    autocomplete="current-password" 
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500" />
                <span class="ms-2 text-sm text-slate-600">{{ __('Ingat saya') }}</span>
            </label>

            <!-- Submit Button -->
            <div class="flex items-center justify-between pt-2">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-700 font-medium" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
