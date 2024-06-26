<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_image',
        'date_of_birth',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullNameAttribute()
    {
        $firstName = ucfirst(strtolower($this->first_name)); 
        $lastName = ucfirst(strtolower($this->last_name));
        
        return "{$firstName} {$lastName}";
    }

    public function getProfileImageAttribute(){
        $profile_deafult = 'img/default-profile.jpg';
        return asset( $this->profile_image ?? $profile_deafult);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
