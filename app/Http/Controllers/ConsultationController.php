<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultation;
use App\Treatment;
use App\Client;

class ConsultationController extends Controller
{
    public function index_new_consultation(Request $request)
	{
    $list_clients = Client::all();
    $list_treatments = Treatment::all();
    return view('new_consultation', compact('list_clients', 'list_treatments'));
  }
  
  public function store_new_consultation(Request $request)
	{
		return Consultation::create([
			'user_id' => $request->user_id,
			'client_id' => $request->client_id,
			'pet_id' => $request->pet_id,
			'weight' => $request->weight,
			'age' => $request->age,
      'temperature' => $request->temperature,
      'heart_rate' => $request->heart_rate,
			'diagnostic' => $request->diagnostic,
		]);
	}
}
