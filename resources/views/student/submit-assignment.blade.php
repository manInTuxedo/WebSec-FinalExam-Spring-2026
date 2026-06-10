@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Assignment: {{ $assignment->title }}</h1>
    <p>{{ $assignment->description }}</p>
    <form method="POST" action="{{ route('student.submit', $assignment) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Submission File (pdf, doc, docx, zip)</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments (optional)</label>
            <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Assignment</button>
    </form>
</div>
@endsection
