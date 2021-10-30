<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    protected $fillable = [
        'atec_number',
        'name',
        'birthdate'
    ];

    public function groups(){
        return $this->belongsToMany(Group::class)->withPivot('group_id');
    }

    public function userform(){
        return $this->hasOne(UserForm::class);
    }

    public function tests(){
        return $this->belongsToMany(Test::class)->withPivot('evaluation');
    }
}
