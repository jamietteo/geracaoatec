<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserForm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'periodicity'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
