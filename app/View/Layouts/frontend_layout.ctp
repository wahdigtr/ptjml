<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <title>PT Jaya Mimika Lestari</title>
  <?php
	$stylesheet_limpieza = [
	  'general.css',
	];

	$script_limpieza = [
	  'query/jquery',
	  'jquery/jquery-migrate.min',
	  'libs/modernizr-2.5.3.min',
	];

	$main_script = [
	  'jQuery/jQuery-2.1.4.min',
	  'bootstrap/js/bootstrap.min',
	  'fastclick/fastclick.min',
	];

	$revslider_script = [
	  'revslider/public/assets/js/jquery.themepunch.tools.min',
	  'revslider/public/assets/js/jquery.themepunch.revolution.min',
	];

	echo $this->Html->css('custom', ['inline' => false, 'block' => 'cssMain', 'pathPrefix' => '/frontend/css/' ]);
	echo $this->Html->css($stylesheet_limpieza, ['inline' => false, 'block' => 'cssMain', 'pathPrefix' => '/frontend/limpieza/css/' ]);
	echo $this->Html->script(
		$main_script,
		[
		  'inline'      => false,
		  'pathPrefix'  => '/plugins/',
		  'block'       => 'scriptTop'
		]
	  );

    echo $this->Html->css('bootstrap/css/bootstrap.min', ['inline' => false, 'block' => 'cssMain', 'pathPrefix' => '/plugins/']);

	echo $this->Html->script($script_limpieza, ['inline' => false, 'block' => 'scriptTop', 'pathPrefix' => '/frontend/limpieza/js/' ]);
	echo $this->fetch('cssMain');
	echo $this->fetch('cssPlugin');
	echo $this->fetch('cssCustom');

	echo $this->fetch('scriptTop');
  ?>
<!-- <script type='text/javascript' src='http://alethemes.com/limpieza/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.0.5'></script>
<script type='text/javascript' src='http://alethemes.com/limpieza/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.0.5'></script>
<script type='text/javascript' src='http://alethemes.com/limpieza/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
<script type='text/javascript' src='http://alethemes.com/limpieza/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='http://alethemes.com/limpieza/wp-content/themes/limpieza/js/libs/modernizr-2.5.3.min.js?ver=1.2'></script> -->

  <!--[if lt IE 9]>
  <script type='text/javascript' src='http://html5shim.googlecode.com/svn/trunk/html5.js?ver=1.2'></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Khand:300,400,500,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Ranga:400,600' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Questrial:400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:400' rel='stylesheet' type='text/css'>

  <style type='text/css'>
	body {
	  font-size:13px;font-style:normal;color:#0f314d;font-family:Arial;background-image: url( "<?=Router::url('/', true);?>frontend/limpieza/css/images/colorpicker/background/<?=$background_data;?>");background-repeat:repeat;background-position:top center;background-attachment:scroll;  }
	h1 {
	  font-size:50px;font-style:normal;color:#0f314d;font-family:Khand; }
	h2 {
	  font-size:40px;font-style:normal;color:#0f314d;font-family:Khand; }
	h3 {
	  font-size:30px;font-style:normal;color:#0f314d;font-family:Khand; }
	h4 {
	  font-size:20px;font-style:normal;color:#0f314d;font-family:Khand; }
	h5 {
	  font-size:16px;font-style:normal;color:#0f314d;font-family:Khand; }
	h6 {
	  font-size:12px;font-style:normal;color:#0f314d;font-family:Khand; }

	/*Menu Font (Khand)*/
	header,.services-page-archive article .text .link,.pagination,.home-services article .overlay,
	.blog-page-archive article .text .link,.about-people .tabs .nav ul li a,.contact-information .details p,
	button, input[type="button"], input[type="reset"], input[type="submit"],
	.contact-information .tabs-nav ul li a,.story ol > li:before,.story table thead,
	.blog-comments .comment .content .details .name,.blog-comments .comment .content .details .comment-reply-link,
	.woocommerce ul.products li.product .button,.woocommerce div.product form.cart .button,
	.order-page-template .order-content .tabs .order-list-form .price .submit-button span,
	.vc_progress_bar .vc_single_bar .vc_label{
	  font-family:Khand;  }

	/*Title Font (Ranga)*/
	header .logo a,footer .wrapper-inner .top-line .contact h2,.page-header h2,.services-page-archive article h2,
	.home-services article .text .title h2,.contact-form .wrapper-inner .text h3,
	.home-people article .text-block .text h4,.home-clients .title h2,.story blockquote,
	footer .wrapper-inner .top-line .logo a,.order-page-template .top-line .wrapper-order h3,
	.home-order .top-line h2,.rangafont{
	font-family:Ranga;  }

	/*Form Font (Questrial)*/
	input[type=text], input[type=email], input[type=url], input[type=search], input[type=password], textarea,
	.order-page-template .order-content .tabs .order-form form .form-inner .dropdown .selected,
	.order-page-template .order-content .tabs .order-form form .form-inner .text-line > span{
	font-family:Questrial;  }

	/*People Font (Montserrat)*/
	.home-people article .rating-block .rating .circle-text,.home-people article .rating-block .rating .circle-info-half,
	.order-page-template .order-content .tabs .tab-nav li a,.order-page-template .order-content .tabs article .order-item .text .details span.price,
	.home-order .tabs .order-form form .price .number,.order-page-template .order-content .tabs .order-list-form .price .number{
	font-family:Montserrat; }

	/*Clients Font (Raleway)*/
	.home-clients .title h3{
	font-family:Raleway;  }

	/*Background-image*/
	body {
		}

	/*Yellow color*/
	

	/*Orange color*/
	
	/*Red color*/
	
	/*Blue Menu color*/
	
	/*Search color*/
	
	/*Pagination color*/
	
	/*Footer color*/
	
	/*Input color*/
	
	/*Input color*/
	
	/*Contact color*/
	
	/*Text color*/
	
	/*Text color*/
	
  </style>
  <style type="text/css">
	.ale_wrapper {
	  max-width:1200px!important;
	  margin-right:auto!important;
	  margin-left:auto!important;
	}
  </style> 
<link rel='stylesheet' id='ale-shortcodes-css'  href='http://alethemes.com/limpieza/wp-content/themes/limpieza/aletheme/shortcodes/shortcodes.css?ver=4.3.1' type='text/css' media='all' />

  <noscript>
	<style>
		.body{
		  opacity: 1;
		}
		.loader{
		  opacity: 0;
		  display: none;
		}
	</style>
  </noscript>

  <script type="text/javascript">
	jQuery(document).ready(function ($) {
		//Smooth page loader
		$(window).load(function(){
		  $('.body').css({opacity: 1});
		  $('.loader').css({opacity: 0}).fadeOut();
		});
	});
  </script>
  <style type="text/css">
	  .ale_map_canvas img {
		  max-width: none;
	  }
  </style>
  <meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress."/>
  <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://alethemes.com/limpieza/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.css" media="screen"><![endif]--><!--[if IE  8]><link rel="stylesheet" type="text/css" href="http://alethemes.com/limpieza/wp-content/plugins/js_composer/assets/css/vc-ie8.css" media="screen"><![endif]-->
  <meta name="generator" content="Powered by Slider Revolution 5.0.5 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
  <noscript>
  <style> 
  .wpb_animate_when_almost_visible { 
	opacity: 1; 
  }
  </style>
  </noscript>
</head>
<body class="home page page-id-18 page-template page-template-page-home page-template-page-home-php wpb-js-composer js-comp-ver-4.7 vc_responsive" >
<div class="loader">
	<div class="inner one"></div>
	<div class="inner two"></div>
	<div class="inner three"></div>
</div>
<div class="body">
  	<?=$this->element('frontend/header');?>

  	<?=$this->fetch('content');?>
	<?=$this->element('frontend/footer');?>
</div>


<script type='text/javascript'>
/* <![CDATA[ */
var ale = {"template_dir":"http:\/\/alethemes.com\/limpieza\/wp-content\/themes\/limpieza","ajax_load_url":"http:\/\/alethemes.com\/limpieza\/wp-admin\/admin-ajax.php","ajax_comments":"1","ajax_posts":"0","ajax_open_single":"0","is_mobile":"0","msg_thankyou":"Thank you for your comment!"};
/* ]]> */
</script>
<?php
	$include_script = [
	  'modules',
	  'libs/jquery.circliful.min',
	  'libs/easydropdown',
	  'libs/jquery-ui',
	  'scripts',
	];

	echo $this->Html->script($include_script, ['inline' => false, 'block' => 'mainScripts', 'pathPrefix' => '/frontend/limpieza/js/' ]);
	echo $this->fetch('mainScripts');  
	echo $this->fetch('pluginScript');  
	echo $this->fetch('script');  
	echo $this->fetch('customScript');  
?>
</body>
</html>
