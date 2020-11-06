<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine_sale extends Model
{
    protected $fillable = [
        'user_id', 'client_id', 'total_cost',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function detail_salemeds()
    {
        return $this->hasMany(Detail_salemed::class);
    }
}
