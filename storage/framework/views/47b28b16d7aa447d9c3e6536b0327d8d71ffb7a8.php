<?php $__env->startSection('content'); ?>

<div class="container">
    <form action="<?php echo e(route('order.store')); ?>" method="POST"> 
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <input type="hidden"  name='client_id'          value ="1">
    <input type="hidden"  name='shipping_info_id'   value ="1">
    <input  type="submit"  
            class="btn btn-primary btn-lg rounded-circle fixed-bottom"
            value ="+"
            style="left: 85%; bottom:3%;">
    </form>

    <div class="row justify-content-around pb-4">
        <div class="col">
            <h2 class="text-center">Ordenes</h2>
        </div>
    </div>


    <div class='table-responsive'>
        <table class="table">
            <thead>
                <th scope="col">&nbsp</th>
                <th scope="col">Estado</th>
                <th scope="col">Orden</th>
                <th scope="col">Cliente</th>
                <th scope="col">&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo $order->GetStatus->html_icon; ?></td>
                    <td><?php echo e($order->GetStatus->code); ?></td>
                    <td><?php echo e($order->GetOrderCode); ?></td>
                    <td><?php echo e($order->client->name); ?></td>
                    <td> <a href="<?php echo e(route('order.edit',$order)); ?>" class="btn btn-outline-primary btn-sm" >✏️</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/index.blade.php ENDPATH**/ ?>