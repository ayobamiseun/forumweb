<?php $__env->startSection('content'); ?>
<div class="panel bg1 col-12">
    <?php echo $__env->make('modules.profile-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-12 col-sm-9 float-left">
        <h2></h2>
        <dl class="details">
            
        </dl>
    </div>
    <div class="clear"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>