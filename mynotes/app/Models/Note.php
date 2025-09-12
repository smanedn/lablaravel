<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['note','type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
