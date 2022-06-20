<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['event_uid', 'data'];

    public $imcrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {

        parent::boot();

        static::creating(function($form) {
            if(!$form->uid) $form->uid = Str::uuid();
        });
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_uid');
    }
}
