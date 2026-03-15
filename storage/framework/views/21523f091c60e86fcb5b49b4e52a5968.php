<?php $__env->startSection('content'); ?>
    <h1>Rediģēt telpu</h1>

    <?php if($errors->any()): ?>
        <div class="flash flash-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('telpas.update', $data->ID)); ?>" method="POST" style="max-width:500px;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Nosaukums:</label>
            <input type="text" name="nosaukums" value="<?php echo e(old('nosaukums', $data->nosaukums)); ?>" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Ietilpība:</label>
            <input type="number" name="ietilpiba" value="<?php echo e(old('ietilpiba', $data->ietilpiba)); ?>" min="1" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="<?php echo e(route('telpas.index')); ?>" class="btn secondary">Atcelt</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\HERD\pasakumi-main\resources\views/telpas/edit.blade.php ENDPATH**/ ?>