

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Assign Instructor / Course Admin Roles</h1>
    <table class="table">
        <thead><tr><th>User</th><th>Email</th><th>Current Role</th><th>Assign New Role</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->roles->pluck('name')->implode(', ') ?: 'None'); ?></td>
                <td>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route('admin.assign', [$user, $role->name])); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e($role->name); ?></button>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WebSecFinalExam\resources\views/admin/assign-roles.blade.php ENDPATH**/ ?>