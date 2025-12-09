<?php

namespace App\Policies;

use App\Models\Lista;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lista.
     */
    public function view(Usuario $user, Lista $lista): bool
    {
        return $lista->usuario_id === $user->id;
    }

    /**
     * Determine whether the user can update the lista.
     */
    public function update(Usuario $user, Lista $lista): bool
    {
        return $lista->usuario_id === $user->id;
    }

    /**
     * Determine whether the user can delete the lista.
     */
    public function delete(Usuario $user, Lista $lista): bool
    {
        return $lista->usuario_id === $user->id;
    }

    // adicione outros métodos se precisar (create, restore, forceDelete, etc.)
}
