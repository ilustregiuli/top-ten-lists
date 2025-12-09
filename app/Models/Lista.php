<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'pos_01',
        'pos_02',
        'pos_03',
        'pos_04',
        'pos_05',
        'pos_06',
        'pos_07',
        'pos_08',
        'pos_09',
        'pos_10',
        'usuario_id'
        ];

    // Criar relação com o usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

     /**
     * Escopo para retornar apenas listas do usuário logado
     */
    public function scopeDoUsuario($query, $userId = null)
    {
        return $query->where('usuario_id', $userId ?? auth()->id());
    }

}
