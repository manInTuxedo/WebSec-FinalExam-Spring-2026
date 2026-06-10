<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($course->title); ?></h1>
    <p><?php echo e($course->description); ?></p>
    <p class="text-muted">Instructor: <?php echo e($course->instructor->name); ?></p>

    <h3 class="mt-4">Assignments / Materials</h3>
    <?php if($course->assignments->isEmpty()): ?>
        <p>No assignments yet.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $course->assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($assignment->title); ?></td>
                        <td><?php echo e(str($assignment->description)->limit(80)); ?></td>
                        <td>
                            <?php if($assignment->file_path): ?>
                                <a href="<?php echo e(asset('storage/' . $assignment->file_path)); ?>" class="btn btn-sm btn-info" target="_blank">Download</a>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole('student') && auth()->user()->enrollments()->where('course_id', $course->id)->exists()): ?>
                                <a href="<?php echo e(route('student.submit-form', $assignment)); ?>" class="btn btn-sm btn-primary">Submit</a>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole('instructor') || auth()->user()->hasRole('course_admin')): ?>
                                <a href="<?php echo e(route('instructor.assignments.create', $course)); ?>" class="btn btn-sm btn-secondary">Add Material</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('student') && !auth()->user()->enrollments()->where('course_id', $course->id)->exists()): ?>
        <form method="POST" action="<?php echo e(route('student.enroll', $course)); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-success">Enroll in Course</button>
        </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\courses\show.blade.php ENDPATH**/ ?>