@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Courses</h1>
    @if($courses->isEmpty())
        <p>You are not enrolled in any courses.</p>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ str($course->description)->limit(100) }}</p>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
