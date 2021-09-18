<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use SoftDeletes;

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
