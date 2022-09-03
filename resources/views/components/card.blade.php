<div {{ $attributes->merge(['class' => 'card bg-base-100 shadow-xl']) }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
