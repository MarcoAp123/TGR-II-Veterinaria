<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = [
        'user_id', 'state', 'discount', 'payment',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
