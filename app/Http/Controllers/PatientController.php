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
    
        return view('pacientes',['tipo'=>$tipo["userType"]]);
        
    }
    

    function getPatientes(){
        $pacientes = Patient::All();
        return $pacientes;
    }

    function crearPaciente(Request $request){
        $idUser = Auth::id();
        Patient::Create(
            [
                'name' => $request->data['name'],
                'lastname' => $request->data['lastname'],
                'address' => $request->data['address'],
                'district' => $request->data['district'],
                'reference' => $request->data['reference'],
                'priority' => 2,
                'doctor' => $request->data['doctor'],
                'user_id' => $idUser,
                'user_delivery_id' => 1,
                'state_patient_id' => 1,
                'type_patient_id' => 1,
                'insurance' => $request->data['insurance'],
                'cellphone' => $request->data['cellphone'],
                'state' => 2,
            ]
            );
    }

    function updatePatient(Request $request){
        $idSelect = $request->data['patient_id'];
        $codigo = $request->data['oa'];
        $datos = DB::table('patients')
        ->where('patients.patient_id','=',$idSelect)
        ->update([
            'oa' => $codigo,
            'state_patient_id' => 2
            ]);
        
    }
}
