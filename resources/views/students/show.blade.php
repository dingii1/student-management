@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>
    <p><strong>First name:</strong> {{ $student->firstName }}</p>
    <p><strong>Last name:</strong> {{ $student->lastName }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Student number:</strong> {{ $student->studentNumber }}</p>
    <h2>Grades:</h2>
    <ul>
        @foreach ($grades as $grade)
            <li>
                Course: {{ $grade->course->name }}
                Grade: {{ $grade->grade }}
            </li>
        @endforeach
    </ul>
    <tr>
        <td colspan="2">
            <a href="{{ route('grades.create', ['student' => $student->id]) }}" class="btn btn-primary">Add Grade</a>
        </td>
    </tr>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection