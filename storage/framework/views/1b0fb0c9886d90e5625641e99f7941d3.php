<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h2>Category List</h2>
    <a href="<?php echo e(route('categories.create')); ?>">+Create</a>
    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($data['id']); ?> : <?php echo e($data['name']); ?></h3>
        <form action="<?php echo e(route('categories.delete', [$data->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Delete</button>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/category/index.blade.php ENDPATH**/ ?>