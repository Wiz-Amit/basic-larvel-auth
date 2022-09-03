@if (session()->has('success'))
    <x-alerts.success>
        <span>{{ session('success') }}</span>
    </x-alerts.success>
@endif

@if (session()->has('warning'))
    <x-alerts.warning>
        <span> {{ session('warning') }}</span>
    </x-alerts.warning>
@endif

@if (session()->has('error'))
    <x-alerts.error>
        <span> {{ session('error') }}</span>
    </x-alerts.error>
@endif
