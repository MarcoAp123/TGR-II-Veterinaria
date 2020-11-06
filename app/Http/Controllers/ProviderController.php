<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $list_providers = Provider::all();
        return view('providers', compact('list_providers'));
    }

    public function store(Request $request)
    {
    	$provider = Provider::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
    	$provider = Provider::findOrFail($request->provider_id);
    	$provider->update($request->all());
        return back();
    }
}
