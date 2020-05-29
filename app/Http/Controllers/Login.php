<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    function Logeo(Request $request){
        echo $request->email;
        echo $request->password;
    }
}
