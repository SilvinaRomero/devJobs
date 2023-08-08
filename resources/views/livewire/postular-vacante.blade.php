<div class="bg-green-50 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Posutularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else
        @if ($postulado == false)
            <form wire:submit.prevent="postularme" class="w-96 mt-5">
                <div class="mb-4">
                    <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                    <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
                    {{-- wire:model  == name --}}
                </div>
                @error('cv')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror


                    <x-primary-button class="my-5">
                        {{ __('Postularme') }}
                    </x-primary-button>
            </form>
        @else
            <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">Ya has aplicado a esta Vacante</p>
        @endif
    @endif
</div>
