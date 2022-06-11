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
        'map_html',
        'country',
        'city',
        'bg_color',
        'text_color',
        'counter_active'
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

    public function country() {
        $this->belongsTo(Country::class, 'country_id');
    }

    public function category() {
        $this->belongsTo(Category::class, 'category_uid');
    }
}
