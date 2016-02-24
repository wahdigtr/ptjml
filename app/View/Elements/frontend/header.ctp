  <header class="wrapper cf">
    <!-- Menu -->
    <nav class="cf col-4">
      <div class="menu-home-icon left">
        <i class="fa fa-home yellow-col"></i>
      </div>
      <div class="menu-icon left">
        <!-- <i class="fa fa-bars white-col yellow-col-hover"></i> -->
      </div>
      <ul id="menu-menu" class="menu left cf">
        <li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page services">
          <a href="<?=Router::url('/', true);?>">Home</a>
        </li>
        <li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page services">
          <a href="<?=Router::url(['controller' => 'pages', 'action' => 'display', 'location'], true);?>">Location</a>
        </li>
        <li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page services">
          <a href="<?=Router::url(['controller' => 'pages', 'action' => 'display', 'contact_us'], true);?>">Contact Us</a>
        </li>                
      </ul>
    </nav>
    <!-- Logo -->
    <div class="logo col-4">
      <a href="<?=Router::url('/', true);?>" class="customlogoHeader">
        PT Jaya Mimika Lestari
      </a>
    </div>
    <!-- Search, Phone -->
    <div class="col-4 cf">
      <div class="phone right">
        <i class="fa fa-phone yellow-col"></i>
        <span class="number">
          +62-21 <span>45844453 / 54</span>
        </span>
        <span class="text">
          Have a question? Call us now        
        </span>
      </div>
    </div>
  </header>
