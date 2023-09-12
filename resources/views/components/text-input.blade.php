@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-indigo-500 input input-ghost w-full max-w-sm']) !!}>
{{-- <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" /> --}}
