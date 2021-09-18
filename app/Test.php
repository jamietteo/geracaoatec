<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date'
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
