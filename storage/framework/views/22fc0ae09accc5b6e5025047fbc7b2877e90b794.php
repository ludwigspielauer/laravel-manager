<aside class="sidebar">
	<br>
	<div id="leftside-navigation" class="nano">
		<ul class="nano-content">
			<li>
				<a href="<?php echo e(url('projektwahl')); ?>"><i class="fa fa-dashboard"></i><span>Projekt wählen</span></a>
			</li>
	
			<?php if(@Auth::user()->projekt): ?>
			<li class="sub-menu">
				<a href="javascript:void(0);"><i class="fa fa-file"></i><span>Benutzer</span><i class="arrow fa fa-angle-right pull-right"></i></a>
				<ul>
					<li><a href="<?php echo e(url('benutzer/benutzer')); ?>">Benutzer</a></li>
					<li><a href="<?php echo e(url('/projekt/'.Auth::user()->projekt_id.'/authentifizierung')); ?>">Authentifizierung</a></li>
				</ul>
			</li>
			
			<li class="sub-menu">
				<a href="javascript:void(0);"><i class="fa fa-file"></i><span>Aufbau</span><i class="arrow fa fa-angle-right pull-right"></i></a>
				<ul>
					<li><a href="pages-blank.html">Layout</a></li>
					<li><a href="pages-blank.html">Menü</a></li>
					<li><a href="<?php echo e(url('aufbau/seiten')); ?>">Seiten</a></li>
				</ul>
			</li>
			
			<li class="sub-menu">
				<a href="javascript:void(0);"><i class="fa fa-file"></i><span>Datenbank</span><i class="arrow fa fa-angle-right pull-right"></i></a>
				<ul>
					<li><a href="pages-blank.html">Modelle</a></li>
				</ul>
			</li>
			
			<li class="sub-menu">
				<a href="javascript:void(0);"><i class="fa fa-file"></i><span>Design</span><i class="arrow fa fa-angle-right pull-right"></i></a>
				<ul>
					<li><a href="pages-blank.html">Icons</a></li>
					<li><a href="pages-blank.html">Menüs</a></li>
				</ul>
			</li>
			<li>
				<a href="<?php echo e(url('sicherheit')); ?>"><i class="fa fa-dashboard"></i><span>Secure</span></a>
			</li>

			
			<?php endif; ?>
	      
		</ul>
	</div>
</aside>