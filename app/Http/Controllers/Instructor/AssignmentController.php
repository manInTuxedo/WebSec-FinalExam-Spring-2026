<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor,course_admin']);
    }

    public function create(Course $course)
    {
        return view('instructor.create-assignment', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('course_materials', 'public');
        }

        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'course_id' => $course->id,
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('courses.show', $course)->with('success', 'Material uploaded.');
    }
}