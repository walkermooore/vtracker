<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relacionamento 1:N -> Um usuário (Analista) pode reportar MÚLTIPLAS vulnerabilidades.
    // Passo a chave estrangeira 'reporter_id' pois ela foge da convenção padrão 'user_id' do Eloquent.
    public function reportedVulnerabilities(): HasMany
    {
        return $this->hasMany(Vulnerability::class, 'reporter_id');
    }

    // Relacionamento 1:N -> Um usuário pode gerar múltiplos logs (interações, comentários) no sistema.
    public function logs(): HasMany
    {
        return $this->hasMany(VulnerabilityLog::class);
    }
}
