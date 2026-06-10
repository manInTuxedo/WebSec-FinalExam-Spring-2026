<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create Assignment for: <?php echo e($course->title); ?></h1>
    <form method="POST" action="<?php echo e(route('instructor.assignments.store', $course)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Course Material (optional)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload Material</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views\instructor\create-assignment.blade.php ENDPATH**/ ?>