<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    /**
     * esto es cuando desde el boton de la vista usamos 
     * <button wire:click='$emit("prueba", {{ $vacante->id}})'...
     * entonces recibimos id y imprime id
     */
    // protected $listeners = ['prueba'];

    // public function prueba($vacante_id)
    // {
    //     dd($vacante_id);
    // }
    // en listener van las funciones de eventos
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }


    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
