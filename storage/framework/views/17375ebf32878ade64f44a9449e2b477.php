<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>My Submissions</h1>
    <?php if($submissions->isEmpty()): ?>
        <p>No submissions yet.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Review Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($submission->assignment->title); ?></td>
                        <td><?php echo e($submission->assignment->course->title); ?></td>
                        <td><?php echo e($submission->grade ?? 'Not graded'); ?></td>
                        <td>
                            <?php if($submission->gradeReview): ?>
                                <?php echo e($submission->gradeReview->status); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($submission->grade !== null): ?>
                                <?php if(!$submission->gradeReview): ?>
                                    <form method="POST" action="<?php echo e(route('submission.requestReview', $submission)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="reason" placeholder="Reason for review" required class="form-control form-control-sm d-inline" style="width:auto;">
                                        <button type="submit" class="btn btn-sm btn-warning">Request Grade Review</button>
                                    </form>
                                <?php else: ?>
                                    <span class="badge bg-info"><?php echo e($submission->gradeReview->status); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-muted">Awaiting grade</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views/student/my-submissions.blade.php ENDPATH**/ ?>