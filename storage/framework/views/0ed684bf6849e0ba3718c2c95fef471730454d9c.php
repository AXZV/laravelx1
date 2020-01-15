<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/admin_dasboard.js')); ?>"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('css/admin_dasboard.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/link/link.php'); ?>

    <script type="text/javascript" src="<?php echo e(URL::asset('datatables/jquery-3.3.1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('datatables/jquery.dataTables.min.js')); ?>"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('datatables/jquery.dataTables.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('datatables/dataTables.bootstrap4.min.css')); ?>" />


  </head>
  <style>
    .bodyx
    {
      background-color: white;
    }
    .navx
    {
      background-color: white ;
      color:#3aafa9;
    }
    .texthead
    {
      font-size:1.5em;
    }
    .texthead2
    {
      font-size:2em;
    }
    .modal-header, .btnx
    {
        background-color:#3AAFA9;
    }

  </style>

  <body class="bodyx">
  <aside class="side-nav" id="show-side-navigation1">
      <div class="heading">
        <a href="/admin_dasboard" class="a_heading">
          <p class="text-monospace texthead"> <i class="fas fa-dragon texthead2"></i> The \_ure </p>
        <a>
      </div>
      <!-- <div class="search">
        <input type="text" placeholder="Type here"><i class="fa fa-search"></i>
      </div> -->
      <ul class="categories">
        <li><i class="fa fa-home fa-fw"></i><a href="#"> About us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-support fa-fw"></i><a href="#"> Subscribe us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-envelope fa-fw"></i><a href="#"> Contact us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-users fa-fw"></i><a href="#"> Our team</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-bolt fa-fw"></i><a href="#"> Testimonials</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fas fa-user-friends"></i><a href="/admin_dasboard/pegawai"> Pegawai</a></li>
        <li><i class="far fa-images"></i><a href="/admin_dasboard/slider"> Dasboard Slider</a></li>
        <li><i class="far fa-images"></i><a href="/admin_dasboard/crud"> Crud</a></li>
        <p>Example:</p>
        <!-- <li><i class="fa fa-envelope-open-o fa-fw"></i><a href="#"> Messages <span class="num dang">56</span></a></li> -->
        <li><i class="fa fa-wrench fa-fw"></i><a href="#"> Settings <span class="num prim">6</span></a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-laptop fa-fw"></i><a href="#"> About UI &amp; UX <span class="num succ">43</span></a></li>
        <!-- <li><i class="fa fa-comments-o fa-fw"></i><a href="#"> Something else</a></li> -->
      </ul>
    </aside>
  

    
    <section id="contents">
      
      <!--Navbar -->
      <nav class="mb-1 navbar navbar-expand-lg navbar-dark navx">
        <a href="#" style="color:#3aafa9;"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
          <ul class="navbar-nav ml-auto nav-flex-icons">

            <li class="nav-item dropdown">
              <a style="color:#3aafa9;" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Admin <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-default"
                aria-labelledby="navbarDropdownMenuLink-333">
                <a style="color:#3aafa9;" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" > 
                  <i class="fas fa-sign-out-alt"></i>  Log Out
                </a>
                <!-- <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a> -->

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!--/.Navbar -->
      <!-- ////////////////////////////////////  CONTENT  //////////////////////////////////////////// -->
    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
     
      </section>
      <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
      
      <script type="text/javascript" src="<?php echo e(URL::asset('datatables/jquery-3.3.1.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(URL::asset('datatables/dataTables.bootstrap4.min.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(URL::asset('datatables/jquery.dataTables.min.js')); ?>"></script>

      <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('datatables/jquery.dataTables.min.css')); ?>" />
      <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(URL::asset('datatables/dataTables.bootstrap4.min.css')); ?>" />

      </body>
    </html>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravel02\resources\views/layouts/admin_layout.blade.php ENDPATH**/ ?>