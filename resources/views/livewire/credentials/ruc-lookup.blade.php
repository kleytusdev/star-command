<div class="space-y-2">
    <x-form.label for="RUC" :value="__('RUC')" />
    <div class="flex flex-row gap-5 items-center">
        <div>
            <x-form.input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-icons.document aria-hidden="true" class="w-5 h-5" />
                </x-slot>
                <x-form.input wire:model="ruc" withicon id="ruc" class="block w-full" type="text" name="ruc"
                    :value="old('ruc')" required autofocus placeholder="{{ __('RUC') }}" maxlength="11"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:keydown.enter="getRucData"
                    :disabled="$loading" />

            </x-form.input-with-icon-wrapper>
            @error('ruc')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="self-end">
            <button class="btn btn-outline btn-primary btn-sm normal-case py-5 content-center" wire:click="getRucData()">
                Buscar
            </button>
        </div>
    </div>
</div>
