<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Client;

class PetController extends Controller
{
    public function index()
    {
        $list_clients = Client::all();
        $list_pets = Pet::all();
        return view('pets', compact('list_clients', 'list_pets'));
    }

    public function store(Request $request)
    {
    	$pet = Pet::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
    	$pet = pet::findOrFail($request->pet_id);
    	$pet->update($request->all());
        return back();
    }

    public function pets_client(Request $request, $id)
    {
        $list_pets = Pet::where('client_id', '=', $id)->get();
        $list_clients = Client::all();
        return view('pets_client', compact('list_pets', 'list_clients'));
    }

    public function getpets(Request $request, $id)
    {
        return Pet::where('client_id', '=', $id)->get();
    }
}
