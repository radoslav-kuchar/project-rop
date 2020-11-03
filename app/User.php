<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $user->profile()->create([
                'companyName' => 'Názov spoločnosti',
                'image' => 'images/profile_picture_default.webp',
                'isCompany' => false
            ]);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function services(){
        return $this->hasMany(Service::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
