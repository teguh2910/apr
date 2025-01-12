<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Supplier extends Model
{
    public function monitors(): HasMany
    {
        return $this->hasMany(monitor::class);
    }
}
