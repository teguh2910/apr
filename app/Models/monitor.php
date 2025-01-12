<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class monitor extends Model
{
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
