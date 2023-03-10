<?php

namespace App\Models;

use App\Mail\AppMails\ResetPasswordMail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
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
        'uid',
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

        /**
         * Add Uuid to creationg user
         */
        static::creating(function($user) {
            if(!$user->uid) $user->uid = Str::uuid();
        });
    }

    public function sendPasswordResetNotification($token) {
        $link = route('password.reset', $token);
        Mail::to($this->email)->send(new ResetPasswordMail($link, $this));
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function commands() {
        return $this->hasMany(Command::class);
    }

    public function getCustomAttribute() {
        $currentCommand = $this->commands
                        ->where('start_date_time', '<=', Carbon::now())
                        ->where('end_date_time', '>=', Carbon::now())
                        ->where('active', true)
                        ->first();

        $allParticipants = 0;

        foreach ($this->events as $event) {
            $allParticipants += $event->participants->count();
        }

        return compact('currentCommand', 'allParticipants');
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
