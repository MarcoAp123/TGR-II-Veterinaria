<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'company', 'description', 'ci', 'nit', 'phone', 'email', 'adress',
    ];


    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
