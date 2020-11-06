<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'provider_id', 'name', 'company', 'quantity', 'sale_price', 'purchase_price', 'lot', 'date_expiry',
    ];


    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function detail_saleprods()
    {
        return $this->hasMany(Detail_saleprod::class);
    }
}
