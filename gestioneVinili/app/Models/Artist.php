<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artist';

    protected $fillable = [
        'first_name',
        'last_name',
        'photo_image',
    ];

    public function vinyls(): HasMany
    {
        return $this->hasMany(Vinyl::class, 'artist_id');
    }
}
