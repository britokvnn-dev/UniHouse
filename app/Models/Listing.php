<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price_cents',
        'type',
        'status',
        'bedrooms',
        'bathrooms',
        'furnished',
        'pets_allowed',
        'zip_code',
        'internet_included',
    ];

    /**
     * Casts automáticos dos atributos.
     */
    protected $casts = [
        'price_cents'       => 'integer',
        'bedrooms'          => 'integer',
        'bathrooms'         => 'integer',
        'furnished'         => 'boolean',
        'pets_allowed'      => 'boolean',
        'internet_included' => 'boolean',
    ];

    // ─── Relacionamentos ──────────────────────────────────────────────────────

    /**
     * Um anúncio pertence a um usuário (locador).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Um anúncio tem um endereço.
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Um anúncio pode ter várias imagens.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    /**
     * Retorna a imagem de capa do anúncio.
     */
    public function coverImage(): HasOne
    {
        return $this->hasOne(ListingImage::class)->where('is_cover', true);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Retorna o preço formatado em reais (R$).
     */
    public function getPriceFormattedAttribute(): string
    {
        return 'R$ ' . number_format($this->price_cents / 100, 2, ',', '.');
    }

    /**
     * Escopo para filtrar apenas anúncios ativos.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'ativo');
    }

    /**
     * Escopo para filtrar por cidade (via endereço).
     */
    public function scopeInCity($query, string $city)
    {
        return $query->whereHas('address', fn($q) => $q->where('city', $city));
    }
}
