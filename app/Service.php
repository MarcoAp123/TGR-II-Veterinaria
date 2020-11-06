<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'cost',
    ];


    public function medical_records()
    {
        return $this->hasMany(Medical_record::class);
    }
}
