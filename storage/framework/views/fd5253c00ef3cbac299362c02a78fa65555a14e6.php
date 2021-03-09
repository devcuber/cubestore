<?php $__env->startSection('content'); ?>
<br>
<div class='row'>
    <h1> <?php echo e($client->name . ' ' . $client->phone); ?> </h1>
</div>
<br>

<h1 class="col-sm-8 mx-auto">Informacion de entrega</h1>
<div class="row">
<div class="col-sm-10 mx-auto">
  <form action="<?php echo e(route('shipping_information.store')); ?>" class="form-inline" method="POST">
      <?php echo method_field('POST'); ?>
      <?php echo csrf_field(); ?>
      <label for="name_holder"> Nuevo informacion de entrega</label>
      <input name ="client_id"      type="hidden"   placeholder="Nombre" value="<?php echo e($client->id); ?>">
      <input name ="name_holder"    type="text"     placeholder="Nombre" value="" >
      <input name ="phone"          type="text"     placeholder="teléfono" value="">
      <input name ="city"           type="text"     placeholder="ciudad" value="">
      <input name ="address"        type="text"     placeholder="dirección" value="">

      <input type="submit" class="btn btn-primary btn-sm " value="Agregar Información">
  </form>
</div>
</div>

        <table class="table">
        <thead>
            <th>&nbsp</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>ciudad</th>
            <th>direccion</th>
            <th>principal</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $client->Shipping_Informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shipping_Information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
                <td>
                <form action="<?php echo e(route('order.setshippinginfo',$order)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="text" name="ShippingInfoid" value="<?php echo e($Shipping_Information->id); ?>">
                    <td> <input type="submit" class="btn btn-primary btn-sm" value = 'Seleccionar'></td>
                </form>
                </td>
            <form action="<?php echo e(route('shipping_information.update',$Shipping_Information)); ?>" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <td> <input name="name_holder" type="text" class="form-control" value="<?php echo e($Shipping_Information->name_holder); ?>"></td>
                <td> <input name="phone"type="text" class="form-control" value="<?php echo e($Shipping_Information->phone); ?>"></td>
                <td> <input name="city"type="text" class="form-control" value="<?php echo e($Shipping_Information->city); ?>"></td>
                <td> <textarea name="address" id="" cols="50" rows="3" class="form-control"><?php echo e($Shipping_Information->address); ?></textarea></td>
                <td> <input name="is_default"type="checkbox" class="form-check-input" <?php echo e(($Shipping_Information->is_default)?'checked':''); ?> ></td>
                <td> <input type="submit" class="btn btn-sm btn-primary" value="guardar"></td>
            </form>
                <td>
                <form action="<?php echo e(route('shipping_information.destroy' , $Shipping_Information )); ?>" method="POST">
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
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/chooseshippinginfo.blade.php ENDPATH**/ ?>