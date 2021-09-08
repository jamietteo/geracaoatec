<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'begin_time',
        'comments'
    ];

    public function userforms(){
        return $this->belongsTo(UserForm::class);
    }
}
