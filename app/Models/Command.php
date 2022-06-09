<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_uid', 
        'plan_id', 
        'duration',
        'start_date',
        'end_date',
        'payment_method'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_uid');
    }

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'command_id');
    }
}
