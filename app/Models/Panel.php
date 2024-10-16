<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panel extends Model
{
    use Uuids;
    protected $fillable = [
        'title',
        'host',
        'type',
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

    public function active() :Attribute
    {
        $now = Carbon::now();

        return new Attribute(
            get: fn() => $this->start < $now && $this->end > $now
        );
    }

    public function room() : BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
