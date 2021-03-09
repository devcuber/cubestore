<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row">
        <div class="col">

            <div class="row">
                <div class="col col-12">

                    <table>
                        <tr>
                            <td>Order:</td>
                            <td><strong><?php echo e($order->GetOrderCode); ?></strong></td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>Cliente:</td>
                            <td><strong> <?php echo e($order->client->name); ?> </strong></td>
                            <td><a href="<?php echo e(route('chooseclient',$order)); ?>" class="btn btn-sm btn-outline-primary">✏️</a></td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td><strong> <?php echo e($order->client->phone); ?></td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td>&nbsp</td>
                            <td><a  href="<?php echo e(route('chooseshippinginfo',$order)); ?>" class="btn btn-sm btn-outline-primary">✏️</a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row pt-2" >
                <div class="col">
<textarea name="address" id="address" cols="40" rows="5" readonly>
Recibe: <?php echo e($order->shipping_information->name_holder); ?> | <?php echo e($order->shipping_information->phone); ?>

Ciudad: <?php echo e($order->shipping_information->city); ?>

<?php echo e($order->shipping_information->address); ?>

</textarea>
                </div>
            </div>
        </div>
        <div class="col">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th scope="col">Imagen</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio&nbspVenta</th>
                        <th scope="col">Total</th>
                        <th scope="col">&nbsp</th>
                        <th scope="col"> <a href="<?php echo e(route('chooseproduct',$order)); ?>" class="btn btn-sm btn-primary rounded-circle">+</a></th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $order->order_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <td> <img width="100%" src="<?php echo e($order_line->product->image); ?>" alt="<?php echo e($order_line->product->name); ?>"> </td>
                        <form action="<?php echo e(route('order_line.update',$order_line)); ?>" method="POST">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <td> <?php echo e($order_line->product->GetName); ?></td>
                            <td> <input name="quantity"     type="number"   class="form-control" value="<?php echo e($order_line->quantity); ?>"></td>
                            <td> <input name="unit_price"   type="text"     class="form-control" value="<?php echo e($order_line->unit_price); ?>"></td>
                            <td> <?php echo e($order_line->GetTotal); ?> </td>
                            <td> <input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
                        </form>
                            <td>
                                <form action="<?php echo e(route('order_line.destroy' , $order_line->id )); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                    <input type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        value="🗑️"
                                        onclick = "return confirm('¿deseas eliminar?');"
                                    >
                                </form>
                            </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <strong>TOTAL</strong></th>
                        <td>&nbsp</th>
                        <td>&nbsp</th>
                        <td><?php echo e($order->GetTotal); ?></th>
                        <td>&nbsp</th>
                        <td>&nbsp</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="NextStatusCode" value="CAN">
                <input type="submit" class="btn btn-sm btn-outline-danger"  value="Cancelar Orden">
            </form>
        </div>
        <div class="col">
            <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="NextStatusCode" value="CON">
                <input type="submit" class="btn btn-sm btn-outline-danger"  value="Contratiempo">
            </form>
        </div>
        <div class="col">
            <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="NextStatusCode" value="<?php echo e($order->GetNextStatus->code); ?>">
                <input type="submit" class="btn btn-sm btn-primary" value="<?php echo e($order->GetNextStatus->description); ?>">
            </form>
        </div>
    </div>




    </div>
    </div>

</div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/edit.blade.php ENDPATH**/ ?>