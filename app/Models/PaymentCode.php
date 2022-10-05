<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCode extends Model
{
    use HasFactory;
    protected $guarded = ['uid'];

    public function event_payment_method() {
        return $this->belongsTo(EventPaymentMethod::class);
    }
}
