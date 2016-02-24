<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JML | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?=$this->Html->css('bootstrap/css/bootstrap.min', ['inline' => false, 'block' => 'mainCss', 'pathPrefix' => '/plugins/']);?>
    <?php

      $stylesheet_list  = [
        'AdminLTE.min',
        'skins/_all-skins.min'
      ];

      $plugins_style    = [
        'fontawesome/css/font-awesome.min',
        'ionicon/css/ionicons.min'
      ];

      echo $this->Html->css('custom', [
          'inline'      => false,
          'pathPrefix'  => '/backend/css/',
          'block'       => 'customCss'
        ]);

      echo $this->Html->css($stylesheet_list, [
          'inline'      => false,
          'pathPrefix'  => '/backend/css/',
          'block'       => 'mainCss'
        ]);

      echo $this->Html->css($plugins_style, [
          'inline'      => false,
          'pathPrefix'  => '/plugins/',
          'block'       => 'pluginCss'
        ]);

      echo $this->fetch('mainCss');
      echo $this->fetch('pluginCss');
      echo $this->fetch('customCss');
    ?>

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?=$this->element('backend/top-nav');?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?=$this->element('backend/side-nav');?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?=$this->element('backend/content-header');?>
        <!-- Main content -->
        <?=$this->fetch('content');?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>JML</b> v.1.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://kenjalo.com">Kenjalo Technology</a>.</strong> All rights reserved.
      </footer>

      <?=$this->element('backend/sidebar-right');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <?php
      $main_script = [
        'jQuery/jQuery-2.1.4.min',
        'bootstrap/js/bootstrap.min',
        'fastclick/fastclick.min',
      ];

      $demo_script  = [
        'app.min',
      ];

      $plugin_script = [
          'sparkline/jquery.sparkline.min',
          'jvectormap/jquery-jvectormap-1.2.2.min',
          'jvectormap/jquery-jvectormap-world-mill-en',
          'slimScroll/jquery.slimscroll.min',
          'chartjs/Chart.min',
      ];

      echo $this->Html->script(
          $main_script,
          [
            'inline'      => false,
            'pathPrefix'  => '/plugins/',
            'block'       => 'mainScript'
          ]
        );

      echo $this->Html->script(
          $demo_script,
          [
            'inline'      => false,
            'pathPrefix'  => '/backend/js/',
            'block'       => 'customScript'
          ]
        );

      echo $this->Html->script(
          $plugin_script,
          [
            'inline'      => false,
            'pathPrefix'  => '/plugins/',
            'block'       => 'pluginScript'
          ]
        );

      echo $this->fetch('mainScript');
      echo $this->fetch('pluginScript');
      echo $this->fetch('dataTableSettings');
      echo $this->fetch('script');
      echo $this->fetch('customScript');

    ?>
  </body>
</html>
