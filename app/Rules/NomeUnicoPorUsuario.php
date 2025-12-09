<?php

namespace App\Rules;

use App\Models\Lista;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NomeUnicoPorUsuario implements ValidationRule
{
    public function __construct(
        private ?int $ignoreId = null
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $existe = Lista::doUsuario()
            ->where('nome', $value)
            ->when($this->ignoreId, fn($q) => $q->where('id', '!=', $this->ignoreId))
            ->exists();

        if ($existe) {
            $fail("Você já possui uma lista com este nome.");
        }
    }
}
