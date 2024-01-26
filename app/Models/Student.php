<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'user_id', 'studentNumber'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses')
            ->withPivot('grade')
            ->withTimestamps();
    }

    public function grades()
    {
        return $this->hasMany(StudentGrade::class);
    }
}