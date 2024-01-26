@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="mb-3">
            <label for="first-name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first-name" name="firstName" required>
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last-name" name="lastName" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="user-id" class="form-label">User id</label>
            <input type="text" class="form-control" id="user-id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="student-number" class="form-label">Student number</label>
            <input type="text" class="form-control" id="student-number" name="studentNumber" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection