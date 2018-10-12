<?php $__env->startSection('content'); ?>


<?php echo $__env->make('layouts.seite_top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<form method="POST" action="<?php echo e(url('/aufbau/seiten/neu')); ?>">
	<?php echo csrf_field(); ?>
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control<?php echo e($errors->has('titel') ? ' is-invalid' : ''); ?>" name="titel" value="<?php echo e(old('titel')); ?>" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<?php echo e(__('Seite hinzufügen')); ?>

			</button>
		</div>
		<?php if($errors->has('titel')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('titel')); ?></strong>
			</span>
		<?php endif; ?>
	</div>      
</form>

<br>
<div class="list-group">
	<?php $__currentLoopData = $projekt->seiten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="<?php echo e(url('/aufbau/seite/'.$seite->id)); ?>" class="list-group-item list-group-item-action list-group-item-light">
			<i class="far fa-file fa-3x"></i><?php echo e($seite->titel); ?>

		</a>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>