<?php $__env->startSection('content'); ?>
    <h1>Telpu saraksts</h1>

    <?php if(session('success')): ?>
        <div class="flash flash-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(auth()->user()->loma !== 'Lietotajs'): ?>
        <a href="<?php echo e(route('telpas.create')); ?>" class="btn">Pievienot jaunu telpu</a>
    <?php endif; ?>

    <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
        <thead>
            <tr>
                <th style="text-align:center;">Nosaukums</th>
                <th style="text-align:center;">Ietilpība</th>
                <?php if(auth()->user()->loma !== 'Lietotajs'): ?>
                    <th style="text-align:center;">Darbības</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:center;"><?php echo e($item->nosaukums); ?></td>
                    <td style="text-align:center;"><?php echo e($item->ietilpiba); ?></td>
                    <?php if(auth()->user()->loma !== 'Lietotajs'): ?>
                        <td style="text-align:center;">
                            <a href="<?php echo e(route('telpas.show', $item->ID)); ?>" class="btn secondary">Detalizēti</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\HERD\pasakumi-main\resources\views/telpas/index.blade.php ENDPATH**/ ?>