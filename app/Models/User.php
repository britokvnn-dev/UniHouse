<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar_url',
    ];

    /**
     * Atributos ocultos na serialização (nunca retornar senha).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts automáticos dos atributos.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ─── Relacionamentos ──────────────────────────────────────────────────────

    /**
     * Um usuário pode ter vários anúncios (se for locador).
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Verifica se o usuário é um locador.
     */
    public function isLandlord(): bool
    {
        return $this->role === 'locador';
    }

    /**
     * Verifica se o usuário é estudante.
     */
    public function isStudent(): bool
    {
        return $this->role === 'estudante';
    }
}
