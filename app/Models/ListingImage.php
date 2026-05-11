<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingImage extends Model
{
    use HasFactory;

    /**
     * Atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'listing_id',
        'image_url',
        'is_cover',
        'order',
    ];

    /**
     * Casts automáticos dos atributos.
     */
    protected $casts = [
        'is_cover' => 'boolean',
        'order'    => 'integer',
    ];

    // ─── Relacionamentos ──────────────────────────────────────────────────────

    /**
     * Uma imagem pertence a um anúncio.
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
