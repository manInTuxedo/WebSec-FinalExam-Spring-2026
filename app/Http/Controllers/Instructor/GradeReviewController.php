<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\GradeReview;

class GradeReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor,course_admin']);
    }

    public function index()
    {
        // Only reviews for courses where user is instructor or admin
        $reviews = GradeReview::whereHas('submission.assignment.course', function($q) {
            if (!auth()->user()->hasRole('course_admin')) {
                $q->where('instructor_id', auth()->id());
            }
        })->with('submission.student', 'submission.assignment')->get();

        return view('instructor.grade-reviews', compact('reviews'));
    }

    public function complete(GradeReview $review)
    {
        $review->status = 'completed';
        $review->save();
        return back()->with('success', 'Review marked as completed.');
    }
}