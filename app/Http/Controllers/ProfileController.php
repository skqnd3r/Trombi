<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
    public function show_profile($login)
    {
        $user = User::where('login', "=", $login)->first();
        return view('profile', ['user' => $user]);
    }

    public function show_update($login)
    {
        $user = User::where('login', "=", $login)->first();
        return view('update', ['user' => $user]);
    }

    function update($login, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rights' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'service' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', "Les champs n'ont pas été remplis correctement.")->withInput();
        } else {
            $employee = User::where('login', "=", $login)->first();
            $employee->rights = $request->rights;
            $employee->email = $request->email;
            $employee->nom = $request->nom;
            $employee->prenom = $request->prenom;
            $employee->phone = $request->input('phone', '');
            $employee->tags = $request->tags;
            $employee->service = $request->service;
            $employee->save();
            return;
        }
    }

    function remove($login)
    {
        $employee = User::where('login', "=", $login)->first();
        $employee->delete();
        return;
    }
}
