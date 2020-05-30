<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $primaryKey = 'patient_id';

    protected $fillable = ['patient_id','name','lastname','address',
    'distric','reference','priority','doctor','user_id','user_delivery_id','state_patient_id',
    'type_patient_id','oa','insurance','cellphone','state'];

    
}
