<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-10">Mis Notificaciones</h1>
                    <div class="divide-y divide-green-200">
                        @forelse ($notificaciones as $notificacion)
                            <div
                                class="lg:flex justify-between p-5 mb-4 rounded-lg hover:bg-green-100 lg:items-center">
                                <div class="">
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>
                                    <p class=" text-sm text-gray-600 ml-1 my-3">
                                        <span class="">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>

                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidatos.index',$notificacion->data['usuario_id']) }}"
                                        class="bg-green-700 p-3 uppercase text-xs font-bold text-white rounded-md hover:cursor-pointer">
                                        Ver Candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No Hay Notificaciones Nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
