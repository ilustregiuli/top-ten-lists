<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'email', 'nome', 'password'
    ];

    public function listas()
    {
        return $this->hasMany(Lista::class);
    }


}
