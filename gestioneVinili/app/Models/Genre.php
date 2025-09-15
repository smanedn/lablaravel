<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'music_genre';

    protected $fillable = ['name'];

    public function vinyls(): BelongsToMany
    {
        return $this->belongsToMany(Vinyl::class, 'vinyl_music_genres', 'genre_id', 'vinyl_id')
            ->withTimestamps();
    }
}
