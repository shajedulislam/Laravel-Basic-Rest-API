<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    protected $table = 'petowner_user';
    protected $fillable = ['user_id', 'email', 'mobile_number', 'password', 'first_name', 'last_name', 'latitude', 'longitude', 'address'];
}
