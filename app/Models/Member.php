<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'band_id',
        'name',
        'nickname',
    ];

    public function bands()
    {
        return $this->belongsToMany(Band::class)
            ->withPivot('role', 'joined_at', 'left_at', 'is_original_member')
            ->withTimestamps();
    }

    public function scopeCurrent($query)
    {
        return $query->whereNull('left_at');
    }
}