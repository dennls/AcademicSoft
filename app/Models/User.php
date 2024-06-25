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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'avatar'
    ];

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
        'password' => 'hashed',
    ];


    // obtener la imagen
    public function getAvatarUrl()
    {
        if($this->avatar && $this->avatar != 'avatar.png' && $this->avatar != null)
        {
            // verificar si la imagen inicia con http
            if(strpos($this->avatar, 'http') === 0)
            {
                return $this->avatar;
            }

            return asset('avatar/'.$this->avatar);
        } else {
            return 'https://ui-avatars.com/api/?background=CCCCCC&color=fff&name='.urlencode($this->name);
        }
    }
}
