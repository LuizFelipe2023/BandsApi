<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'release_date',
        'description',
        'type',
        'cover_image'
    ];

    public function bands(): BelongsToMany
    {
        return $this->belongsToMany(Band::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}