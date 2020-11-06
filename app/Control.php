<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $fillable = [
        'medical_record_id', 'treatment_id', 'medicine_id', 'day', 'week', 'state', 'observations',
    ];


    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function medical_record()
    {
        return $this->belongsTo(Medical_record::class);
    }
}
