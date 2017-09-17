<?php

 $pending = DB::table('tickets')->where('status','=','pending')->count();
$completed = DB::table('tickets')->where('status','!=','pending')->count();

$categories = DB::table('categories')->get();

?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Ticketme</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <?php if(Auth::guest()): ?>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        Ticketme
                    </a>

                    <?php else: ?>
                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                        Ticketme
                    </a>
                    <?php endif; ?>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
          <div class="panel-body">
              <ul class="nav nav-pills">
                  <li class="<?php echo $__env->yieldContent('activetab', ''); ?>"><a href="<?php echo e(url('/home')); ?>">Active Tickets <span class="badge"><?php echo e($pending); ?></span></a></li>
                 <li class="<?php echo $__env->yieldContent('completedtab', ''); ?>"><a href="<?php echo e(url('/completed')); ?>">Completed Tickets <span class="badge"><?php echo e($completed); ?></span></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Available Categories
                    <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <li class="disabled"><a href="#" disabled><?php echo e($category->name); ?></a></li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                    </ul>
                </li>
                </ul>
          </div>
        </div> 

         <?php echo $__env->yieldContent('content'); ?>

    </div>
</div>
</div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
</html>
