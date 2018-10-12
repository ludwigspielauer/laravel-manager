<?php $__env->startSection('content'); ?>

<h1>Login</h1>
<?php if(session('status')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(url('/projekt/'.Auth::user()->projekt->id.'/benutzer/save')); ?>">
	<?php echo csrf_field(); ?>
	
	<h3>Logininformationen</h3>
	<p>
		Mit welchen Informationen kann sich der Benutzer anmelden?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="login_email" id="login_email" value="1" <?php echo e((old('login_email', $projekt->benutzerSettings->login_email) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="login_email" class="text-left">E-Mail</label><br>
		
			<input type="checkbox" name="login_name" id="login_name" value="1" <?php echo e((old('login_name', $projekt->benutzerSettings->login_name) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="login_name" class="text-left">Username</label><br>		
		
			<input type="checkbox" name="login_sonstige" id="login_sonstige" value="1" <?php echo e((old('login_sonstige', $projekt->benutzerSettings->login_sonstige) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="login_sonstige" class="text-right">Sonstige</label><br>
			<input id="login_sonstige_text" type="text" class="form-control<?php echo e($errors->has('login_sonstige_text') ? ' is-invalid' : ''); ?>" name="login_sonstige_text" value="<?php echo e(old('login_sonstige_text', @$projekt->benutzerSettings->login_sonstige_text)); ?>" >
			
		</div>
	</div> 
	
	<h3>Passwort vergessen</h3>
	<p>
		Was kann ein Benutzer tun, der sein Passwort vergessen hat?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="forget_password" id="forget_password" value="1" <?php echo e((old('forget_password', $projekt->benutzerSettings->forget_password) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="forget_password" class="text-left">Änderungslink per E-Mail anfordern</label><br>
		
			<input type="checkbox" name="change_password_admin" id="change_password_admin" value="1" <?php echo e((old('change_password_admin', $projekt->benutzerSettings->change_password_admin) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="change_password_admin" class="text-left">Passwortänderung durch Admin</label><br>		
			
		</div>
	</div> 
	
	
	<h3>Sicherheit</h3>
	<p>
		Wie soll sich die Software bei fehlgeschlagen Loginversuchen verhalten?
	</p>
	<div class="form-group row">
		<div class="col-md-6">
			<input id="secure_max_login" type="number" class="form-control<?php echo e($errors->has('secure_max_login') ? ' is-invalid' : ''); ?>" name="secure_max_login" value="<?php echo e(old('secure_max_login', @$projekt->benutzerSettings->secure_max_login)); ?>" required>
			<label for="secure_max_login" class="text-left">Anzahl der Fehlversuche</label><br>
			<?php if($errors->has('secure_max_login')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('secure_max_login')); ?></strong>
			</span>
			<?php endif; ?>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-6">
			<input id="secure_lockout_sec" type="number" class="form-control<?php echo e($errors->has('secure_lockout_sec') ? ' is-invalid' : ''); ?>" name="secure_lockout_sec" value="<?php echo e(old('secure_lockout_sec', @$projekt->benutzerSettings->secure_lockout_sec)); ?>" required>
			<label for="secure_lockout_sec" class="text-left">zeitliche Sperrung in Sekunden</label><br>
			<?php if($errors->has('secure_lockout_sec')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('secure_lockout_sec')); ?></strong>
			</span>
			<?php endif; ?>
		</div>
	</div> 
	
	- Robot-Informationen<br>
	- Secure-Ip
                        

	
	<div class="form-group row">
			<button type="submit" class="btn btn-primary">
				<?php echo e(__('Speichern')); ?>

			</button>
	</div>
	

                        
</form>




<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>