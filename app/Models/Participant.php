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
        'additional_data',
        'payment_status'
    ];

    public function event() {
        return $this->belongsTo(Event::class, 'event_uid');
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public function participantPrices() {
        return $this->hasMany(ParticipantPrices::class);
    }
}
