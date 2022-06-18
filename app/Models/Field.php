<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Field extends Model
{

    use HasFactory;

    protected $fillable = [
        "event_uid",
        "name",
        "value"
    ];

    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();

        static::creating(function($field) {
            if(!$field->uid) $field->uid = Str::uuid();
        });
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_uid');
    }
}
