<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\RoleAssignmentController;
use App\Http\Controllers\Instructor\AssignmentController as InstructorAssignmentController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\SubmissionController;
use App\Http\Controllers\Instructor\GradeReviewController;

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Courses
Route::middleware('auth')->group(function () {
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('role:instructor,course_admin');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store')->middleware('role:instructor,course_admin');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
});

// Admin role assignment
Route::prefix('admin')->middleware(['auth', 'role:course_admin'])->group(function () {
    Route::get('/assign-roles', [RoleAssignmentController::class, 'index'])->name('admin.assign-roles');
    Route::post('/assign/{user}/{role}', [RoleAssignmentController::class, 'assign'])->name('admin.assign');
});

// Instructor: upload content & view grade reviews
Route::prefix('instructor')->middleware(['auth', 'role:instructor,course_admin'])->group(function () {
    Route::get('/courses/{course}/assignments/create', [InstructorAssignmentController::class, 'create'])->name('instructor.assignments.create');
    Route::post('/courses/{course}/assignments', [InstructorAssignmentController::class, 'store'])->name('instructor.assignments.store');
    Route::get('/grade-reviews', [GradeReviewController::class, 'index'])->name('instructor.grade-reviews');
    Route::post('/grade-reviews/{review}/complete', [GradeReviewController::class, 'complete'])->name('instructor.review.complete');
});

// Student: enroll, submit, my courses/submissions, request review
Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
    Route::post('/enroll/{course}', [EnrollmentController::class, 'enroll'])->name('student.enroll');
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('student.my-courses');
    Route::get('/assignments/{assignment}/submit', [SubmissionController::class, 'create'])->name('student.submit-form');
    Route::post('/assignments/{assignment}/submit', [SubmissionController::class, 'store'])->name('student.submit');
    Route::get('/my-submissions', [SubmissionController::class, 'mySubmissions'])->name('student.my-submissions');
    Route::post('/submissions/{submission}/request-review', [SubmissionController::class, 'requestReview'])->name('submission.requestReview');
});