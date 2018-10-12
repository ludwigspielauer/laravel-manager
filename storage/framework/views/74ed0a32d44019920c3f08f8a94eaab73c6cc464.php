<?php $__env->startSection('content'); ?>

<h2>Projekt</h2>

<?php if(session('status')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
<?php endif; ?>

<h3>Projekt wählen</h3>
<form method="POST" action="<?php echo e(url('projekt/change')); ?>">
	<?php echo csrf_field(); ?>
                        
	<div class="form-group row">
	    <label for="lmh" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Projekt wählen')); ?></label>
	
	    <div class="col-md-6">
			<select id="projekt" class="form-control<?php echo e($errors->has('projekt') ? ' is-invalid' : ''); ?>" name="projekt">
				<?php $__currentLoopData = $projekte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projekt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($projekt->id); ?>" 
						<?php echo e((old('projekt', Auth::user()->projekt_id) == $projekt->id) ? 'selected' : ''); ?> >
						
						<?php echo e($projekt->name); ?>

					</option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
	        <?php if($errors->has('projekt')): ?>
	            <span class="invalid-feedback" role="alert">
	                <strong><?php echo e($errors->first('projekt')); ?></strong>
	            </span>
	        <?php endif; ?>
	    </div>
	</div>

      
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<button type="submit" class="btn btn-primary">
				<?php echo e(__('Auswählen')); ?>

			</button>
		</div>
	</div>
                        
</form>


<h3>Neues Projekt</h3>
<form method="POST" action="<?php echo e(url('projekt/neu')); ?>">
	<?php echo csrf_field(); ?>
                        
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

		<div class="col-md-6">
			<input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required>

			<?php if($errors->has('name')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('name')); ?></strong>
				</span>
			<?php endif; ?>
		</div>
	</div>

      
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<button type="submit" class="btn btn-primary">
				<?php echo e(__('Erstellen')); ?>

			</button>
		</div>
	</div>
                        
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>