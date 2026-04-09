<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
      use HasFactory;
      protected $fillable = ['name', 'date_formed', 'country', 'status'];

      public function genres()
      {
            return $this->belongsToMany(Genre::class);
      }

      public function albums()
      {
            return $this->belongsToMany(Album::class);
      }

      public function members()
      {
            return $this->belongsToMany(Member::class)
                  ->withPivot('role', 'joined_at', 'left_at', 'is_original_member')
                  ->withTimestamps();
      }
}
