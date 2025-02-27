<?php

namespace App\Models;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quatrain extends Model
{
    protected $guarded = [];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }

    public function body(): Attribute
    {
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        return Attribute::make(
            get: fn (string $value) => $purifier->purify($value),
        );
    }
}
