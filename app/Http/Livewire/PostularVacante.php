<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;
    public $postulado;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
        // checkvacante() en el modelo
        $this->postulado = $vacante->checkVacante(auth()->user());
    }

    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');  // metodo de livewire (almacenar imagen), la carpeta public dentro de carpeta storage
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear al candidato 
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        // Crear la notificacion y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));



        // Mostrar al usuario el mensaje de OK
        session()->flash('mensaje','Se envió correctamente tu informacion, mucha suerte!');
       
        return redirect()->back();
    }

    public function render()
    {
        // dd('estoy en postularVacante',$this->postulado);
        return view('livewire.postular-vacante');
    }
}
