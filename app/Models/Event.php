<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'category_id',
        'user_uid',
        'name',
        'description',
        'chosen_form',
        'start_date_time',
        'end_date_time',
        'signup_end_date_time',
        'image',
        'location',
        'type_id',
        'map_html',
        'country',
        'city',
        'bg_color',
        'text_color',
        'counter_active',
        'clicks',
        'form_fields_names',
        'multiple_prices_active',
        'prices_quantity_active'
    ];

    protected $hidden = [
        'user_uid',
        'category_uid',
        'country_id',
        'map_html'
    ];
    
    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();

        static::creating(function($event) {
            if(!$event->uid) $event->uid = Str::uuid();
        });
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_uid');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_uid');
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function eventPrices() {
        return $this->hasMany(EventPrice::class);
    }

    public function event_payment_methods() {
        return $this->hasMany(EventPaymentMethod::class);
    }

    public function fields() {
        return $this->hasMany(Field::class);
    }

    public function participants() {
        return $this->hasMany(Participant::class);
    }

    public function form() {
        return $this->hasOne(Form::class);
    }

    public function payment_accounts() {
        $accounts = [];
        foreach($this->event_payment_methods as $method)
            if($method->payment_accounts) array_push($accounts, $method->payment_accounts);
        return $accounts;
    }

    public function getCustomAttribute() {
        $directPaymentMethod = [];
        foreach ($this->event_payment_methods as $paymentMethod) {
            if(in_array($paymentMethod->name, ["Carte bancaire", "Mobile Money"])) {
                array_push($directPaymentMethod, $paymentMethod->name);
            }
        }



        $hasDirectPayment = !empty($directPaymentMethod);
        $paymentAccounts = $this->payment_accounts();
        $payMethWithoutPayAcc = $this->payMethWithoutPayAcc();

        return compact('directPaymentMethod', 'hasDirectPayment', 'paymentAccounts', 'payMethWithoutPayAcc');
    }

    public function payMethWithoutPayAcc() {
        $payments = [];
        $curPayMethWithPayAcc = [];

        foreach($this->payment_accounts() as $payAcc) 
            array_push($curPayMethWithPayAcc, $payAcc->event_payment_method->name);
        
        foreach($this->event_payment_methods as $meth)
            if(!in_array($meth->name, $curPayMethWithPayAcc)) {
                array_push($payments, $meth);
            }
            return $payments;
    }

}
