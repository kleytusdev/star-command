<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-ancho btn-neutral']) }}>
    {{ $slot }}
</button>
