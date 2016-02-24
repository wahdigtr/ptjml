<section class="wrapper white-bg home-description content-area">
	<div class="content-header">
		<h4>Dealer</h4>
	</div>
	<div class="inner-content clearfix">
		<div class="row">
			<?php 
				if(count($data_dealer) > 0){
					foreach ($data_dealer as $key => $value) {
						# code...
			?>
						<div class="col-sm-6">
							<div class="media">
								<div class="media-left">
									<!-- <a href="#"> -->
									<!-- <img class="media-object" src="..." alt="..."> -->
									<!-- </a> -->
									<?=$this->Html->image('/frontend/img/dealer/'.$value['Dealer']['picture_dir'].'/200x_200x200_'.$value['Dealer']['picture']);?>
								</div>
								<div class="media-body">
								<h4 class="media-heading"><?=$value['Dealer']['dealer_name'];?></h4>
									<?=$value['Dealer']['address'];?>
								</div>
							</div>			
						</div>
			<?php
					}
				}else{
			?>
					<div class="alert alert-warning" role="alert">Data belum tersedia</div>
			<?php
				}
			?>
			<div class="col-md-12 text-right">
				<?php
					echo $this->Html->link('Be A Dealer', 
							[
								'controller' => 'become_dealers',
								'action' => 'order'
							],
							[
								'class' => 'btn btn-lg btn-success'
							]
						);
				?>
			</div>	
		</div>
	</div>
</section>