<div class="space-y-2">
    <div class="flex flex-row gap-5 items-center">
        <div class="flex flex-col gap-2 self-end">
            <x-form.label for="RUC" :value="__('RUC')" />
            <x-form.input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-icons.document aria-hidden="true" class="w-5 h-5" />
                </x-slot>
                <x-form.input wire:model="ruc" withicon id="RUC" class="block w-full" type="text" name="ruc"
                    :value="old('ruc')" required autofocus placeholder="{{ __('RUC') }}" maxlength="11"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                />
            </x-form.input-with-icon-wrapper>
        </div>
        <div class="self-end">
            <button class="btn btn-outline btn-primary btn-sm normal-case py-5 content-center"
                wire:click.prevent="getRucData()" wire:loading.attr="disabled">
                Buscar
            </button>
        </div>
        <div
            class="self-end flex flex-row px-4 py-2 border-[1px] border-gray-400 dark:bg-dark-eval-1 dark:border-none rounded-lg gap-5">
            <div class="flex flex-row gap-2 items-center justify-center">
                @if ($rucData && property_exists($rucData, 'reason_social'))
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-p-green" />
                @elseif ($errors->has('ruc'))
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-p-red" />
                @else
                    <x-icons.user-circle aria-hidden="true" class="w-5 h-5 text-primary" />
                @endif

                @if ($errors->has('ruc'))
                    <small class="text-red-500">{{ $errors->first('ruc') }}</small>
                @else
                    <p class="font-semibold">Datos empresariales</p>
                @endif
                <span wire:loading.@class(['loading loading-ring loading-sm'])></span>
            </div>
            @if ($rucData && property_exists($rucData, 'reason_social'))
                <div class="flex flex-row gap-2">
                    <p class="font-semibold">Razón Social:</p>
                    <p class="font-light">{{ $rucData->reason_social }}</p>
                </div>
                <div class="flex flex-row gap-2">
                    <p class="font-semibold">Dirección:</p>
                    <p class="font-light">{{ $rucData->full_address }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
