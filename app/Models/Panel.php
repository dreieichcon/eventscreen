<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panel extends Model
{
    use Uuids;
    protected $fillable = [
        'title',
        'room_id',
        'description',
        'start',
        'end',
    ];

    protected function casts(): array
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime',
        ];
    }

    public function room() : BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
