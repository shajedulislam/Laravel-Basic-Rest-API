<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetProfile extends Model
{
    protected $table = 'petprofile';
    protected $fillable = ['user_id', 'pet_id', 'type', 'name', 'gender', 'breed', 'birthday', 'neutered_spayed', 'color', 'notes'];
}
