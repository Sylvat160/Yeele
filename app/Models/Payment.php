<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['command_id', 'status'];

    public function command() {
        return $this->belongsTo(Command::class, 'command_id');
    }
}
