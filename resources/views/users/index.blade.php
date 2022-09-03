<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            @foreach ($users as $user)
                <x-card>
                    <div class="flex flex-wrap gap-3 justify-between">
                        <div class="info">
                            <div class="">
                                <span class="font-bold">#{{ $user->id }}</span>
                                <span>{{ $user->name }}</span>
                                <span class="text-slate-500">({{ $user->email }})</span>
                            </div>
                            <div class="meta flex gap-3">
                                <span>Gender: {{ $user->gender->name }}</span>
                                <span>Country: {{ $user->country }}</span>
                            </div>
                        </div>

                        <div class="actions flex flex-wrap gap-3">
                            <a href="{{ route('users.edit', $user->getKey()) }}"
                                class="btn btn-primary btn-outline rounded-none">Edit</a>
                            <form action="{{ route('users.destroy', $user->getKey()) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-button type="button" onclick="confirmDeletion(event, '{{ $user->identifier }}')"
                                    class="btn btn-error btn-outline">
                                    Delete</x-button>
                            </form>
                        </div>
                    </div>
                </x-card>
            @endforeach

            <div class="pagination-container">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    @push('top')
        @once
            <script>
                // Should be using Sweet alert on production
                window.confirmDeletion = (e, identifier) => {
                    const confirmed = confirm(`Do you really want to delete ${identifier}?`);
                    if (!confirmed) return;

                    e.target.closest('form').submit();
                }
            </script>
        @endonce
    @endpush
</x-app-layout>
