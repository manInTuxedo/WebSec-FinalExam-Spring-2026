<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::with('instructor')->get();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('instructor', 'assignments');
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'instructor_id' => auth()->id(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
}
