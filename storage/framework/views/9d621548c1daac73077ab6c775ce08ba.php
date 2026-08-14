<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $category = [
        [
            'id' => 1,
            'name' => "PHP"
        ],
        [
            'id' => 2,
            'name' => "Laravel"
        ],
        [
            'id' => 3,
            'name' => "RectJS"
        ],
        [
            'id' => 4,
            'name' => "NextJS"
        ],

    ]

    ?>

    <h2>Category List</h2>

    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($data['id']); ?> : <?php echo e($data['name']); ?></h3>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/categories/index.blade.php ENDPATH**/ ?>