<?php $__env->startSection('content'); ?>

<h1  class="col-sm-6 mx-auto">Productos</h1>
<div class="row">
<div class="col-sm-6 mx-auto">
    <form action="<?php echo e(route('product.store')); ?>" class="form-inline" method="POST">
    <?php echo method_field('POST'); ?>
    <?php echo csrf_field(); ?>
    <input name ="code"             type="text"   placeholder="Código"     value="">
    <input name ="name"             type="text"   placeholder="Nombre"     value="">
    <input name ="option"           type="text"   placeholder="Opción"     value="">
    <input name ="category"         type="text"   placeholder="Categoría"  value="">
    <input name ="cost"             type="text"   placeholder="Costo"      value="">
    <input name ="price"            type="text"   placeholder="Precio"     value="">
    <input name ="available"        type="text"   placeholder="Disponible" value="">
    <input name ="seller"           type="hidden"            value= "Inframundohn">
    <input type="submit" class="btn btn-primary btn-sm " value="Agregar Producto">
    </form>
</div>
</div>

<div class='row'>
    <div class='col-sm-12 mx-auto'>
        <table class="table">
            <thead>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Opcion</th>
                <th>Categoría</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Imágen</th>
                <th>Obsoleto</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form   action  ="<?php echo e(route('product.update',$product)); ?>"
                            method  ="POST"
                            enctype = "multipart/form-data"
                    >
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <td> <img style="height: 50px; width: 50px" src="<?php echo e($product->Get_Image); ?>" alt="<?php echo e($product->name); ?>" ></td>
                        <td> <input type="text"     name="code"          class="form-control"   value="<?php echo e($product->code); ?>" ></td>
                        <td> <input type="text"     name="name"          class="form-control"   value="<?php echo e($product->name); ?>" ></td>
                        <td> <input type="text"     name="option"        class="form-control"   value="<?php echo e($product->option); ?>" ></td>
                        <td> <input type="text"     name="category"      class="form-control"   value="<?php echo e($product->category); ?>" ></td>
                        <td> <input type="number"   name="cost"          class="form-control"   value="<?php echo e($product->cost); ?>" ></td>
                        <td> <input type="number"   name="price"         class="form-control"   value="<?php echo e($product->price); ?>" ></td>
                        <td> <input type="number"   name="available"     class="form-control"   value="<?php echo e($product->available); ?>" ></td>
                        <td> <input type="file"     name="file"          class="form-control"   ></td>
                        <td> <input type="checkbox" name="is_deprecated" class="form-check-input" <?php echo e(($product->is_deprecated)?'checked':''); ?> ></td>
                        <td><input type="submit" class="btn btn-sm btn-primary" value="Guardar"></td>
                    </form>
                    <td>
                        <form action="<?php echo e(route('product.destroy',$product)); ?>" method="POST">
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

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/Product/index.blade.php ENDPATH**/ ?>