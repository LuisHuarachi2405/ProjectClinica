<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Patient;
use App\User;

class PatientController extends Controller
{
    function index(){
        $id = Auth::id();
        $pacientes = DB::table('patients')->get();
        $tipo_usuario = DB::table('users')->select('userType')->where('user_id',$id)->get();
        $tipo  = User::find($id, 'userType');
    
        return view('pacientes',['pacientes' => $pacientes,'tipo' => $tipo["userType"]]);
        
    }
    function login(Resquest $entradas){
        $entradas->name;
    }
}
