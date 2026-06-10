<?php $__env->startSection('content'); ?>
<div class="container">
    <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary mb-3">&larr; Back to Dashboard</a>
    <h1>Grade Review Requests</h1>
    <?php if($reviews->isEmpty()): ?>
        <p>No grade review requests.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->submission->student->name); ?></td>
                        <td><?php echo e($review->submission->assignment->title); ?></td>
                        <td><?php echo e($review->submission->assignment->course->title); ?></td>
                        <td><?php echo e($review->reason); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($review->status === 'completed' ? 'success' : 'warning'); ?>">
                                <?php echo e($review->status); ?>

                            </span>
                        </td>
                        <td>
                            <?php if($review->status === 'pending'): ?>
                                <form method="POST" action="<?php echo e(route('instructor.review.complete', $review)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-success">Mark Completed</button>
                                </form>
                            <?php else: ?>
                                <span class="text-muted">Completed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\instructor\grade-reviews.blade.php ENDPATH**/ ?>