<?php $__env->startSection('content'); ?>

<div class="container">

    <button type="button"
    class="btn btn-primary btn-lg rounded-circle fixed-bottom"
    data-toggle="modal"
    data-target="#new_client_modal"
    style="left: 85%; bottom:3%;"
    >
    +
    </button>

    <div class="row">
        <div class="col">
            <h1 class="text-center">Clientes</h1>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table">
            <thead>
                <?php if(isset($order)): ?>
                <th>Elegir</th>
                <?php endif; ?>
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <?php if(isset($order)): ?>
                <td>
                    <form action="<?php echo e(route('order.setclient',$order)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
                        <input type="submit" class="btn btn-primary btn-sm" value = 'Seleccionar'>
                    </form>
                </td>
                <?php endif; ?>
                <form action="<?php echo e(route('client.update',$client)); ?>" class="form-inline" method='POST'>
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                    <td scope="row"> <?php echo e($loop->iteration); ?> </td>
                    <td> <input type="text"   name="name"  class="form-control-plaintext" value="<?php echo e($client->name); ?>"></td>
                    <td> <input type="text"   name="phone" class="form-control-plaintext" value="<?php echo e($client->phone); ?>"></td>
                    <td><a href="<?php echo e(route('client.edit',$client)); ?>" class="btn btn-outline-primary btn-sm">Info. Envios</a></td>
                    <td> <input type="submit" class="btn btn-outline-primary btn-sm" value = '💾'></td>
                </form>
                <td>
                <form action="<?php echo e(route('client.destroy',$client)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <input  type   ="submit" 
                            class  ="btn btn-outline-danger btn-sm" 
                            value  = '🗑️' 
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

    <!-- Modal -->
<div class="modal fade" id="new_client_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="<?php echo e(route('client.store')); ?>" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <?php echo method_field('POST'); ?>
                <?php echo csrf_field(); ?>
                <label for="name">  Nombre </label>
                <input id="name"    name ="name"  type="text" placeholder="Nombre"   class="form-control" value="" >
                <label for="phone"> Teléfono </label>
                <input id ="phone"  name ="phone" type="text" placeholder="teléfono" class="form-control" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
</div>
</div>
</div>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/client/index.blade.php ENDPATH**/ ?>