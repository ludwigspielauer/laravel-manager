<div class="row" style="background-color: lightgrey;">
	<div class="col">
		<?php echo e(@$pagetitle); ?>

	</div>
	<div class="col-8">

	</div>
	<div class="col">
		<a href="<?php echo e(URL::previous()); ?>">Back</a>
	</div>
</div>
		<?php if(session('status')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo e(session('status')); ?>

			</div>
		<?php endif; ?>
<br>