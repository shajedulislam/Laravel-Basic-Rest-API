<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POprofile extends Model
{
    protected $table = 'po_profile';
    protected $fillable = ['user_id','first_name','last_name','mobile_no','latitude','longitude','email,','address','access_token'];
}
