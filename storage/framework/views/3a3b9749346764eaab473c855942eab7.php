<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
            <h2>Category Create</h2>

            <form action="<?php echo e(route('categories.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Category Name" />
                <button type="submit">+Create</button>
            </form>
    </div>

</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/category/create.blade.php ENDPATH**/ ?>