<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'name', 'species', 'sex', 'duration_days', 'duration_weeks',
    ];

    public function medical_records()
    {
        return $this->hasMany(Medical_record::class);
    }

    public function controls()
    {
        return $this->hasMany(Control::class);
    }
}
