<section class="wrapper white-bg home-description content-area">
	<div class="content-header ">
		<h4>List Product</h4>
	</div>
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
			<?php
				if(count($list_product) > 0){
					foreach ($list_product as $key => $value) {
						# code...
						$url_product = Router::url(['controller' => 'products', 'action' => 'product_detail', $value['Product']['id']], true);
						echo '
							<div class="col-sm-3 product-item">
								<a href="'.$url_product.'">
									<div class="thumbnail">
										'.$this->Html->image('/frontend/img/products/'.$value['Product']['cover_dir'].'/200x_200x200_'.$value['Product']['cover'], ['class' => 'img-responsive']).'
										<div class="caption">
											<h5>'.$value["Product"]["product_name"].'<br />
											<small>'.$this->Utilities->getProductTypeData($value["Product"]["product_type_id"], 'type_name').'</small></h5>
										</div>
									</div>	
								</a>								
							</div>
						';
					}
			?>
	    		<div class="col-md-12">
				    <ul class="pagination">
				        <?php
				            echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
				            echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				        ?>
				    </ul>		    
				</div>			
			<?php
				}
			?>
		</div>
	</div>
</section>

<?php

	$url_get_brand = Router::url(['controller' => 'brands', 'action' => 'findby_cateogry'], true);
	$url_get_type = Router::url(['controller' => 'product_types', 'action' => 'findby_brand'], true);

	echo $this->Html->scriptBlock(
			'
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