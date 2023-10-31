<div class="space-y-2">
    <div class="flex flex-row gap-5 items-center">
        <div class="flex flex-col gap-2 self-end">
            <x-form.label for="DNI" :value="__('DNI')" />
            <x-form.input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-icons.document aria-hidden="true" class="w-5 h-5" />
                </x-slot>
                <x-form.input wire:model="dni" withicon id="DNI" class="block w-full" type="text" name="dni"
                    :value="old('dni')" required autofocus placeholder="{{ __('DNI') }}" maxlength="8"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:keydown.enter="getDniData"
                />

            </x-form.input-with-icon-wrapper>
        </div>
        <div class="self-end">
            <button class="btn btn-outline btn-primary btn-sm normal-case py-5 content-center"
                wire:click.prevent="getDniData()" wire:loading.attr="disabled">
                Buscar
            </button>
        </div>
        <div
            class="self-end flex flex-row px-4 py-2 border-[1px] border-gray-400 dark:bg-dark-eval-1 dark:border-none rounded-lg gap-5">
            <div class="flex flex-row gap-2 items-center justify-center">
                @if ($dniData && property_exists($dniData, 'name'))
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-p-green" />
                @elseif ($errors->has('dni'))
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-p-red" />
                @else
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-primary" />
                @endif

                @if ($errors->has('dni'))
                    <small class="text-red-500">{{ $errors->first('dni') }}</small>
                @else
                    <p class="font-semibold">Datos personales</p>
                @endif
                <span wire:loading.@class(['loading loading-ring loading-sm'])></span>
            </div>
            @if ($dniData && property_exists($dniData, 'name'))
                <div class="flex flex-row gap-2">
                    <p class="font-semibold">Nombre:</p>
                    <p class="font-light">{{ $dniData->name }}</p>
                </div>
                <div class="flex flex-row gap-2">
                    <p class="font-semibold">Apellido paterno:</p>
                    <p class="font-light">{{ $dniData->paternal_surname }}</p>
                </div>
                <div class="flex flex-row gap-2">
                    <p class="font-semibold">Apellido materno:</p>
                    <p class="font-light">{{ $dniData->maternal_surname }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
