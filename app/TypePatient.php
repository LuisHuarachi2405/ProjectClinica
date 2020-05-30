<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePatient extends Model
{
    protected $table = 'types_patient';

    protected $primaryKey = 'type_patient_id';

    protected $fillable = ['type_patient_id','description','state'];
}
