<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    protected $fillable = [
        'sector', 'size', 'type',
    ];

    
    public function hospitalization()
    {
        return $this->hasMany(Hospitalization::class);
    }
}
