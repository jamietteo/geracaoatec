<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//
class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function technicians(){
        return $this->belongsToMany(Technician::class)
            ->withTimestamps();
    }
}
