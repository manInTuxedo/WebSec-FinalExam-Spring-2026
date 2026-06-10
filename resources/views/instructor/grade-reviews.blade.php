@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">&larr; Back to Dashboard</a>
    <h1>Grade Review Requests</h1>
    @if($reviews->isEmpty())
        <p>No grade review requests.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->submission->student->name }}</td>
                        <td>{{ $review->submission->assignment->title }}</td>
                        <td>{{ $review->submission->assignment->course->title }}</td>
                        <td>{{ $review->reason }}</td>
                        <td>
                            <span class="badge bg-{{ $review->status === 'completed' ? 'success' : 'warning' }}">
                                {{ $review->status }}
                            </span>
                        </td>
                        <td>
                            @if($review->status === 'pending')
                                <form method="POST" action="{{ route('instructor.review.complete', $review) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Mark Completed</button>
                                </form>
                            @else
                                <span class="text-muted">Completed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
