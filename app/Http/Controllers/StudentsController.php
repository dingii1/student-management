<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:students|max:255',
            'studentNumber' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $student = Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $grades = $student->grades;

        return view('students.show', compact('student', 'grades'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        $student = Student::find($id);
        $student->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}