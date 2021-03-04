<?php $__env->startSection('content'); ?>

<br>
    <div class='col-sm-8 mx-auto'>
        <form action="<?php echo e(route('order.store')); ?>" method="POST"> 
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <input type="hidden"  name='client_id'          value ="1">
        <input type="hidden"  name='shipping_info_id'   value ="1">
        <input type="submit"  class="btn btn-primary btn-lg " value ="Nueva Orden">
        </form>
    </div>
<br>

<div class='row'>
    <div class='col-sm-8 mx-auto'>
        <table class="table">
            <thead>
                <th></th>
                <th>Estado</th>
                <th>orden</th>
                <th>cliente</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo $order->GetStatus->html_icon; ?></td>
                    <td><?php echo e($order->GetStatus->code); ?></td>
                    <td><?php echo e($order->GetOrderCode); ?></td>
                    <td><?php echo e($order->client->name); ?></td>
                    <td></td>
                    <td> <a href="<?php echo e(route('order.edit',$order)); ?>" class="btn btn-primary btn-sm" >Ver</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/index.blade.php ENDPATH**/ ?>