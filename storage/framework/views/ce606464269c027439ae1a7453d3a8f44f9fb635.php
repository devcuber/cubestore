
<?php $__env->startSection('content'); ?>

        <div class='container'>
            <div class="row">
                <div class="col">
                    <h1 class="text-center"> Catálogo </h1>
                </div>
            </div>
        <div class="row justify-content-around">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mt-2 mb-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                <img class="card-img-top" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                <h6 class="card-subtitle mb-2 text-muted"><?php echo e($product->category); ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"> Precio: Lps <?php echo e($product->price); ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"> Envío: Lps 70 - Lps 100</h6>

                <?php if(  isset($order)): ?>
                <h6 class="card-subtitle mb-2 text-muted"> Disponible: <?php echo e($product->available); ?></h6>
                <form action="<?php echo e(route('order.setproduct',$order)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input type="submit" class="btn btn-primary" value="Seleccionar">
                </form>
                <?php else: ?>
                    <h6 class="card-subtitle mb-2 text-muted"> 
                    <?php if($product->available <= 0): ?>
                        Agotado
                    <?php elseif($product->available < 5): ?>
                        Solo quedan <?php echo e($product->available); ?>

                    <?php else: ?>
                        Disponible
                    <?php endif; ?>
                    </h6>
                    <a
                    href="<?php echo e($product->GetWhatsappURL); ?>"
                    target="_blank"
                    rel="noopener"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg> Escríbenos
                    </a>
                <?php endif; ?>


            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cubestore\resources\views/product/catalogue.blade.php ENDPATH**/ ?>