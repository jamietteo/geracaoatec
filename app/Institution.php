<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'zone'
    ];

    public function technicians(){
        return $this->hasMany(Technician::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }
}
