<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vinyl extends Model
{
    use HasFactory;

    protected $table = 'vinyl';

    protected $fillable = [
        'title',
        'release_year',
        'cover_image',
        'artist_id',
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'vinyl_music_genres', 'vinyl_id', 'genre_id')
            ->withTimestamps();
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
