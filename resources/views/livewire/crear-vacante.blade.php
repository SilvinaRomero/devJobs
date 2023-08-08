<form class="md:w-1/2 space-y-6" wire:submit.prevent="crearVacante">
    {{-- @csrf si es con livewire no necesitas token --}}
    {{-- Titulo --}}
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            autofocus placeholder="Titulo Vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Salario --}}
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model="salario" id="salario"
            class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full">

            <option value="" class="text-gray-200">-- Selecciona un rango --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach

        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Categoria --}}
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria" id="categoria"
            class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full">

            <option value="" class="text-gray-200">-- Selecciona una Categoría --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach

        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Empresa --}}
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Ej: Netflix, Uber, Shopify" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Ultimo dia --}}
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para inscribirse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Descripción --}}
    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la Vacante')" />
        <textarea wire:model="descripcion" id="descripcion" placeholder="Descripción general de la vacante"
            class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full h-72">

        </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Imagen --}}
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        {{-- previsualizacion de imagen | Two way data binding--}}
        <div class="my-5 w-80">
            @if($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" alt="" />
            @endif
        </div>


        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        Crear Vacante
    </x-primary-button>


</form>
