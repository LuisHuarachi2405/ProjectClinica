<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;

class FarmaciaController extends Controller
{
     function index(){
        $id = Auth::id();
        $pacientes = DB::table('patients')->get();
        $tipo_usuario = DB::table('users')->select('userType')->where('user_id',$id)->get();
        $tipo  = User::find($id, 'userType');
    
        return view('farmacia',['tipo'=>$tipo["userType"]]);
     }

     function getpatFarmacia(){
      
      $datos = DB::table('patients')
      ->where('patients.state_patient_id','=',2)
      ->get();
      return $datos;
     }
}
