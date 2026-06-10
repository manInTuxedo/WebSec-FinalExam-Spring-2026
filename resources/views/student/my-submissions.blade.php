@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Submissions</h1>
    @if($submissions->isEmpty())
        <p>No submissions yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Review Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                    <tr>
                        <td>{{ $submission->assignment->title }}</td>
                        <td>{{ $submission->assignment->course->title }}</td>
                        <td>{{ $submission->grade ?? 'Not graded' }}</td>
                        <td>
                            @if($submission->gradeReview)
                                {{ $submission->gradeReview->status }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($submission->grade !== null)
                                @if(!$submission->gradeReview)
                                    <form method="POST" action="{{ route('submission.requestReview', $submission) }}">
                                        @csrf
                                        <input type="text" name="reason" placeholder="Reason for review" required class="form-control form-control-sm d-inline" style="width:auto;">
                                        <button type="submit" class="btn btn-sm btn-warning">Request Grade Review</button>
                                    </form>
                                @else
                                    <span class="badge bg-info">{{ $submission->gradeReview->status }}</span>
                                @endif
                            @else
                                <span class="text-muted">Awaiting grade</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
