<div class="space-y-2">
    <x-form.label for="DNI" :value="__('DNI')" />
    <x-form.input-with-icon-wrapper>
        <x-slot name="icon">
            <x-icons.document aria-hidden="true" class="w-5 h-5" />
        </x-slot>
        <x-form.input wire:model="dni" withicon id="DNI" class="block w-full" type="text" name="dni"
            :value="old('dni')" required autofocus placeholder="{{ __('DNI') }}" maxlength="8"
            oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:keydown.enter="getDniData"
            :disabled="$loading" />

    </x-form.input-with-icon-wrapper>
    <button class="btn btn-outline btn-primary btn-sm normal-case content-center" wire:click="getDniData()">
        Buscar
    </button>
    @if ($dniData)
        <div>
            <p>{{$dniData->full_name}}</p>
        </div>
    @endif
</div>
