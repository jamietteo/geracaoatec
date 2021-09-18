<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technician extends Model
{
    use SoftDeletes;

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
