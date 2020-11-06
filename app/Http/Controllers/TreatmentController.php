<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentController extends Controller
{
    public function index()
    {
      $list_treatments = Treatment::all();
      return view('treatments', compact('list_treatments'));
    }

    public function store(Request $request)
    {
    	$treatment = Treatment::create($request->all());
      return back();
    }

    public function update(Request $request)
    {
    	$treatment = Treatment::findOrFail($request->treatment_id);
    	$treatment->update($request->all());
      return back();
    }

    public function gettreatment(Request $request, $id)
    {
        return Treatment::where('id', '=', $id)->get();
    }
}
