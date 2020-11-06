<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
        'client_id', 'date',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }
}
