<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_salemed extends Model
{
    protected $fillable = [
        'medicine_sale_id', 'medicine_id', 'quantity', 'partial_cost',
    ];


    public function medicine_sale()
    {
        return $this->belongsTo(Medicine_sale::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
