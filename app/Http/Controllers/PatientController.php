<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    function index(){
        $pacientes = DB::table('patients')->get();
        return view('pacientes',['pacientes' => $pacientes]);
    }
}
