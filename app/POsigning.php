<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POsigning extends Model
{
    protected $table = 'po_signing';
    protected $fillable = ['user_id','email','mobile_no','password','access_token'];
}
