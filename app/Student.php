<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'atec_number',
        'nome',
        'birthdate'
    ];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    public function userforms(){
        return $this->belongsTo(UserForm::class);
    }

    public function tests(){
        return $this->belongsToMany(Test::class);
    }
}
