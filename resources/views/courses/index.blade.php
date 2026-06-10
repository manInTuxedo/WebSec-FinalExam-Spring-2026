@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">&larr; Back to Dashboard</a>
    <h1>Available Courses</h1>
    @if(auth()->user()->hasRole('instructor') || auth()->user()->hasRole('course_admin'))
        <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Create Course</a>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ str($course->description)->limit(100) }}</p>
                        <p class="text-muted">Instructor: {{ $course->instructor->name }}</p>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">View Details</a>
                        @if(auth()->user()->hasRole('student'))
                            <form method="POST" action="{{ route('student.enroll', $course) }}" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Enroll</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
