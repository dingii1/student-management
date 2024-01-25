<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses');
    }

    public function grades()
    {
        return $this->hasMany(StudentGrade::class);
    }
}
