<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    /**
     * Atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'listing_id',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'latitude',
        'longitude',
    ];

    /**
     * Casts automáticos dos atributos.
     */
    protected $casts = [
        'latitude'  => 'float',
        'longitude' => 'float',
    ];

    // ─── Relacionamentos ──────────────────────────────────────────────────────

    /**
     * Um endereço pertence a um anúncio.
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Retorna o endereço completo como string formatada.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = [
            "{$this->street}, {$this->number}",
            $this->complement,
            $this->neighborhood,
            "{$this->city} - {$this->state}",
            $this->zip_code,
        ];

        return implode(', ', array_filter($parts));
    }
}
