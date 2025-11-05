<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'email', 'nome', 'password'
    ];

    // criar relação com as listas
    public function listas()
    {
        return $this->hasMany(Lista::class);
    }


}
