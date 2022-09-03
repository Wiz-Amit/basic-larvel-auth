<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            @foreach ($users as $user)
                <x-card>
                    <div class="flex flex-wrap gap-3 justify-between">
                        <div class="info">
                            <div class="">
                                {{ $user->name }} <span class="text-slate-500">({{ $user->email }})</span>
                            </div>
                            <div class="meta flex gap-3">
                                <span>Gender: {{ $user->gender->name }}</span>
                                <span>Country: {{ $user->country }}</span>
                            </div>
                        </div>

                        <div class="actions flex flex-wrap gap-3">
                            <x-button class="btn btn-primary btn-outline">Edit</x-button>
                            <x-button class="btn btn-error btn-outline">Delete</x-button>
                        </div>
                    </div>
                </x-card>
            @endforeach

            <div class="pagination-container">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
