<?php $__env->startSection('content'); ?>

<div>Dashboard</div>


<?php if(session('status')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
<?php endif; ?>

You are logged in!


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>