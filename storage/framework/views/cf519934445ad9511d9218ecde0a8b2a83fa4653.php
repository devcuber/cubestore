<?php $__env->startSection('content'); ?>

<div class="container">

    <button type="button"
    class="btn btn-primary btn-lg rounded-circle fixed-bottom"
    data-toggle="modal"
    data-target="#new_info_modal"
    style="left: 85%; bottom:3%;"
    >
    +
    </button>

    <div class='row'>
        <div class="col">
            <h1 class="text-center"> <?php echo e($client->name); ?></h1>
            <h2> Lista de direcciones:</h2>
        </div>
    </div>

    <div class="table-responsive">
    <table class="table">
    <thead>
        <?php if(isset($order)): ?>
        <th>Elegir</th>
        <?php endif; ?>
        <th scope="col">#               </th>
        <th scope="col" >Persona        </th>
        <th scope="col" >Telefono       </th>
        <th scope="col" >Ciudad         </th>
        <th scope="col" >Dirección      </th>
        <th scope="col" >Principal      </th>
        <th scope="col" >&nbsp          </th>
        <th scope="col" >&nbsp          </th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $client->Shipping_Informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shipping_Information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <?php if(isset($order)): ?>
        <td>
        <form action="<?php echo e(route('order.setshippinginfo',$order)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="ShippingInfoid" value="<?php echo e($Shipping_Information->id); ?>">
            <input type="submit" class="btn btn-primary btn-sm" value = 'Seleccionar'>
        </form>
        </td>
        <?php endif; ?>

        <form action="<?php echo e(route('shipping_information.update',$Shipping_Information)); ?>" class="form-inline" method="POST">
        <div class="form-group">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <td scope="row"> <?php echo e($loop->iteration); ?> </td>
            <td> <input         name="name_holder"  type="text" class="form-control-plaintext" value="<?php echo e($Shipping_Information->name_holder); ?>" ></td>
            <td> <input         name="phone"        type="text" class="form-control-plaintext" value="<?php echo e($Shipping_Information->phone); ?>"       ></td>
            <td> <input         name="city"         type="text" class="form-control-plaintext" value="<?php echo e($Shipping_Information->city); ?>"        ></td>
            <td> <textarea name="address" cols="20" rows="3" class="form-control-plaintext"><?php echo e($Shipping_Information->address); ?></textarea></td>
            <td> <input name="is_default"type="checkbox" class="form-control-plaintext" <?php echo e(($Shipping_Information->is_default)?'checked':''); ?> ></td>
            <td> <input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
        </div>
        </form>
            <td>
                <form action="<?php echo e(route('shipping_information.destroy' , $Shipping_Information )); ?>" method="POST">
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
    </tbody>
    </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

    <!-- Modal -->
    <div class="modal fade" id="new_info_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('shipping_information.store')); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                        <input id="client_id"       name ="client_id"      type="hidden"   placeholder="Nombre"     class="form-control" value="<?php echo e($client->id); ?>">
                        <label for="name_holder">   Nombre </label>
                        <input id ="name_holder"    name ="name_holder"    type="text"     placeholder="Nombre"     class="form-control" value="" >
                        <label for="phone">         Teléfono </label>
                        <input id ="phone"          name ="phone"          type="text"     placeholder="teléfono"   class="form-control" value="">
                        <label for="city">          Ciudad </label>
                        <input id="city"            name ="city"           type="text"     placeholder="ciudad"     class="form-control" value="">
                        <label for="address">       Dirección </label>
                        <textarea id="address"      name="address"         cols="20"       rows="3"                 class="form-control"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
        </div>
        </div>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/client/edit.blade.php ENDPATH**/ ?>