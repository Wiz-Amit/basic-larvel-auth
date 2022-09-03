<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            @foreach ($users as $user)
                <x-user-summary :user="$user" />
            @endforeach

            <div class="pagination-container">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    @push('top')
        <script>
            // Should be using SweetAlert on production
            window.confirmDeletion = (e, identifier) => {
                const confirmed = confirm(`Do you really want to delete ${identifier}?`);
                if (!confirmed) return;

                e.target.closest('form').submit();
            }
        </script>
    @endpush
</x-app-layout>
