<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-green-50 p-4 my-10 rounded-lg">
            <p class="font-bold text-sm uppercase text-gray-600 my-3 ml-5">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3 ml-5">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3 ml-5">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3 ml-5">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante ' . $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="font-bold text-xl text-gray-800 my-3">Descripción del Puesto</h2>
            <p class="">{{ $vacante->descripcion }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-green-50 border-dashed p-5 text-center">
            <p>
                ¿Deseas apllicar a esta vacante? <a class="font-bold text-green-600" href="{{ route('register') }}">Obten
                    una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>

        @endcan
    @endauth


</div>
