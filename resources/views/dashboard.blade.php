<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <div class="stats shadow mt-4">
                <div class="stat place-items-center">
                    <div class="stat-title">Users</div>
                    <a href="{{ route('users.index') }}">
                        <div class="stat-value text-primary">{{ $usersCount }}</div>
                    </a>
                </div>

                <div class="stat place-items-center">
                    <div class="stat-title">{{ __('New Registers') }}</div>
                    <a href="{{ route('users.index') }}">
                        <div class="stat-value">{{ $newRegisters }}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
