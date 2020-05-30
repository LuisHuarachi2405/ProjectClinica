<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatePatient extends Model
{
    protected $table = 'states_patient';

    protected $primaryKey = 'state_patient_id';

    protected $fillable = ['state_patient_id','description','state'];
}
