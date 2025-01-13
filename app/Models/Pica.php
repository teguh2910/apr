<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Pica extends Model
{
    public function monitors(): belongsTo
    {
        return $this->belongsTo(monitor::class);
    }
}
