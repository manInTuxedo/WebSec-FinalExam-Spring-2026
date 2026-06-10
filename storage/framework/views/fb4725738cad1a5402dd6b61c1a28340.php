<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>My Courses</h1>
    <?php if($courses->isEmpty()): ?>
        <p>You are not enrolled in any courses.</p>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($course->title); ?></h5>
                            <p class="card-text"><?php echo e(str($course->description)->limit(100)); ?></p>
                            <a href="<?php echo e(route('courses.show', $course)); ?>" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views/student/my-courses.blade.php ENDPATH**/ ?>