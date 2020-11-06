<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_id', 'name', 'email', 'salary', 'adress', 'password', 'phone',
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


    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function assistance()
    {
        return $this->hasMany(Assistance::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function medicine_sales()
    {
        return $this->hasMany(Medicine_sale::class);
    }

    public function product_sales()
    {
        return $this->hasMany(Product_sale::class);
    }

    public function haircuts()
    {
        return $this->hasMany(Haircut::class);
    }
}
