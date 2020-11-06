<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'provider_id', 'name', 'company', 'quantity', 'sale_price', 'purchase_price', 'lot', 'date_expiry'
    ];


    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function detail_salemeds()
    {
        return $this->hasMany(Detail_salemed::class);
    }
}
