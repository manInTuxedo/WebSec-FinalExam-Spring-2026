<?php if($submission->grade !== null): ?>
    <?php if(!$submission->gradeReview): ?>
        <form method="POST" action="<?php echo e(route('submission.requestReview', $submission)); ?>">
            <?php echo csrf_field(); ?>
            <textarea name="reason" placeholder="Reason for review" required></textarea>
            <button type="submit">Request Grade Review</button>
        </form>
    <?php else: ?>
        Status: <?php echo e($submission->gradeReview->status); ?>

    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\layouts\my-submissions.blade.php ENDPATH**/ ?>