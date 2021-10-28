<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserForm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'periodicity',
        'student_id',
        'user_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function groups() {
        return $this->hasManyThrough(Group::class, Student::class, 'id', 'id', 'student_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
