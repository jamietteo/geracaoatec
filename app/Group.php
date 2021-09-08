<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'name'
    ];

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
