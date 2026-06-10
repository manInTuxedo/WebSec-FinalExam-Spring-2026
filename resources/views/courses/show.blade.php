@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p class="text-muted">Instructor: {{ $course->instructor->name }}</p>

    <h3 class="mt-4">Assignments / Materials</h3>
    @if($course->assignments->isEmpty())
        <p>No assignments yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ str($assignment->description)->limit(80) }}</td>
                        <td>
                            @if($assignment->file_path)
                                <a href="{{ asset('storage/' . $assignment->file_path) }}" class="btn btn-sm btn-info" target="_blank">Download</a>
                            @endif
                            @if(auth()->user()->hasRole('student') && auth()->user()->enrollments()->where('course_id', $course->id)->exists())
                                <a href="{{ route('student.submit-form', $assignment) }}" class="btn btn-sm btn-primary">Submit</a>
                            @endif
                            @if(auth()->user()->hasRole('instructor') || auth()->user()->hasRole('course_admin'))
                                <a href="{{ route('instructor.assignments.create', $course) }}" class="btn btn-sm btn-secondary">Add Material</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(auth()->user()->hasRole('student') && !auth()->user()->enrollments()->where('course_id', $course->id)->exists())
        <form method="POST" action="{{ route('student.enroll', $course) }}">
            @csrf
            <button type="submit" class="btn btn-success">Enroll in Course</button>
        </form>
    @endif
</div>
@endsection
