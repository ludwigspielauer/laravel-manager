<?php $__env->startSection('content'); ?>

<h1>Authentifizierung</h1>
<?php if(session('status')): ?>
	<div class="alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(url('/projekt/'.Auth::user()->projekt->id.'/authentifizierung/save')); ?>">
	<?php echo csrf_field(); ?>
	
	<h3>Registrierungsmöglickeit</h3>
	<p>
		Wie sollen die Benutzer für die Seite registriert werden?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="register_admin" id="register_admin" value="1" <?php echo e((old('register_admin', @$projekt->benutzerSettings->register_admin) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="register_admin" class="text-left">Anlage durch Admin</label><br>
		
			<input type="checkbox" name="register_self" id="register_self" value="1" <?php echo e((old('register_self', @$projekt->benutzerSettings->register_self) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="register_self" class="text-left">Anlage durch User selbst</label><br>
		
		</div>
	</div> 
	
	
	<h3>Sicherheit</h3>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="register_confirm_mail" id="register_confirm_mail" value="1" <?php echo e((old('register_confirm_mail', @$projekt->benutzerSettings->register_confirm_mail) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="register_confirm_mail" class="text-left">Gültigkeit der Email (Zusenden eines Bestätigüngslink)</label><br>
		
			<input type="checkbox" name="secure_ip" id="secure_ip" value="1" <?php echo e((old('secure_ip', @$projekt->benutzerSettings->secure_ip) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="secure_ip" class="text-left">Prüfung der IP-Adresse</label><br>
		
		</div>
	</div> 
	
	<h3>Benachrichtigungen</h3>
	<p>
		Soll der Webseitenbetreiber über neue Anmeldungen informiert werden?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="register_notification_mail" id="register_notification_mail" value="1" <?php echo e((old('"secure_ip"', @$projekt->benutzerSettings->register_notification_mail) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="register_notification_mail" class="text-left">E-Mail an Webseitenbetreiber</label><br>
		
			<input type="checkbox" name="register_admin_dashboard" id="register_admin_dashboard" value="1" <?php echo e((old('register_admin_dashboard', @$projekt->benutzerSettings->register_admin_dashboard) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="register_admin_dashboard" class="text-left">Anzeige in Admin-Dashboard</label><br>
		
		</div>
	</div> 
	
	<h3>Social-Media</h3>
	<p>
		Über welche Plattformen solle eine Registrierung ermöglicht werden?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="google" id="google" value="1" <?php echo e((old('google', @$projekt->benutzerSettings->google) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="google" class="text-left">Google</label><br>
		
			<input type="checkbox" name="facebook" id="facebook" value="1" <?php echo e((old('facebook', @$projekt->benutzerSettings->facebook) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="facebook" class="text-left">Facebook</label><br>		
		
			<input type="checkbox" name="twitter" id="twitter" value="1" <?php echo e((old('twitter', @$projekt->benutzerSettings->twitter) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="twitter" class="text-left">Twitter</label><br>		

			<input type="checkbox" name="github" id="github" value="1" <?php echo e((old('github', @$projekt->benutzerSettings->github) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="github" class="text-left">Github</label><br>		

			<input type="checkbox" name="soundcloud" id="soundcloud" value="1" <?php echo e((old('soundcloud', @$projekt->benutzerSettings->soundcloud) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="soundcloud" class="text-left">Soundcloud</label><br>		

			<input type="checkbox" name="steam" id="steam" value="1" <?php echo e((old('steam', @$projekt->benutzerSettings->steam) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="steam" class="text-left">Steam</label><br>		

			<input type="checkbox" name="pinterest" id="pinterest" value="1" <?php echo e((old('pinterest', @$projekt->benutzerSettings->pinterest) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="pinterest" class="text-left">Pinterest</label><br>		

			<input type="checkbox" name="vimeo" id="vimeo" value="1" <?php echo e((old('vimeo', @$projekt->benutzerSettings->vimeo) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="vimeo" class="text-left">Vimeo</label><br>		

			<input type="checkbox" name="lastfm" id="lastfm" value="1" <?php echo e((old('twitter', @$projekt->benutzerSettings->lastfm) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="lastfm" class="text-left">lastFm</label><br>		
		
			<input type="checkbox" name="vkontakte" id="vkontakte" value="1" <?php echo e((old('vkontakte', @$projekt->benutzerSettings->vkontakte) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="vkontakte" class="text-left">VKontakte</label><br>		
			
			<input type="checkbox" name="spotify" id="spotify" value="1" <?php echo e((old('spotify', @$projekt->benutzerSettings->spotify) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="spotify" class="text-left">Spotify</label><br>	
			
			<input type="checkbox" name="linkedin" id="linkedin" value="1" <?php echo e((old('linkedin', @$projekt->benutzerSettings->linkedin) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="linkedin" class="text-left">Linkedin</label><br>	
			
			<input type="checkbox" name="yahoo" id="yahoo" value="1" <?php echo e((old('yahoo', @$projekt->benutzerSettings->yahoo) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="yahoo" class="text-left">Yahoo</label><br>	
			
			<input type="checkbox" name="stumbleupon" id="stumbleupon" value="1" <?php echo e((old('stumbleupon', @$projekt->benutzerSettings->stumbleupon) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="stumbleupon" class="text-left">Stumbleupon</label><br>	
			
			<input type="checkbox" name="tumblr" id="tumblr" value="1" <?php echo e((old('tumblr', @$projekt->benutzerSettings->tumblr) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="tumblr" class="text-left">Tumblr</label><br>	
			
			<input type="checkbox" name="social_sonstige" id="social_sonstige" value="1" <?php echo e((old('yahoo', @$projekt->benutzerSettings->social_sonstige) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="social_sonstige" class="text-left">Sonstige</label><br>	
			<input id="social_sonstige_text" type="text" class="form-control<?php echo e($errors->has('social_sonstige_text') ? ' is-invalid' : ''); ?>" name="social_sonstige_text" value="<?php echo e(old('social_sonstige_text', @$projekt->benutzerSettings->social_sonstige_text)); ?>" >
	
		</div>
	</div> 
	
	<h3>Benutzereinstellungen</h3>
	<p>
		Welche authentifizierungsrelevante Daten kann der Benutzer ändern?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="change_email_self" id="change_email_self" value="1" <?php echo e((old('change_email_self', @$projekt->benutzerSettings->change_email_self) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="change_email_self" class="text-left">E-Mail</label><br>		
		
			<input type="checkbox" name="change_password_self" id="change_password_self" value="1" <?php echo e((old('change_password_self', @$projekt->benutzerSettings->change_password_self) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="change_password_self" class="text-left">Passwort</label><br>		
			
			<input type="checkbox" name="change_sonstige_self" id="change_sonstige_self" value="1" <?php echo e((old('login_sonstige', @$projekt->benutzerSettings->change_sonstige_self) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="change_sonstige_self" class="text-right">Sonstige</label><br>
			<input id="change_sonstige_self_text" type="text" class="form-control<?php echo e($errors->has('change_sonstige_self_text') ? ' is-invalid' : ''); ?>" name="change_sonstige_self_text" value="<?php echo e(old('change_sonstige_self_text', @$projekt->benutzerSettings->change_sonstige_self_text)); ?>" >
	
		</div>
	</div> 
	
	
	<h3>Logininformationen</h3>
	<p>
		Mit welchen Informationen kann sich der Benutzer anmelden?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
		
			<input type="checkbox" name="login_email" id="login_email" value="1" <?php echo e((old('login_email', @$projekt->benutzerSettings->login_email) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="login_email" class="text-left">E-Mail</label><br>
		
			<input type="checkbox" name="login_name" id="login_name" value="1" <?php echo e((old('login_name', @$projekt->benutzerSettings->login_name) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="login_name" class="text-left">Username</label><br>		
		
			<input type="checkbox" name="login_sonstige" id="login_sonstige" value="1" <?php echo e((old('login_sonstige', @$projekt->benutzerSettings->login_sonstige) == '1' ? 'checked="checked"' : '')); ?> >
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
		
			<input type="checkbox" name="forget_password" id="forget_password" value="1" <?php echo e((old('forget_password', @$projekt->benutzerSettings->forget_password) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="forget_password" class="text-left">Änderungslink per E-Mail anfordern</label><br>
		
			<input type="checkbox" name="change_password_admin" id="change_password_admin" value="1" <?php echo e((old('change_password_admin', @$projekt->benutzerSettings->change_password_admin) == '1' ? 'checked="checked"' : '')); ?> >
			<label for="change_password_admin" class="text-left">Passwortänderung durch Admin</label><br>		
			
		</div>
	</div> 
	
	
	<h3>Sicherheit</h3>
	<p>
		Wie soll sich die Software bei fehlgeschlagen Loginversuchen verhalten?
	</p>
	<div class="form-group row">
		<div class="col-md-6">
			<input id="secure_max_login" type="number" class="form-control<?php echo e($errors->has('secure_max_login') ? ' is-invalid' : ''); ?>" name="secure_max_login" 
				value="<?php echo e(old('secure_max_login', ($projekt->benutzerSettings) ? @$projekt->benutzerSettings->secure_max_login : 5)); ?>" required>
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
			<input id="secure_lockout_sec" type="number" class="form-control<?php echo e($errors->has('secure_lockout_sec') ? ' is-invalid' : ''); ?>" name="secure_lockout_sec" 
				value="<?php echo e(old('secure_lockout_sec', ($projekt->benutzerSettings) ? @$projekt->benutzerSettings->secure_lockout_sec : 300)); ?>" required>
			<label for="secure_lockout_sec" class="text-left">zeitliche Sperrung in Sekunden</label><br>
			<?php if($errors->has('secure_lockout_sec')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('secure_lockout_sec')); ?></strong>
			</span>
			<?php endif; ?>
		</div>
	</div> 
	
	- Robot-Informationen<br>

	
	<div class="form-group row">
			<button type="submit" class="btn btn-primary">
				<?php echo e(__('Speichern')); ?>

			</button>
	</div>
	

                        
</form>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>