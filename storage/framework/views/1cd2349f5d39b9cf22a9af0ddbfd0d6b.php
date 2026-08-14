<!DOCTYPE html>
<html>
<head>
    <title>Batches</title>
</head>
<body>

<h1>Batch List</h1>

<?php if(session('success')): ?>
    <div>
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<br>

<a href="<?php echo e(route('batches.create')); ?>">
    Create New Batch
</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($batch->id); ?></td>
                <td><?php echo e($batch->name); ?></td>
                <td><?php echo e($batch->description); ?></td>

                <td>
                    <form
                        action="<?php echo e(route('batches.destroy', $batch->id)); ?>"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this batch?')"
                    >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/batches/index.blade.php ENDPATH**/ ?>