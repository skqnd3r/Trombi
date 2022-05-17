<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function show_trombi()
    {
        $users = User::all();
        return view('trombi')->with('users', $users);
    }
    public function show_service($service)
    {
        $users = User::all();
        return view('service')->with('users', $users)->with('service', $service);
    }

    public function show_admin()
    {
        return view('admin');
    }

    public function show_admin2($service)
    {
        return view('admin')->with('service',$service);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users,login',
            'rights' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'service'=> 'required',
        ]);
        
        if ($validator->fails()) {
            return back()->with('error', "Les champs n'ont pas été remplis correctement.")->withInput();
        } else {
            $employee = new User;
            $employee->login = $request->login;
            $employee->rights = $request->rights;
            $employee->email = $request->email;
            $employee->nom = $request->nom;
            $employee->prenom = $request->prenom;
            $employee->phone = $request->input('phone', '');
            $employee->tags = $request->tags;
            $employee->service = $request->service;
            $employee->save();

            return view('admin');
        }
    }
}
