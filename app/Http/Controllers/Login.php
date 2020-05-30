<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Login extends Controller
{
    function Registro(Request $request){
        $usuario = new User;
        $usuario->user = $request->email;
        $usuario->name = $request->email;
        $usuario->lastname = $request->email;
        $usuario->userType = $request->email;
        $usuario->email = $request->email;
        $usuario->pass = $request->email;
        $usuario->state = 2;
        $usuario->save();
    }
}
