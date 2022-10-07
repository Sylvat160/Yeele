<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PaymentAccount extends Model
{
    use HasFactory;
    
    protected $guarded = ['uid'];

    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();

        /**
         * Add Uuid to creationg user
         */
        static::creating(function($user) {
            if(!$user->uid) $user->uid = Str::uuid();
        });
    }

    public function event_payment_method() {
        return $this->belongsTo(EventPaymentMethod::class);
    }
}
