<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'client_id', 'name', 'species', 'sex',  'age', 'race', 'weight', 'color',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function consultation()
    {
        return $this->hasMany(Consultation::class);
    }

    public function haircuts()
    {
        return $this->hasMany(Consultation::class);
    }

}
