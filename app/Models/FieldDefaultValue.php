<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldDefaultValue extends Model
{
    use HasFactory;
    protected $fillable = ['field_uid', 'value'];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}