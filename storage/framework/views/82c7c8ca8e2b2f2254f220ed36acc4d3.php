<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <h4>Welcome, <?php echo e(Auth::user()->name); ?>!</h4>
                    <p>Role: <?php echo e(Auth::user()->roles->pluck('name')->implode(', ')); ?></p>
                    <hr>

                    <div class="row">
                        <?php if(auth()->user()->hasRole('student')): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>My Courses</h5>
                                        <a href="<?php echo e(route('student.my-courses')); ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Browse Courses</h5>
                                        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-primary">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>My Submissions</h5>
                                        <a href="<?php echo e(route('student.my-submissions')); ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->user()->hasRole('instructor')): ?>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Courses</h5>
                                        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Create Course</h5>
                                        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-success">Create</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Grade Reviews</h5>
                                        <a href="<?php echo e(route('instructor.grade-reviews')); ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->user()->hasRole('course_admin')): ?>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Assign Roles</h5>
                                        <a href="<?php echo e(route('admin.assign-roles')); ?>" class="btn btn-primary">Manage</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Create Course</h5>
                                        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-success">Create</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>Grade Reviews</h5>
                                        <a href="<?php echo e(route('instructor.grade-reviews')); ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views/home.blade.php ENDPATH**/ ?>