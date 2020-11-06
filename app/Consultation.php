<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'date_id', 'user_id', 'client_id', 'pet_id', 'weight', 'age', 'temperature', 'heart_rate', 'diagnostic',
    ];


    public function date()
    {
        return $this->hasOne(Date::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Pet::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function medical_records()
    {
        return $this->hasMany(Medical_record::class);
    }
}
