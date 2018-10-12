<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
	    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
	
	    <!-- Scripts -->
	    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
	    <script src="<?php echo e(asset('js/prism.js')); ?>" defer></script>
	
	    <!-- Fonts -->
	    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	
	    <!-- Styles -->
	    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	    <link href="<?php echo e(asset('css/prism.css')); ?>" rel="stylesheet">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body>
	
	    <div id="app">
	    
			<?php echo $__env->make('layouts.top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
			<div class="row">
				<div class="col">
					frgesdgsdgsdgdsgdsgds
					dgs
					gds
					g
				</div>
				<div class="col-8">
					sdfdsfdsfdsfdsf
				</div>
				<div class="col">
					fsdfgdsgdsgdsgfsdfdsfdsf
				</div>
			</div>
	 
	    </div>
	    
	</body>
</html>
