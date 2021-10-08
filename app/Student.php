<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'atec_number',
        'name',
        'birthdate'
    ];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    public function userform(){
        return $this->belongsTo(UserForm::class);
    }

    public function tests(){
        return $this->belongsToMany(Test::class)->withPivot('evaluation');
    }
}
