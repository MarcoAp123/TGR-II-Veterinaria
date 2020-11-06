<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_record extends Model
{
    protected $fillable = [
        'consultation_id', 'operation_id', 'treatment_id', 'service_id', 'cost',
    ];

    
    public function hospitalization()
    {
        return $this->hasOne(Hospitalization::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
    
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function controls()
    {
        return $this->hasMany(Control::class);
    }
   
}
