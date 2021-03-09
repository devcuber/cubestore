
<?php $__env->startSection('content'); ?>

        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                <img class="card-img-top" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                <h6 class="card-subtitle mb-2 text-muted"><?php echo e($product->category); ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"> Precio: Lps <?php echo e($product->price); ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"> Disponible: <?php echo e($product->available); ?></h6>
                <form action="<?php echo e(route('order.setproduct',$order)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input type="submit" class="btn btn-primary" value="Seleccionar">
                </form>
            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/chooseproduct.blade.php ENDPATH**/ ?>