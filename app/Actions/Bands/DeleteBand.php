<?php

namespace App\Actions\Bands;

use App\Models\Band;

class DeleteBand
{
      public function execute(Band $band): bool
      {
             return $band->delete();
      }
}