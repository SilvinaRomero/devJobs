<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12  ml-3 md:ml-0">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-green-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center p-5 my-3 hover:bg-green-100">
                        <div class="md:flex-1">
                            <a class="text-2xl font-extraslim text-gray-700"
                             href="{{ route('vacantes.show',$vacante->id) }}">{{ $vacante->titulo }}</a>
                             <div class=" ml-3">

                                 <p class="text-base text-gray-600 mb-1">{{ $vacante->empresa}}</p>
                                 <p class="font-bold text-base text-gray-600 mb-1">{{ $vacante->categoria->categoria}}</p>
                                 <p class="text-base text-gray-600 mb-1">{{ $vacante->salario->salario}}</p>


                                 <p class="font-normal text-xs text-gray-600">
                                    Último día para postularse: 
                                    <span>{{ $vacante->ultimo_dia->format('d-m-Y')}}</span>
                                 </p>
                             </div>
                        </div>
                        <div class="mt-5 md:mt-0 ml-3 md:ml-0">
                            <a class="bg-green-600 p-3 uppercase text-xs font-bold text-white block text-center rounded-lg hover:cursor-pointer"
                             href="{{ route('vacantes.show',$vacante->id) }}">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                <p class="p-3 text-2xl text-center text-gray-700">No hay vacantes</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
