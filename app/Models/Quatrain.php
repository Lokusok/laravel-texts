<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quatrain extends Model
{
    protected $guarded = [];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }
}
