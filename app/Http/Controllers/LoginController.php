<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;


class LoginController extends Controller
{
    public function show_login()
    {
        // Cookie::get('authenticator');
        return view("login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->with('error', "Problème d'authentification."); //oublie d'entrer les 
        } else {
            $response = HTTP::post('https://auth.etna-alternance.net/login', [
                'login' => $request->email,
                'password' => $request->password,
            ]);

            if ($response == "{}") {
                return redirect('login')->with('error', "Problème d'authentification !");
            } else {
                //if adm
                $content = response($response)->getContent();
                $profile = content($content);
                //backdoor
                $admin = array('amram_n', 'blain_t', 'meteil_l', 'andria_c');
                // if admin
                if (!in_array($profile->login, $admin) && !in_array("adm", $profile->groups)) {
                    return redirect('login')->with('error', "Vous n'avez pas les droits d'accès à cette page."); //pas les droits adm
                } else {
                    //cookie
                    $rp = $response->getHeader('set-cookie')[0];
                    $rp = str_replace(";", "&", $response->getHeader('set-cookie')[0]);
                    parse_str($rp, $cookie);
                    if (isset($_COOKIE['auth'])) {
                        unset($_COOKIE['auth']);
                    }
                    setcookie('auth', $cookie['authenticator']);
                    $user = User::where('login', $profile->login)->first();
                    if (empty($user)) {
                        return redirect('login')->with('error', "Vous n'avez pas les droits d'accès à cette page."); //pas dans le trombi
                    } else {
                        if(Auth::loginUsingId($user->id)){
                            return redirect('trombi');
                        } else {
                            return redirect('login')->with('error', "Vous n'avez pas les droits d'accès à cette page.");
                        }
                    }
                }
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
