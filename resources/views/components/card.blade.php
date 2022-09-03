<div {{ $attributes->merge(['class' => 'card bg-base-100 shadow-lg']) }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
