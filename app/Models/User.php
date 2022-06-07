<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'role_id',
        'firstname',
        'lastname',
        'gender',
        'email',
        'phone',
        'organization',
        'is_authorized',
        'email_verified_at',
        'password',
    ];

    public $incrementing = false;
    protected $primaryKey = "uid";
    protected $keyType = "string";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($user) {
            if(!$user->uid) $user->uid = Str::uuid();
        });
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function commands() {
        return $this->hasMany(Command::class);
    }

    public function currentCommand() {
        return Command::where('user_id', auth()->user()->uid)
                        ->where('start_date', '<', Carbon::now())
                        ->where('end_date', '>', Carbon::now())
                        ->first();
    }
}
