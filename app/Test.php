<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'name',
        'subject'
    ];

    public function students(){
        return $this->belongsToMany(Student::class)->withPivot('evaluation');
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
