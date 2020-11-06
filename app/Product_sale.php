<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sale extends Model
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

    public function detail_saleprods()
    {
        return $this->hasMany(Detail_salepro::class);
    }
}
