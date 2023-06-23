
<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card">
                    <a href="detail/<?php echo e($item['id']); ?>">
                        <img src="<?php echo e(url($item['product_image'])); ?>" alt="no image">
                        <h4><?php echo e($item['product_name']); ?></h4>
                        <p><b>Discount:</b><?php echo e($item['product_discount']); ?>%</p>
                        <p><b>Price:</b><?php echo e($item['product_price']); ?>/-</p>
                        <p><b>Discount Price:</b><?php echo e($item['product_discountprice']); ?>/-</p>
                    </a>
                    <a href="/buynow" class="btn btn-success">Buy now</a>
                    <form action="/add_to_cart" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value=<?php echo e($item['id']); ?>>
                        <button class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/shop.blade.php ENDPATH**/ ?>