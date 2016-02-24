      <header class="main-header">

        <!-- Logo -->
        <a href="<?=Router::url(['controller' => 'pages', 'action' => 'display', 'dashboard'],true);?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>JML</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">PT <b>JML</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?=$this->Html->image('/backend/img/user2-160x160.jpg', ['class' => 'user-image', 'alt' => 'User Image']);?>
                  <span class="hidden-xs"><?=ucwords($user['fullname']);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?=$this->Html->image('/backend/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']);?>
                    <p>
                      <?=$user['fullname'];?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
<!--                     <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div> -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
<!--                     <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?=Router::url(['controller' => 'users', 'action' => 'logout'], true);?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
              </li>
            </ul>
          </div>

        </nav>
      </header>