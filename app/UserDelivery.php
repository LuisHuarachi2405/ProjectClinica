<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDelivery extends Model
{
    protected $table = 'users_delivery';

    protected $primaryKey = 'user_delivery_id';

    protected $fillable = ['user_delivery_id','description','state'];
    
}
