<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'name', 'species', 'sex',
    ];


    public function medical_records()
    {
        return $this->hasMany(Medical_record::class);
    }
}
