<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
        'wheelchair',
    ];

    public function panel() :HasMany
    {
        return $this->hasMany(Panel::class);
    }
}
