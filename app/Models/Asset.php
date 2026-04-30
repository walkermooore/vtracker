<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Proteção contra Mass Assignment. Defino explicitamente quais campos o usuário pode enviar em um POST request.
#[Fillable(['name', 'url_or_ip', 'description'])]
class Asset extends Model
{
    use HasFactory;

    // Relacionamento 1:N -> Um único Ativo (Ex: Servidor de Pagamento) pode conter VÁRIAS vulnerabilidades.
    public function vulnerabilities(): HasMany
    {
        return $this->hasMany(Vulnerability::class);
    }
}
