<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetService extends Model
{
    protected $table = 'petservice_user';
    protected $fillable = ['user_id', 'service_type', 'email', 'mobile_number', 'password', 'first_name', 'last_name', 'registration_number', 'nid_number', 'latitude', 'longitude', 'address'];
}
