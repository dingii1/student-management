<?php

namespace App\Http\Controllers;

use App\Models\StudentGrade;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentGradeController extends Controller
{
    
    public function create(Student $student)
    {
        $courses = Course::all();

        return view('grades.create', compact('student', 'courses'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'required|integer|min:0|max:100',
        ]);
    
        $student_id = $request->input('student_id');

        StudentGrade::create($request->all());

        return redirect()->route('students.show', ['id' => $student_id])
        ->with('success', 'Grade added successfully');
    }
}
