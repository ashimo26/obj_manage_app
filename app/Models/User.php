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
        'gender',
        'age'
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
    ];

    public function listrooms()
    {
        return $this->hasMany(ListRoom::class);
    }

    public function kachis()
    {
        return $this->hasMany(Kachi::class);
    }

    public function huyoubutus()
    {
        return $this->hasManyThrough(Huyoubutu::class,ListRoom::class);
    }

    public function wantbuys()
    {
        return $this->hasManyThrough(
            Wantbuy::class,
            List_Buy::class,
            'user_id',
            'list_buy_id',
            'id',
            'id'
        );
    }
}
