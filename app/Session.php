<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'begin_time',
        'comments'
    ];

    public function user_forms(){
        return $this->belongsTo(UserForm::class);
    }
}
