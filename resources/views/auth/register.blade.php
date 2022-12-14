<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('register') }}" class="space-y-3">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label class="sr-only" for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :placeholder="__('Email')"
                    :value="old('email')" autofocus required />
                <x-error for="email" />
            </div>

            <!-- Password -->
            <div>
                <x-label class="sr-only" for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" :placeholder="__('Password')"
                    required minlength="8" autocomplete="new-password" />
                <x-error for="password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-label class="sr-only" for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" :placeholder="__('Confirm Password')" required />
            </div>

            <!-- Name -->
            <div class="flex gap-3">
                <div>
                    <x-label class="sr-only" for="first_name" :value="__('First Name')" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        :placeholder="__('First Name')" :value="old('first_name')" required />
                    <x-error for="first_name" />
                </div>

                <div>
                    <x-label class="sr-only" for="last_name" :value="__('Last Name')" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :placeholder="__('Last Name')"
                        :value="old('last_name')" />
                    <x-error for="last_name" />
                </div>
            </div>

            <!-- Gender -->
            <div class="">
                <div class="flex gap-3">
                    @foreach ($genders as $gender)
                        <div class="form-control">
                            <label class="label cursor-pointer gap-2">
                                <input id="gender" type="radio" name="gender" value="{{ $gender->id }}"
                                    @if (old('gender') == $gender->id) checked @endif class="radio checked:bg-primary" />
                                <span class="label-text">{{ __($gender->name) }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <x-error for="gender" />
            </div>

            <!-- Country -->
            <div class="">
                <select id="country_code" name="country_code" required
                    class="select select-bordered rounded-none w-full">
                    <option disabled selected>{{ __('Select a country') }}</option>
                    @foreach ($countries as $code => $country)
                        <option value="{{ $code }}" @if (old('country_code') == $code) selected @endif>
                            {{ __($country) }}</option>
                    @endforeach
                </select>
                <x-error for="country_code" />
            </div>

            <!-- Conditions -->
            <div>
                <div class="form-control">
                    <label class="label cursor-pointer justify-start gap-2">
                        <input id="terms" type="checkbox" name="terms"
                            @if (old('terms')) checked @endif required
                            class="checkbox checkbox-primary" />
                        <span class="label-text">{{ __('I agree with terms and conditions') }}</span>
                    </label>

                    <x-error for="terms" />
                </div>

                <div class="form-control">
                    <label class="label cursor-pointer justify-start gap-2">
                        <input id="newsletter" type="checkbox" name="newsletter"
                            @if (old('newsletter')) checked @endif class="checkbox checkbox-primary" />
                        <span class="label-text">{{ __('I want to receive the newsletters') }}</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-5">
                <x-button class="btn-primary btn-block">
                    {{ __('Register') }}
                </x-button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
