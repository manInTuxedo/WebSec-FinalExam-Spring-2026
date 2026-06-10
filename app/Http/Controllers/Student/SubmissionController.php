<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create(Assignment $assignment)
    {
        // Check if student is enrolled in the course
        $enrolled = auth()->user()->enrollments()->where('course_id', $assignment->course_id)->exists();
        if (!$enrolled) abort(403);
        return view('student.submit-assignment', compact('assignment'));
    }

    public function store(Request $request, Assignment $assignment)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,zip|max:10240',
            'comments' => 'nullable|string',
        ]);

        $path = $request->file('file')->store('submissions', 'public');

        Submission::updateOrCreate(
            ['assignment_id' => $assignment->id, 'student_id' => auth()->id()],
            ['file_path' => $path, 'comments' => $request->comments]
        );

        return redirect()->route('student.my-submissions')->with('success', 'Assignment submitted.');
    }

    public function mySubmissions()
    {
        $submissions = auth()->user()->submissions()->with('assignment.course')->get();
        return view('student.my-submissions', compact('submissions'));
    }

    public function requestReview(Submission $submission){
        if ($submission->student_id !== auth()->id()) abort(403);
        if ($submission->grade === null) {
            return back()->with('error', 'No grade to review yet.');
        }
        // Check if review already exists
        if ($submission->gradeReview) {
            return back()->with('error', 'Review already requested.');
        }
        \App\Models\GradeReview::create([
            'submission_id' => $submission->id,
            'reason' => request('reason'),
        ]);
        return back()->with('success', 'Grade review requested.');
    }
}