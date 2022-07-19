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
        'category_uid',
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
        'form_fields_names'
    ];

    protected $hidden = [
        'uid',
        'user_uid',
        'category_uid',
        'country_id'
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
}
