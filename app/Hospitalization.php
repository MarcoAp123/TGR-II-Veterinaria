<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $fillable = [
        'medical_record_id', 'cage_id', 'free', 'occupied'< 'maintenance',
    ];

    public function cage()
    {
        return $this->belongsTo(Cage::class);
    }

    public function medical_record()
    {
        return $this->hasOne(Medical_record::class);
    }
}
