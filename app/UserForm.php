<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $fillable = [
        'date',
        'periodicity'
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function technicians(){
        return $this->belongsTo(Technician::class);
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
