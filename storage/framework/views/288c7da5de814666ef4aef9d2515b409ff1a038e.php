
<?php $__env->startSection('main-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <img class="detail-img" src="<?php echo e(url($products['product_image'])); ?>" alt="">
        </div>
        <div class="col-sm-6">
        <h2><?php echo e($products['product_name']); ?></h2>
        <h4><b>Price : </b><?php echo e($products['product_price']); ?>/-</h3>
        <h3><b>Discount Price : </b><?php echo e($products['product_discountprice']); ?>/-</h3>
        <h4><b>Details: </b><?php echo e($products['product_description']); ?>.</h4>
        <h4><b>catagory: </b><?php echo e($products['catagory']); ?></h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value=<?php echo e($products['id']); ?>>
        <button class="btn btn-primary">Add to Cart</button>
        </form>
        <br><br>
        <button class="btn btn-success">Buy Now</button>
        <br><br>
     </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/detail.blade.php ENDPATH**/ ?>