<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    protected $guarded = [];

    public function quatrains(): HasMany
    {
        return $this->hasMany(Quatrain::class)->orderBy('order', 'ASC');
    }
}
