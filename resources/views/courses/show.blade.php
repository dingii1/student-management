@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Course Details</h1>
    <p><strong>Title:</strong> {{ $course->name }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection