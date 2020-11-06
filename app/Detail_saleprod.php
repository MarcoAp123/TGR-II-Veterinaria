<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_saleprod extends Model
{
    protected $fillable = [
        'product_sale_id', 'product_id', 'quantity', 'partial_cost',
    ];


    public function product_sale()
    {
        return $this->belongsTo(Product_sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
