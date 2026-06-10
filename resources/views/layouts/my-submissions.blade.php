@if($submission->grade !== null)
    @if(!$submission->gradeReview)
        <form method="POST" action="{{ route('submission.requestReview', $submission) }}">
            @csrf
            <textarea name="reason" placeholder="Reason for review" required></textarea>
            <button type="submit">Request Grade Review</button>
        </form>
    @else
        Status: {{ $submission->gradeReview->status }}
    @endif
@endif