@props(['for' => '*'])

@error($for)
    <span class="text-sm text-red-600">{{ __($message) }}</span>
@enderror
