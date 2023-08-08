<div>

    <div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">


            @forelse ($vacantes as $vacante)
                <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center hover:bg-green-100">
                    <div class="space-y-3">
                        <a href="{{route('vacantes.show',$vacante->id)}}" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="ml-3 text-sm text-green-800 font-bold">{{ $vacante->empresa }}</p>
                        <p class="ml-3 text-sm text-gray-500 font-bold">Último día:
                            {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

                    </div>
                    <div class="flex flex-col md:flex-row items-strech gap-3  mt-5 md:md-0">
                        <a href="{{ route('candidatos.index',$vacante)}}"
                            class="bg-gray-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            {{ $vacante->candidatos->count() }}
                            @choice ('Candidato|Candidatos', $vacante->candidatos->count())
                        </a>
                        <a href="{{ route('vacantes.edit', $vacante) }}"
                            class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                        <button wire:click='$emit("mostrarAlerta", {{ $vacante->id }})'
                            class="bg-red-400 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
                            {{-- <button onclick='prueba(), {{ $vacante->id }}'
                                class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button> --}}
                    </div>

                </div>
            @empty

                <p class="p-3 text-2xl text-center text-gray-700">No hay vacantes</p>
            @endforelse
        </div>

    </div>
    <div class="">
        {{ $vacantes->links() }}
    </div>

    @push('scripts')
        <script>
            Livewire.on('mostrarAlerta', (vacanteId) => {
                // alert('Desde el evento de js' + vacanteId)
                Swal.fire({
                    title: 'Eliminar Vacante',
                    text: "Una vacante eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, ¡Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // aqui vamos a eliminar la vacante
                        Livewire.emit('eliminarVacante',vacanteId),
                        Swal.fire(
                            'La Vacante ha sido eliminada.',
                            'Eliminado Correctamente.',
                            'success'
                        )
                    }
                })
            })
            // function prueba(vacanteId) {
            //     Swal.fire({
            //         title: 'Eliminar Vacante',
            //         text: "Una vacante eliminada no se puede recuperar",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         cancelButtonColor: '#d33',
            //         cancelButtonText: 'Cancelar',
            //         confirmButtonColor: '#3085d6',
            //         confirmButtonText: 'Sí, ¡Eliminar!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             Swal.fire(
            //                 'Borrada!',
            //                 'La Vacante ha sido eliminada.',
            //                 'success'
            //             )
            //         }
            //     })
            // }
        </script>
    @endpush
</div>
