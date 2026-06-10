@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Assignment for: {{ $course->title }}</h1>
    <form method="POST" action="{{ route('instructor.assignments.store', $course) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Course Material (optional)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload Material</button>
    </form>
</div>
@endsection
