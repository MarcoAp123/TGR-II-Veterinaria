<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;

class UserController extends Controller
{
    public function index()
    {
        $list_users = User::all();
        $list_rols = Rol::all();
        return view('users', compact('list_users', 'list_rols'));
    }

    public function store(Request $request)
    {
    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
            'password' => bcrypt($request->password),
            'salary' => $request->salary,
            'phone' => $request->phone,
            'adress' => $request->adress,
    		'rol_id' => $request->rol_id,
    	]);
        return back();
    }

    public function update(Request $request)
    {
    	$user = User::findOrFail($request->user_id);
    	$user->update($request->all());
        return back();
    }
}
