<?php $__env->startSection('content'); ?>

<br>

<h1 class="col-sm-8 mx-auto">Clientes</h1>
<div class="row">
<div class="col-sm-8 mx-auto">
  <form action="<?php echo e(route('client.store')); ?>" class="form-inline" method="POST">
      <?php echo method_field('POST'); ?>
      <?php echo csrf_field(); ?>
      <label for="name"> Nuevo Cliente</label>
      <input name ="name"  type="text" placeholder="Nombre" value="" >
      <input name ="phone" type="text" placeholder="teléfono" value="">

      <input type="submit" class="btn btn-primary btn-sm " value="Agregar Cliente">
  </form>
</div>
</div>


<div class='row'>
    <div class='col-sm-8 mx-auto'>
        <table class="table">
            <thead>
                <th>&nbsp</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td>
                <form action="<?php echo e(route('order.setclient',$order)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
                    <td> <input type="submit" class="btn btn-primary btn-sm" value = 'Seleccionar'></td>
                </form>
                </td>

                <form action="<?php echo e(route('client.update',$client)); ?>" method='POST'>
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                    <td> <input type="text"   name="name"  value="<?php echo e($client->name); ?>"></td>
                    <td> <input type="text"   name="phone" value="<?php echo e($client->phone); ?>"></td>
                    <td> <input type="submit" class="btn btn-primary btn-sm" value = 'Guardar'></td>
                </form>
                <td><a href="<?php echo e(route('client.edit',$client)); ?>" class="btn btn-primary btn-sm">Info. Envios</a></td>
                <td>
                <form action="<?php echo e(route('client.destroy',$client)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <input  type   ="submit" 
                            class  ="btn btn-danger btn-sm" 
                            value  = 'Eliminar' 
                            onclick = "return confirm('¿deseas eliminar?');"
                    >
                </form>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/order/chooseclient.blade.php ENDPATH**/ ?>