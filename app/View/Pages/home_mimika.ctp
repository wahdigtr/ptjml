
	<!-- IMAGE TOP -->
	<div class="wrapper home-services home-servie-mimika cf white-bg">
		<article class="col-3 post-87 services type-services status-publish has-post-thumbnail hentry services-category-cleaning order-category-chemical-cleaning order-category-manual-cleaning order-category-quick-cleaning">
			<?=$this->Html->image('/frontend/img/banner/'.$banner['jml_ev_image']['image_dir'].'/'.$banner['jml_ev_image']['image'], ['class' => 'attachment-services-home wp-post-image', 'alt' => 'Jaya Mitra Lestari']);?>
			<div class="text">
				<a href="<?=Router::url(['controller' => 'products', 'action' => 'list_product', 'id' => 2], true);?>" class="link"></a>
				<div class="title">
					<h2>
						<a href="<?=Router::url(['controller' => 'products', 'action' => 'list_product', 'id' => 2], true);?>" class="white-col yellow-col-hover">
							JML EV                
						</a>
					</h2>
				</div>
			</div>
			<a href="<?=Router::url(['controller' => 'products', 'action' => 'list_product', 'id' => 2], true);?>" class="overlay overlay-full">
				<span class="blue-bg white-col yellow-bg-hover">
					<i>
						VISIT               
					</i>	
				</span>
			</a>			
		</article>
		<article class="col-3 post-87 services type-services status-publish has-post-thumbnail hentry services-category-cleaning order-category-chemical-cleaning order-category-manual-cleaning order-category-quick-cleaning">
			<?=$this->Html->image('/frontend/img/banner/'.$banner['jml_crane_image']['image_dir'].'/'.$banner['jml_crane_image']['image'], ['class' => 'attachment-services-home wp-post-image', 'alt' => 'Jaya Mitra Lestari']);?>
			<div class="text">
				<a href="<?=Router::url(['controller' => 'pages', 'action' => 'list_product', 'id' => 6], true);?>" class="link"></a>
				<div class="title">
					<h2>
						<a href="<?=Router::url(['controller' => 'products', 'action' => 'list_product', 'id' => 6], true);?>" class="white-col yellow-col-hover">
							JML Crane              
						</a>
					</h2>
				</div>
			</div>
			<a href="<?=Router::url(['controller' => 'products', 'action' => 'list_product', 'id' => 6], true);?>" class="overlay overlay-full">
				<span class="blue-bg white-col yellow-bg-hover">
					<i>
						VISIT               
					</i>	
				</span>
			</a>			
		</article>
	</div>
  <!-- /IMAGE TOP -->

  <section class="wrapper home-order">
	<div class="bg-circle"></div>
	<div class="wrapper-inner tabs">
		<div class="top-line cf">
			<div class="title left">
				<h2 class="black-col">About Us</h2>
				<!-- <p class="text-col">Chose one of the categories</p> -->
			</div>
			<div class="nav left cf">
				<div class="tab-nav tab-slider right">
					<!-- <span class="prev-tab"><i class="fa fa-angle-left"></i></span> -->
					<ul class=" cf">
						<li class="left">
							<a href="#tab-0">JML EV</a>
						</li>
						<li class="left">
							<a href="#tab-1">JML Crane</a>
						</li>          
					</ul>
					<!-- <span class="next-tab"><i class="fa fa-angle-right"></i></span> -->
				</div>
			</div>
		</div>
		<div id="tab-0" class="cf order-form">
			<p>Perusahaan kami telah berpengalaman dalam pelaksanaan proyek-proyek, rental peralatan dan penjualan di perusahaan - perusahaan Nasional dan Multi-Nasional, termasuk di perusahaan Oil & Gas , serta Pertambangan.</p>

			<p>Peralatan kami sebagian besar merupakan alat ex-import (Jepang, Amerika, Australia dan Eropa), dimana kami memberikan Garansi pemakaian dan purna jual dengan jaminan ketersediaan spare parts dan alat penunjangnya.</p>

			<p>Kami dapat menyediakan berbagai jenis alat berat dan alat konstruksi, seperti: Bulldozer, Compactor, Compressor, Crane, Dumper, Excavator, Generator, Loader, Oil & Gas's Product, Rig dan Spare part serta Attachments.</p>
		</div>
		<div id="tab-1" class="cf order-form">
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porttitor facilisis diam eu dictum. Donec ac mi at massa lacinia placerat quis vel nisl. Donec ornare a felis nec tincidunt. Praesent tristique odio et tortor commodo congue. Quisque pulvinar quam id est iaculis, quis suscipit sapien accumsan. Nulla auctor elit et nibh viverra pretium. Suspendisse non turpis tellus.</p>

			<p>Sed auctor purus et laoreet volutpat. Cras ut cursus massa. Curabitur dictum felis nec neque dignissim, eu tincidunt nisi gravida. Praesent eu tellus orci. Integer erat nisi, vulputate in tempor eu, gravida quis mauris. Proin purus nisi, suscipit sed hendrerit dignissim, mattis nec est. Integer tincidunt tortor sed orci lobortis dictum. Maecenas in interdum quam, nec mattis elit. Nunc faucibus lorem eget diam accumsan, sed aliquet felis malesuada. Duis facilisis in tellus eget sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit purus a eros viverra maximus. Phasellus cursus erat eget erat iaculis cursus.</p>
		</div>
	</div>
  </section>
  <section class="wrapper white-bg home-description cf tagline">
	<div class="image">
	  <!-- <img src="http://alethemes.com/limpieza/wp-content/uploads/2015/06/homeimage.jpg" alt> -->
	  <?=$this->Html->image('/frontend/img/cargo.png', ['width' => '300']);?>
	</div>
	<h2>We Serve Better</h2>
	<h3>YOUR USED MACHINERIES NOW WITH WARRANTY</h3>
  </section>
  <section class="home-video">
	<div class="wrapper white-bg">
	  <?=$this->Html->image('/frontend/img/banner/'.$banner['youtube_background']['image_dir'].'/'.$banner['youtube_background']['image'], ['class' => 'attachment-services-home wp-post-image', 'alt' => 'Jaya Mitra Lestari']);?>
	  <div class="text">
		<h2>
		  How we            
		  <span class="white-col">work</span>
		</h2>
		<h3>Watch video presentation</h3>
	  </div>
	  <span class="icon" id="ale_play_video">
	  <i class="fa fa-play white-col red-bg yellow-bg-hover"></i>
	  </span>
	</div>
	<div class="pop-up">
	  <div class="exit-box"></div>
	  <div class="box ale_youtube_box" data-video="<?=Configure::read('MIMIKA.youtube.link');?>"></div>
	  <i class="exit fa fa-remove white-col"></i>
	</div>
  </section>
  <div class="home-blog">
	<div class="wrapper white-bg">
	  <div class="slider">
		<ul class="slides">
			<?php
				if(count($data_image) > 0){
					foreach ($data_image as $key => $value) {
						# code...
			?>
					<li class="post-76 post type-post status-publish format-standard has-post-thumbnail hentry category-category-1 category-category-3 tag-tag-12">
						<a href="#" class="image">
							<?=$this->Html->image('/frontend/img/image_roll/'.$value['ImageRoll']['image_dir'].'/'.$value['ImageRoll']['image'], ['class' => 'attachment-post-home wp-post-image', 'alt' => 'Java Mashindo Lestari', 'width' => 320]);?>
<!-- 							<span class="overlay">
								<i class="fa fa-plus red-bg white-col yellow-bg-hover"></i>
							</span> -->
						</a>
					</li>			
			<?php
					}
				}
			?>
		</ul>
	  </div>
	</div>
  </div>
  <section class="home-clients wrapper white-bg">
	<div class="wrapper-inner">
	  <div class="title">
		<h2>Our clients</h2>
	  </div>
	  <?php
	  	if(count($data_client) > 0){
	  		foreach ($data_client as $key => $value) {
	  			# code...
	  ?>
				<a href="#">
					<?=$this->Html->image('/frontend/img/client/'.$value['Client']['image_dir'].'/'.$value['Client']['image'], ['alt' => $value['Client']['image'] ]);?>
				</a>
	  <?php
	  		}
	  	}
	  ?>
	</div>
  </section>
</div>