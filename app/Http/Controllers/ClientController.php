<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $list_clients = Client::all();
        return view('clients', compact('list_clients'));
    }

    public function store(Request $request)
    {
    	$client = Client::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
    	$client = client::findOrFail($request->client_id);
    	$client->update($request->all());
        return back();
    }

    public function getclient(Request $request, $id)
    {
        return Client::where('id', '=', $id)->get();
    }
}
