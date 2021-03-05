<?php $__env->startSection('content'); ?>


        <div class="row">
            <div class="form-group">
                <label for="order_num">orden</label>
                <input readonly type="text" name="order_num" id="name" placeholder="Nombre" value="<?php echo e($order->GetOrderCode); ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="client_id">Cliente</label>
                <input  id  ="client_id"   
                        name="client_id"   
                        type="hidden" 
                        value="<?php echo e($order->client->id); ?>"
                >
                <input  id="client_name" 
                        name="client_name" 
                        type="text"   
                        value="<?php echo e($order->client->name); ?>" 
                        readonly
                >
                <label for="phone">Telefono</label>
                <input  id="phone" 
                        name="phone" 
                        type="text"   
                        value="<?php echo e($order->client->phone); ?>" 
                        readonly
                >
                <a href="<?php echo e(route('chooseclient',$order)); ?>" class="btn btn-sm btn-primary"> Elegir Cliente</a>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="name_holder">Nombre Recibe</label>
                <input  id="name_holder"
                        name="name_holder"
                        type="text"
                        readonly
                        value="<?php echo e($order->shipping_information->name_holder); ?>"
                >
                <label for="phone">Telefono</label>
                <input  id="phone"
                        name="phone"
                        type="text"
                        readonly
                        value="<?php echo e($order->shipping_information->phone); ?>"
                >
                <label for="city">Ciudad</label>
                <input  id="city"
                        name="city"
                        type="text"
                        readonly
                        value="<?php echo e($order->shipping_information->city); ?>"
                >
                <label for="address">Direccion</label>
                <textarea name="address" id="address" cols="30" rows="2" readonly>
                <?php echo e($order->shipping_information->address); ?>

                </textarea>

                <a href="<?php echo e(route('chooseshippinginfo',$order)); ?>" class="btn btn-sm btn-primary"> Elegir Direccion</a>
            </div>
        </div>
        <br>

    <a href="<?php echo e(route('chooseproduct',$order)); ?>" class="btn btn-sm btn-primary">Agregar producto</a>

    <table class="table">
    <thead>
        <th>producto</th>
        <th>cantidad</th>
        <th>precio unitario</th>
        <th>Sub total</th>
        <th>&nbsp</th>
        <th>&nbsp</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $order->order_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <form action="<?php echo e(route('order_line.update',$order_line)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <td> <input name="product_name" type="text"     class="form-control" value="<?php echo e($order_line->product->GetName); ?>"></td>
            <td> <input name="quantity"     type="number"   class="form-control" value="<?php echo e($order_line->quantity); ?>"></td>
            <td> <input name="unit_price"   type="text"     class="form-control" value="<?php echo e($order_line->unit_price); ?>"></td>
            <td> <input name="total"        type="text"     class="form-control" value="<?php echo e($order_line->GetTotal); ?>" readonly></td>
            <td> <input type="submit" class="btn btn-sm btn-primary" value="guardar"></td>
        </form>
            <td>
            <form action="<?php echo e(route('order_line.destroy' , $order_line )); ?>" method="POST">
            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>
                <input type="submit"
                    class="btn btn-sm btn-danger"
                    value="Eliminar"
                    onclick = "return confirm('¿deseas eliminar?');"
                >
            </form></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>

    <div class="row">
    <div class="form-group">
        <label for="OrderTotal">Total a pagar Lps.</label>
        <input  readonly type="text" name="OrderTotal" id="OrderTotal" value="<?php echo e($order->GetTotal); ?>">
    </div>
    </div>

    <br>
    <div class="row">
    <div class="form-group">
        <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="NextStatusCode" value="CAN">
            <input type="submit" class="btn btn-lg btn-danger"  value="Cancelar Orden">
        </form>
        <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="NextStatusCode" value="CON">
            <input type="submit" class="btn btn-lg btn-danger"  value="Contratiempo">
        </form>


        <form action="<?php echo e(route('order.changestatus',$order)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="NextStatusCode" value="<?php echo e($order->GetNextStatus->code); ?>">
            <input type="submit" class="btn btn-lg btn-primary" value="<?php echo e($order->GetNextStatus->description); ?>">
        </form>


    </div>
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/edit.blade.php ENDPATH**/ ?>