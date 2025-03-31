<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'email', 'nome', 'password'
    ];

    // criar relação com as listas
    public function listas()
    {
        return $this->hasMany(Lista::class);
    }


}
