<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentsController extends Controller
{
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
        ]);
    
        // Create a new student record
        $student = Student::create($validatedData);
    
        // Redirect or respond with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        // Retrieve the student by ID with the associated courses and grades
        $student = Student::with(['courses', 'grades'])->findOrFail($id);

        // Return the student details view with the loaded related data
        return view('students.show', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        // Find the student record by ID
        $student = Student::findOrFail($id);

        // Update the student record
        $student->update($validatedData);

        // Redirect or respond with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        // Find the student record by ID and delete it
        $student = Student::findOrFail($id);
        $student->delete();

        // Redirect or respond with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
