<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'date'
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
