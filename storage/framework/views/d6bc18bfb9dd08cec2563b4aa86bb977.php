<?php $__env->startSection('content'); ?>
    <h1>Lietotāju saraksts</h1>

    <?php if(session('success')): ?>
        <div class="flash flash-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('lietotaji.create')); ?>" class="btn">Pievienot jaunu lietotāju</a>

    <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
        <thead>
            <tr>
                <th style="text-align:center;">Vārds</th>
                <th style="text-align:center;">E-pasts</th>
                <th style="text-align:center;">Loma</th>
                <th style="text-align:center;">Darbības</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:center;"><?php echo e($item->vards); ?></td>
                    <td style="text-align:center;"><?php echo e($item->epasts); ?></td>
                    <td style="text-align:center;"><?php echo e($item->loma); ?></td>
                    <td style="text-align:center;">
                        <a href="<?php echo e(route('lietotaji.show', $item->ID)); ?>" class="btn secondary">Detalizēti</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\HERD\pasakumi-main\resources\views/lietotaji/index.blade.php ENDPATH**/ ?>