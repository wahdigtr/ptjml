<?php
	$style_list = [
		'simpleGallery/css/jquery.simpleGallery',
		'simpleGallery/css/jquery.simpleLens'
	];

	echo $this->Html->css($style_list, ['inline' => false, 'block' => 'cssCustom', 'pathPrefix' => '/plugins/']);
?>
<section class="wrapper white-bg home-description content-area">
<!-- 	<div class="content-header">
		<h4>List Product</h4>
	</div> -->
	<div class="inner-content clearfix">
		<div class="col-3">
			<?php
				if(count($list_category) > 0){
					echo '<div class="list-group">';
					foreach ($list_category as $key => $value) {
						# code...
						echo $this->Html->link(
								$value,[
									'controller' 	=> 'product_categories',
									'action'		=> 'by_category',
									$group_id,
									$key
								],[
									'class'			=> "list-group-item",								
								]
							);
					}
					echo '</div>';
				}

				$list_brand	 	= [];
				$list_type		= [];
			?>
			<div class="well">
				<?=$this->Form->create(null, ['url' => ['action' => 'product_search'], 'type' => 'get']);?>
					<?=$this->Form->hidden('group_id', ['value' => $group_id]);?>
					<div class="form-group">
						<label>Category</label>
						<div class="">
							<?=$this->Form->input('category', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'options' => $list_category, 'empty' => 'Pilih Kategori', 'required', 'id' => 'category_list']);?>
						</div>
					</div>
					<div class="form-group">
						<label>Brand</label>
						<div class="">
							<?=$this->Form->input('brand', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'options' => $list_brand, 'empty' => 'Pilih Brand','id' => 'brand_list']);?> <div id="loader_brand"></div>
						</div>
					</div>
					<div class="form-group">
						<label>Type</label>
						<div class="">
							<?=$this->Form->input('type', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'options' => $list_type, 'empty' => 'Pilih Tipe', 'id' => 'type_list']);?> <div id="loader_type"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<?=$this->Form->button('<span class="fa fa-search"></span> Cari', ['class' => 'btn btn-primary', 'div' => false, 'label' => false, 'escape' => false, 'type' => 'submit']);?>
						</div>
					</div>					
				<?=$this->Form->end();?>
			</div>
		</div>
		<div class="col-9">
			<div class="content-header no-padding">
				<h3><?=$data_product['Product']['product_name'];?></h3>
			</div>
			<div class="image-area">
			    <div class="simpleLens-gallery-container" id="demo-1">
			        <div class="simpleLens-container">
			            <div class="simpleLens-big-image-container">
			                <a class="simpleLens-lens-image" data-lens-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$data_product['Product']['cover'];?>">
			                    <img src="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/lens_200h_'.$data_product['Product']['cover'];?>" class="simpleLens-big-image">
			                </a>
			            </div>
			        </div>

			        <div class="simpleLens-thumbnails-container">
			            <a href="#" class="simpleLens-thumbnail-wrapper"
			               data-lens-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$data_product['Product']['cover'];?>"
			               data-big-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/lens_200h_'.$data_product['Product']['cover'];?>">
			                <img src="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/200x_200x200_'.$data_product['Product']['cover'];?>" width="100">
			            </a>			        
			        	<?php foreach ($data_image as $key => $value) { ?>
				            <a href="#" class="simpleLens-thumbnail-wrapper"
				               data-lens-image="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/'.$value['ProductImage']['image'];?>"
				               data-big-image="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/lens_200h_'.$value['ProductImage']['image'];?>">
				                <img src="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/200x_200x200_'.$value['ProductImage']['image'];?>" width="100">
				            </a>
			            <?php } ?>		            			            
			  
			        </div>
			    </div>						
			</div>
			<div class="well well-sm text-center">
				<?=$this->Html->link('Download Image', ['controller' => 'products', 'action' => 'download_image', $data_product['Product']['id']], ['target' => '_blank'] );?>
			</div>			
			<div class="inner-main-content">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
										Detail
										<i class="fa fa-chevron-down pull-right" id="accordion-sign"></i>
								</h4>
							</div>
						</a>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?=$data_product['Product']['other_info'];?>
							</div>
						</div>
					</div>	
				</div>		
			</div>
		</div>
	</div>
</section>

<?php

	$url_get_brand = Router::url(['controller' => 'brands', 'action' => 'findby_cateogry'], true);
	$url_get_type = Router::url(['controller' => 'product_types', 'action' => 'findby_brand'], true);
	$script_list = [
		'simpleGallery/js/jquery.simpleGallery',
		'simpleGallery/js/jquery.simpleLens'
	];

	$img_loading = Router::url('/', true).'frontend/img/loading.gif';

	echo $this->Html->script($script_list, ['inline' => false, 'block' => 'customScript', 'pathPrefix' => '/plugins/']);
	echo $this->Html->scriptBlock(
			'

			    $(document).ready(function(){

				    $(\'#collapseOne\').on(\'shown.bs.collapse\', function () {
				       $("#accordion-sign").removeClass("fa-chevron-down").addClass("fa-chevron-up");
				    });

				    $(\'#collapseOne\').on(\'hidden.bs.collapse\', function () {
				       $("#accordion-sign").removeClass("fa-chevron-up").addClass("fa-chevron-down");
				    });

			        $(\'.image-area .simpleLens-thumbnails-container img\').simpleGallery({
			            loading_image: \''.$img_loading.'\',
			            show_event: \'click\'
			        });

			        $(\'.image-area .simpleLens-big-image\').simpleLens({
			            loading_image: \''.$img_loading.'\',
			            // open_lens_event: \'click\'
			        });
			    });
		
				$("#category_list").bind("change", function(){
					var category_id = $(this).val();
					$.ajax({
						url : "'.$url_get_brand.'",
						data : {"category_id" : category_id},
						dataType : "json",
						method : "post",
						beforeSend: function(e){
							$("#loader_brand").html(\'<span class="fa fa-spinner fa-spin"></span>\');
						},
						error: function(e){
							$("#loader_brand").html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

						},
						success: function(data){
							$("#loader_brand").html(\'\');
							var sel = $("#brand_list");
							var data_brand = data.brand;

							sel.empty();
						     $("#brand_list")
						         .append($("<option></option>")
						         .attr("value","")
						         .text("Pilih Brand"));

							$.each(data.brand, function(i, item){
						     $("#brand_list")
						         .append($("<option></option>")
						         .attr("value",i)
						         .text(item));
							});

						}
					});
				});

				$("#brand_list").bind("change", function(){
					var category_id = $("#category_list").val();
					var brand_id	= $(this).val();
					$.ajax({
						url : "'.$url_get_type.'",
						data : {"category_id" : category_id, "brand_id" : brand_id},
						dataType : "json",
						method : "post",
						beforeSend: function(e){
							$("#loader_type").html(\'<span class="fa fa-spinner fa-spin"></span>\');
						},
						error: function(e){
							$("#loader_type").html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

						},
						success: function(data){
							$("#loader_type").html(\'\');
							var sel = $("#type_list");
							var data_type = data.type;

							sel.empty();
							$("#type_list")
							 .append($("<option></option>")
							 .attr("value","")
							 .text("Pilih Type"));

							$.each(data.type, function(i, item){
								$("#type_list")
								 .append($("<option></option>")
								 .attr("value",i)
								 .text(item));
							});
						}
					});
				});

			',
			[
				'inline' => false,
				'block' => 'customScript'
			]

		);

?>