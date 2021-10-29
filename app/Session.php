<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_forms_id',
        'begin_time',
        'reason',
        'comments'
    ];

    public function user_forms(){
        return $this->belongsTo(UserForm::class);
    }
}
