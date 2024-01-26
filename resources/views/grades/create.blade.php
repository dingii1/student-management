@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Grade for {{ $student->firstName }} {{ $student->lastName }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('grades.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="course_id">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="student_id" value="{{ $student->id }}">

                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="number" name="grade" id="grade" class="form-control" min="0" max="100">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Add Grade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection