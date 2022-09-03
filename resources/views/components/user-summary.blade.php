@props(['user'])

<x-card>
    <div class="flex flex-wrap gap-3 justify-between">
        <div class="info">
            <div class="">
                <span class="font-bold">#{{ $user->id }}</span>
                <span>{{ $user->name }}</span>
                <span class="text-slate-500">({{ $user->email }})</span>
            </div>
            <div class="meta flex gap-3">
                <span>Gender: {{ $user->gender?->name ?? 'N/A' }}</span>
                <span>Country: {{ $user->country }}</span>
            </div>
        </div>

        <div class="actions flex flex-wrap gap-3">
            <a href="{{ route('users.edit', $user->getKey()) }}" class="btn btn-primary btn-outline rounded-none">Edit</a>
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
