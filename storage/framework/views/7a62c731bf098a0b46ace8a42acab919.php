<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Submit Assignment: <?php echo e($assignment->title); ?></h1>
    <p><?php echo e($assignment->description); ?></p>
    <form method="POST" action="<?php echo e(route('student.submit', $assignment)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="file" class="form-label">Submission File (pdf, doc, docx, zip)</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments (optional)</label>
            <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Assignment</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\student\submit-assignment.blade.php ENDPATH**/ ?>