<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}: {{ $user->identifier }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <x-card>
                <form action="{{ route('users.update', $user->getKey()) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div class="flex gap-3">
                        <div>
                            <x-label class="sr-only" for="first_name" :value="__('First Name')" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                :placeholder="__('First Name')" :value="old('first_name') ?? $user->first_name" required autofocus />
                            <x-error for="first_name" />
                        </div>

                        <div>
                            <x-label class="sr-only" for="last_name" :value="__('Last Name')" />
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                :placeholder="__('Last Name')" :value="old('last_name') ?? $user->last_name" />
                            <x-error for="last_name" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label class="sr-only" for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :placeholder="__('Email')" :value="old('email') ?? $user->email" autofocus required />
                        <x-error for="email" />
                    </div>

                    <!-- Gender -->
                    <div class="">
                        <div class="flex gap-3">
                            @foreach ($genders as $gender)
                                <div class="form-control">
                                    <label class="label cursor-pointer gap-2">
                                        <input id="gender" type="radio" name="gender" value="{{ $gender->id }}"
                                            checked="{{ $user->gender_id == $gender->id ? 'true' : 'false' }}"
                                            class="radio checked:bg-primary" />
                                        <span class="label-text">{{ __($gender->name) }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <x-error for="gender" />
                    </div>

                    <!-- Country -->
                    <div class="">
                        <select id="country_code" name="country_code"
                            class="select select-bordered rounded-none w-full">
                            <option disabled>{{ __('Select a country') }}</option>
                            @foreach ($countries as $code => $country)
                                <option selected={{ $user->country_code == $code ? 'true' : 'false' }}
                                    value="{{ $code }}">{{ __($country) }}</option>
                            @endforeach
                        </select>
                        <x-error for="country_code" />
                    </div>

                    <div class="actions">
                        <x-button type="submit" class="btn-primary">Update User</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>

    @push('top')
        @once
            <script></script>
        @endonce
    @endpush
</x-app-layout>
