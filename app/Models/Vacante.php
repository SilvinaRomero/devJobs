<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

use App\Models\Categoria;
use App\Models\Salario;

class Vacante extends Model
{
    use HasFactory;

    // protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];
    
    protected $casts = [
        'ultimo_dia' => 'datetime',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class,'user_id');
    }

     // evitar duplicados en los postulados
     public function checkVacante(User $user)
     {
         return $this->candidatos->contains('user_id',$user->id);
     }
}
