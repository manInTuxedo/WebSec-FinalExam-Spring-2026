<?php $__env->startSection('content'); ?>
<div class="container">
    <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary mb-3">&larr; Back to Dashboard</a>
    <h1>Available Courses</h1>
    <?php if(auth()->user()->hasRole('instructor') || auth()->user()->hasRole('course_admin')): ?>
        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-success mb-3">Create Course</a>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <div class="row">
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($course->title); ?></h5>
                        <p class="card-text"><?php echo e(str($course->description)->limit(100)); ?></p>
                        <p class="text-muted">Instructor: <?php echo e($course->instructor->name); ?></p>
                        <a href="<?php echo e(route('courses.show', $course)); ?>" class="btn btn-primary">View Details</a>
                        <?php if(auth()->user()->hasRole('student')): ?>
                            <form method="POST" action="<?php echo e(route('student.enroll', $course)); ?>" style="display:inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success">Enroll</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\courses\index.blade.php ENDPATH**/ ?>