<?php $__env->startSection('content'); ?>
    <h1>Rezerves kopiju saraksts</h1>

    <?php if(session('success')): ?>
        <div class="flash flash-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('rezerveskopijas.create')); ?>" class="btn">Pievienot jaunu ierakstu</a>

    <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
        <thead>
            <tr>
                <th style="text-align:center;">Fails</th>
                <th style="text-align:center;">Izveides datums</th>
                <th style="text-align:center;">Darbības</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:center;"><?php echo e($item->fails); ?></td>
                    <td style="text-align:center;"><?php echo e($item->izveides_datums); ?></td>
                    <td style="text-align:center;">
                        <a href="<?php echo e(route('rezerveskopijas.show', $item->ID)); ?>" class="btn secondary">Detalizēti</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\HERD\pasakumi-main\resources\views/rezerveskopijas/index.blade.php ENDPATH**/ ?>