<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="space-y-3">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label class="sr-only" for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :placeholder="__('Email')"
                    :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <x-label class="sr-only" for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" :placeholder="__('Password')"
                    required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div>
                <div class="form-control">
                    <label class="label cursor-pointer gap-2 justify-start">
                        <input id="remember_me" type="checkbox" name="remember" class="checkbox checkbox-primary" />
                        <span class="label-text">{{ __('Remember me') }}</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-5">
                <x-button class="btn-primary btn-block">
                    {{ __('Log in') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
