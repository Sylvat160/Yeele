<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_uid',
        'firstname',
        'lastname',
        'email',
        'phone',
        'civility',
        'price',
        'payment_method',
        'field_uid',
        'additional_data'
    ];

    public function events() {
        return $this->belongsTo(Event::class);
    }
}
