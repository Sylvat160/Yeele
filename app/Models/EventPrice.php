<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_uid',
        'label',
        'value'
    ];

    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();

        static::creating(function($event_price) {
            if(!$event_price->uid) $event_price->uid = Str::uuid();
        });
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_uid');
    }
}
