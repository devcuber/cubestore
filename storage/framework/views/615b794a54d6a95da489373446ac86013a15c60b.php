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
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Codigo&nbspde&nbspBarra</th>
                <th scope="col">Nombre&nbspdel&nbspProducto</th>
                <th scope="col">Opcion&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio&nbspCosto</th>
                <th scope="col">Precio&nbspVenta</th>
                <th scope="col">Disponible</th>
                <th scope="col">Imagen&nbspURL</th>
                <th scope="col">Obsoleto</th>
                <th scope="col">&nbsp</th>
                <th scope="col">&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form action="<?php echo e(route('product.update',$product)); ?>" class="form-inline" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <td scope="row"> <?php echo e($loop->iteration); ?> </td>
                        <td> <img style="height: 50px; width: 50px" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" ></td>
                        <td> <input type="text"     name="code"class="form-control-plaintext"   value="<?php echo e($product->code); ?>" ></td>
                        <td> <input type="text"     name="name"class="form-control-plaintext"   value="<?php echo e($product->name); ?>" ></td>
                        <td> <input type="text"     name="option"        class="form-control-plaintext"   value="<?php echo e($product->option); ?>" ></td>
                        <td> <input type="text"     name="category"      class="form-control-plaintext"   value="<?php echo e($product->category); ?>"  min="1" ></td>
                        <td> <input type="number"   name="cost"class="form-control-plaintext"   value="<?php echo e($product->cost); ?>"      min="1" ></td>
                        <td> <input type="number"   name="price"         class="form-control-plaintext"   value="<?php echo e($product->price); ?>"     min="1" ></td>
                        <td> <input type="number"   name="available"     class="form-control-plaintext"   value="<?php echo e($product->available); ?>" min="1" ></td>
                        <td> <input type="text"     name="image"         class="form-control-plaintext"   value="<?php echo e($product->image); ?>"></td>
                        <td> <input type="checkbox" name="is_deprecated" class="form-control-plaintext" <?php echo e(($product->is_deprecated)?'checked':''); ?> ></td>
                        <td><input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
                    </form>
                    <td>
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
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('product.store')); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                        <label for  ="name">    Nombre </label>
                        <input name ="name"     class="form-control" type="text"   placeholder="Nombre"     value="">
                        <label for  ="name">    Opcion </label>
                        <input name ="option"   class="form-control" type="text"   placeholder="Opción"     value="">
                        <label for  ="code">    Codigo de barra </label>
                        <input name ="code"     class="form-control" type="text"   placeholder="Código"     value="">
                        <label for  ="name">    Categoria </label>
                        <input name ="category" class="form-control" type="text"   placeholder="Categoría"  value="">
                        <label for  ="name">    Costo </label>
                        <input name ="cost"     class="form-control" type="number"   placeholder="Costo"      value="0">
                        <label for  ="name">    Precio de venta </label>
                        <input name ="price"    class="form-control" type="number"   placeholder="Precio"     value="0">
                        <label for  ="name">    Cantidad Disponible  </label>
                        <input name ="available"class="form-control" type="number"   placeholder="Disponible" value="0">
                        <label for  ="name">    URL de imágen </label>
                        <input name ="image"    class="form-control" type="text"   placeholder="URL imágen" value="">
                        <input name ="seller"   class="form-control" type="hidden"            value= "Inframundohn">
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
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/product/index.blade.php ENDPATH**/ ?>