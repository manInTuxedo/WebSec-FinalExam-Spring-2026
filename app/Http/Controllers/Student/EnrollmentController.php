<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }

    public function enroll(Course $course)
    {
        $user = auth()->user();
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Already enrolled.');
        }
        $user->enrollments()->create(['course_id' => $course->id]);
        return back()->with('success', 'Enrolled successfully.');
    }

    public function myCourses()
    {
        $courses = auth()->user()->enrollments()->with('course')->get()->pluck('course');
        return view('student.my-courses', compact('courses'));
    }
}