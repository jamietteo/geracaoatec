<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{

    protected $fillable = [
        'name',
        'atec_number'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class)
            ->withTimestamps();
    }

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }

    public function userforms(){
        return $this->hasMany(UserForm::class);
    }
}
