@props(['product'])
<div>
    <x:modal :name="'show-qr-code-' . $product->id" maxWidth="auto" x-show="modalOpen">
        <div class="bg-white p-5">
            {{ QrCode::size(250)->generate(route('products.show', $product->id)) }}
        </div>
    </x:modal>
    <button
        class=""
        x-on:click="$dispatch('open-modal', { name: 'show-qr-code-{{ $product->id }}' })">
        {{ QrCode::size(40)->generate(route('products.show', $product->id)) }}
    </button>
</div>
