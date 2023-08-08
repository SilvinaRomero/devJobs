<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidato Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-center my-10">Candidato Vacante:
                        {{ $vacante->titulo }}
                    </h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-green-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center space-y-3 hover:bg-green-100">
                                    <div class="flex-1 space-y-2">
                                        <p class="text-2xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-600">Se postuló: :
                                            <span
                                                class="font-normal">{{ $candidato->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <a class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-green-300 bg-green-50 text-sm leading-5 font-medium rounded-full text-green-700 hover:bg-green-200" href="{{ asset('storage/cv/'.$candidato->cv)}}" target="_blank" rel="noreferrer noopener">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="text-center p-3 text-sm text-gray-600">No Hay Candidatos para esta vacante</p>
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
