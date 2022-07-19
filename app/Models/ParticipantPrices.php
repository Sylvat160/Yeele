<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantPrices extends Model
{
    use HasFactory;
    protected $fillable = ['participant_id', 'event_price_uid', 'quantity'];

    public function participant() {
        return $this->belongsTo(Participant::class);
    }

    public function eventPrice() {
        return $this->belongsTo(EventPrice::class, 'event_price_uid');
    }

    /**
     * Participant selection total amount
     */
    public function total() {
        return $this->quantity * $this->eventPrice->value;
    }
}
