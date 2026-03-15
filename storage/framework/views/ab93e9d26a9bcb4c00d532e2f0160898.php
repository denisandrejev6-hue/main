<?php $__env->startSection('content'); ?>
    <h1>Telpas detaļas</h1>

    <p><strong>ID:</strong> <?php echo e($data->ID); ?></p>
    <p><strong>Nosaukums:</strong> <?php echo e($data->nosaukums); ?></p>
    <p><strong>Ietilpība:</strong> <?php echo e($data->ietilpiba); ?></p>

    <div style="display:flex; gap:12px; margin-top:24px;">
        <a href="<?php echo e(route('telpas.edit', $data->ID)); ?>" class="btn">Rediģēt</a>
        <form action="<?php echo e(route('telpas.destroy', $data->ID)); ?>" method="POST" onsubmit="return confirm('Vai tiešām dzēst?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn secondary">Dzēst</button>
        </form>
        <a href="<?php echo e(route('telpas.index')); ?>" class="btn secondary">Atpakaļ</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\HERD\pasakumi-main\resources\views/telpas/details.blade.php ENDPATH**/ ?>