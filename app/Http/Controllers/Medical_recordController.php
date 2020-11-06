<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medical_record;
use App\Operation;
use App\Treatment;
use App\Service;

class Medical_recordController extends Controller
{
    public function store_medical_record(Request $request)
    {
        $treatment_id = $request->treatment_id;
        $cost = $request->cost;
        return Medical_record::create($request->all());
    }

    public function getmedical_records(Request $request, $id)
    {
    	return Medical_record::with(['treatment', 'operation', 'service'])->where('consultation_id','=', $id)->get();
    }
}
  