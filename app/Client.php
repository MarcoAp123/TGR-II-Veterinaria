<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'ci', 'nit', 'phone', 'adress',
    ];

    
    public function hospitalization()
    {
        return $this->hasOne(Hospitalization::class);
    }
}
