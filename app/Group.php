<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'institution_id'
    ];

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
