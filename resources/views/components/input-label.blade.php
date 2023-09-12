@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-500 my-2']) }}>
    {{ $value ?? $slot }}
</label>
