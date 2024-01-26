@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first-name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first-name" name="firstName" value="{{ $student->firstName }}" required>
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last-name" name="lastName" value="{{ $student->lastName }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="mb-3">
            <label for="student-number" class="form-label">Student number</label>
            <input type="text" class="form-control" id="student-number" name="studentNumber" value="{{ $student->studentNumber }}" readonly disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection