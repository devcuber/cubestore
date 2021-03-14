<?php $__env->startSection('content'); ?>

<div class="container">
    <button type="button"
            class="btn btn-primary btn-lg rounded-circle fixed-bottom"
            data-toggle="modal"
            data-target="#new_product_modal"
            style="left: 85%; bottom:3%;"
    >
    +
    </button>
    <div class="row">
        <div class="col">
            <h1 class="text-center">Productos</h1>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table">
            <thead>
                <th scope="col" class="col-3">#</th>
                <th scope="col" class="col-3">Imagen</th>
                <th scope="col" class="col-3">Codigo&nbspde&nbspBarra</th>
                <th scope="col" class="col-3">Nombre&nbspdel&nbspProducto</th>
                <th scope="col" class="col-3">Opcion&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th scope="col" class="col-3">Categoría</th>
                <th scope="col" class="col-3">Precio&nbspCosto</th>
                <th scope="col" class="col-3">Precio&nbspVenta</th>
                <th scope="col" class="col-3">Disponible</th>
                <th scope="col" class="col-3">Imagen&nbspURL</th>
                <th scope="col" class="col-3">Obsoleto</th>
                <th scope="col" class="col-3">&nbsp</th>
                <th scope="col" class="col-3">&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form action="<?php echo e(route('product.update',$product)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <td scope="row"> <?php echo e($loop->iteration); ?> </td>
                        <td class="col-3"> <img style="height: 50px; width: 50px" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" ></td>
                        <td class="col-3"> <input type="text"     name="code"          class="form-control"   value="<?php echo e($product->code); ?>" ></td>
                        <td class="col-3"> <input type="text"     name="name"          class="form-control"   value="<?php echo e($product->name); ?>" ></td>
                        <td class="col-3"> <input type="text"     name="option"        class="form-control"   value="<?php echo e($product->option); ?>" ></td>
                        <td class="col-3"> <input type="text"     name="category"      class="form-control"   value="<?php echo e($product->category); ?>"  min="1" ></td>
                        <td class="col-3"> <input type="number"   name="cost"          class="form-control"   value="<?php echo e($product->cost); ?>"      min="1" ></td>
                        <td class="col-3"> <input type="number"   name="price"         class="form-control"   value="<?php echo e($product->price); ?>"     min="1" ></td>
                        <td class="col-3"> <input type="number"   name="available"     class="form-control"   value="<?php echo e($product->available); ?>" min="1" ></td>
                        <td class="col-3"> <input type="text"     name="image"         class="form-control"   value="<?php echo e($product->image); ?>"></td>
                        <td class="col-3"> <input type="checkbox" name="is_deprecated" class="form-control" <?php echo e(($product->is_deprecated)?'checked':''); ?> ></td>
                        <td class="col-3"><input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
                    </form>
                    <td class="col-3">
                        <form action="<?php echo e(route('product.destroy',$product)); ?>" method="POST">
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
    <div class="modal fade" id="new_product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('product.store')); ?>" class="form-inline" method="POST">
                <div class="modal-body">
                    <?php echo method_field('POST'); ?>
                    <?php echo csrf_field(); ?>
                    <input name ="code"             type="text"   placeholder="Código"     value="">
                    <input name ="name"             type="text"   placeholder="Nombre"     value="">
                    <input name ="option"           type="text"   placeholder="Opción"     value="">
                    <input name ="category"         type="text"   placeholder="Categoría"  value="">
                    <input name ="cost"             type="text"   placeholder="Costo"      value="">
                    <input name ="price"            type="text"   placeholder="Precio"     value="">
                    <input name ="available"        type="text"   placeholder="Disponible" value="">
                    <input name ="image"            type="text"   placeholder="URL imáger" value="">
                    <input name ="seller"           type="hidden"            value= "Inframundohn">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Agregar Producto">
                </div>
            </form>
        </div>
        </div>
        </div>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/product/index.blade.php ENDPATH**/ ?>