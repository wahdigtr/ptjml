  <footer class="footer-<?=$warna;?>">
	<div class="to-top">
	  <div class="arrow">
		<i class="fa fa-arrow-up"></i>
	  </div>
	</div>
	<div class="wrapper-inner">
	  <div class="top-line cf">
		<div class="col-4 contact">
		  <h2>Address</h2>
		  <?=Configure::read('MIMIKA.localisation.address');?>
		</div>
		<!-- Logo -->
		<div class="logo col-4">
				<div class="logo-area text-center">
					<a href="" class="logo-footer">
						<?=$this->Html->image('/frontend/img/logo_jml_footer.png', ['class' => 'img-responsive']);?>
					</a>
				</div>
				<div class="social">
					<ul class="list-inline social-link">
						<li class="twitter"><a class="white-col blue-menu-col-hover" rel="external" href="<?=Configure::read('JML.Medsos.twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li class="instagram"><a class="white-col blue-menu-col-hover" rel="external" href="<?=Configure::read('JML.Medsos.ig');?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li class="facebook"><a class="white-col blue-menu-col-hover" rel="external" href="<?=Configure::read('JML.Medsos.facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li class="pinterest"><a class="white-col blue-menu-col-hover" rel="external" href="<?=Configure::read('JML.Medsos.gplus');?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>					
					</ul>
				</div>		      
		      
		</div>
		<div class="col-4 logo">
<!-- 	      <a href="<?=Router::url('/', true);?>" class="customlogo">
	        JML Group
	      </a>		
			<ul class="list-unstyled text-left footer-list">
		      	<li><a href='#'>Jaya Mimika Lestari Equip</a></li>
		      	<li><a href='#'>Jaya Mimika Lestari Rent</a></li>
		      	<li><a href='#'>Jaya Mimika Lestari Parts</a></li>
		      	<li><a href='#'>Jaya Mimika Lestari Services</a></li>
		      	<li><a href='#'>Jaya Mimika Lestari Trans</a></li>
		      </ul> -->
		</div>
	  </div>
	  <div class="bottom-line cf">
		<!-- Copy -->
		<div class="col-12 copyright text-center">
		  <p class="text-center">&copy; 2016 ALL RIGHTS RESERVED</p>
		</div>
		<!-- Social -->
	  </div>
	</div>
  </footer>