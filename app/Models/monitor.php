<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class monitor extends Model
{
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function picas(): HasMany
    {
        return $this->hasMany(pica::class);
    }
}
