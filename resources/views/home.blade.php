@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p>Role: {{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
                    <hr>

                    <div class="row">
                        @if(auth()->user()->hasRole('student'))
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>My Courses</h5>
                                        <a href="{{ route('student.my-courses') }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Browse Courses</h5>
                                        <a href="{{ route('courses.index') }}" class="btn btn-primary">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>My Submissions</h5>
                                        <a href="{{ route('student.my-submissions') }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(auth()->user()->hasRole('instructor'))
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Courses</h5>
                                        <a href="{{ route('courses.index') }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Create Course</h5>
                                        <a href="{{ route('courses.create') }}" class="btn btn-success">Create</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Grade Reviews</h5>
                                        <a href="{{ route('instructor.grade-reviews') }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(auth()->user()->hasRole('course_admin'))
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Assign Roles</h5>
                                        <a href="{{ route('admin.assign-roles') }}" class="btn btn-primary">Manage</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Create Course</h5>
                                        <a href="{{ route('courses.create') }}" class="btn btn-success">Create</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Grade Reviews</h5>
                                        <a href="{{ route('instructor.grade-reviews') }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
