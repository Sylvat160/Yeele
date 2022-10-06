<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventPaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = ['event_uid', 'name'];

    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();

        static::creating(function($event_payment_method) {
            if(!$event_payment_method->uid) $event_payment_method->uid = Str::uuid();
        });
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_uid');
    }

    public function payment_accounts() {
        return $this->hasOne(PaymentAccount::class);
    }
}
