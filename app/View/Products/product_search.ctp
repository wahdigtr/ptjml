<?php
	
	$style_list = ['sidebar/styles'];

	echo $this->Html->css($style_list, ['inline' => false, 'pathPrefix' => '/plugin/', 'block' => 'cssPlugin']);
?>

<section class="wrapper white-bg home-description content-area">
	<div class="inner-content clearfix">
		<div class="col-3">
			<div class="multiple-menu">
	            <ul class="">
					<?php
						if(count($list_category) > 0){
							// echo '<div class="list-group">';
							$tampung = [];
							foreach ($list_category as $key => $value) {
								echo '<li>';
								echo $this->Html->link($value, [
										'controller' 	=> 'products', 
										'action'		=> 'by_category',
										$key
									]);
								$tampung = $this->Utilities->getChildernArray($key);
								if(count($tampung) > 0){
									echo '<ul>';
									foreach ($tampung as $k => $v) {
										# code...
										echo '<li>';
										echo $this->Html->link($v['Category']['name'], [
												'controller' 	=> 'product_categories', 
												'action'		=> 'by_category',
												$group_id,
												$v['Category']['id']
											]);
										$t = $this->Utilities->getChildernArray($v['Category']['id']);
										if(count($t) > 0){
											echo '<ul>';
											foreach ($t as $k => $v) {
												# code...
												echo '<li>';
												echo $this->Html->link($v['Category']['name'], [
														'controller' 	=> 'product_categories', 
														'action'		=> 'by_category',
														$group_id,
														$v['Category']['id']
													]);
												echo '</li>';
											}
											echo '</ul>';
										}

										echo '</li>';

									}
									echo '</ul>';
								}
								echo '<li>';
								# code...
								// echo $this->Html->link(
								// 		$value,[
								// 			'controller' 	=> 'product_categories',
								// 			'action'		=> 'by_category',
								// 			$group_id,
								// 			$key
								// 		],[
								// 			'class'			=> "list-group-item",								
								// 		]
								// 	);
							}
							// echo '</div>';
							// pr($list_category);

						}
						$list_type		= [];
						$first_label 	= 'Category';
					?>

	            </ul>
	        </div>

			<div class="well">
				<?=$this->Form->create(null, ['url' => ['action' => 'product_search'], 'type' => 'get']);?>
					<?=$this->Form->hidden('group_id', ['value' => $group_id]);?>
					<div class="search_area">
						<div class="form-group">
							<label><?=$first_label;?></label>
							<div class="">
								<?=$this->Form->input('category[]', ['class' => 'form-control input-sm category', 'div' => false, 'label' => false, 'options' => $list_category, 'empty' => 'Pilih Kategori', 'required', 'id' => 'category_list', 'data-id' => 0]);?>
								 <div id="loader_brand_0"></div>
							</div>
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
				<h3>Last Update Product</h3>
			</div>
			<?php
				if(count($list_product) > 0){
					foreach ($list_product as $key => $value) {
						# code...
						switch ($group_id) {
							case '2':
								# code...
								$action = 'product_detail';
								break;
							case '6':
								# code...
								$action = 'detail_crane';
								break;
							
							default:
								# code...
								$action = 'product_detail';
								break;
						}
						$slug = rawurlencode($value['Product']['product_name']);
						$url_product = Router::url(['controller' => 'products', 'action' => $action, 'id' => $value['Product']['id'], 'slug' => $slug], true);
						echo '
							<div class="col-sm-3 product-item">
								<a href="'.$url_product.'">
									<div class="thumbnail">
										'.$this->Html->image('/frontend/img/products/'.$value['Product']['cover_dir'].'/200x_200x200_'.$value['Product']['cover'], ['class' => 'img-responsive']).'
										<div class="caption">
											<h5>'.$value["Product"]["product_name"].'<br />
											<small>'.$this->Utilities->getParentPath($value["Product"]["category_id"], 0 ).'</small></h5>
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
				}else{
			?>
				<div class="col-md-12">
					<div class="alert alert-warning" role="alert">Data tidak ditemukan</div>
				</div>
			<?php
				}
			?>
		</div>
	</div>
</section>
<?php
	
	$script_list = ['sidebar/script'];

	echo $this->Html->script($script_list, ['inline' => false, 'pathPrefix' => '/plugin/', 'block' => 'cssPlugin']);

	$url_get_category = Router::url(['controller' => 'categories', 'action' => 'findby_id'], true);
	$url_get_type = Router::url(['controller' => 'product_types', 'action' => 'findby_brand'], true);

	echo $this->Html->scriptBlock(
			'
				$(\'.child\').hide(); //Hide children by default

		        $(\'.parent\').children().click(function () {
		            event.preventDefault();
		            $(this).children(\'.child\').slideToggle(\'slow\');
		            $(this).find(\'span\').toggle();
		        });

				// $("#category_list").bind("change", function(){
				// 	var category_id = $(this).val();
				// 	$.ajax({
				// 		url : "'.$url_get_category.'",
				// 		data : {"category_id" : category_id},
				// 		dataType : "json",
				// 		method : "post",
				// 		// beforeSend: function(e){
				// 		// 	$("#loader_brand").html(\'<span class="fa fa-spinner fa-spin"></span>\');
				// 		// },
				// 		// error: function(e){
				// 		// 	$("#loader_brand").html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

				// 		// },
				// 		// success: function(data){
				// 		// 	$("#loader_brand").html(\'\');
				// 		// 	var sel = $("#brand_list");
				// 		// 	var data_brand = data.brand;

				// 		// 	sel.empty();
				// 		//      $("#brand_list")
				// 		//          .append($("<option></option>")
				// 		//          .attr("value","")
				// 		//          .text("Pilih Brand"));

				// 		// 	$.each(data.brand, function(i, item){
				// 		//      $("#brand_list")
				// 		//          .append($("<option></option>")
				// 		//          .attr("value",i)
				// 		//          .text(item));
				// 		// 	});

				// 		// }
				// 		beforeSend: function(e){
				// 			$("#loader_brand_"+data_id).html(\'<span class="fa fa-spinner fa-spin"></span>\');
				// 		},
				// 		error: function(e){
				// 			$("#loader_brand_"+data_id).html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

				// 		},
				// 		success: function(data){
				// 			$("#loader_brand_"+data_id).html(\'\');


				// 		}
				// 	});
				// });

				$(document).on("change", ".category", function(){
					var id 			= $(this).val();
					var data_id 	= $(this).data("id");
					if(id != ""){
						$.ajax({
							url: "'.$url_get_category.'",
							method: "POST",
							data: {"id" : id, "data_id" : data_id},
							dataType: "html",
							beforeSend: function(e){
								//$("#loader_brand_"+data_id).html(\'<span class="fa fa-spinner fa-spin"></span>\');
							},
							error: function(e){
								$("#loader_brand_"+data_id).html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

							},
							success: function(data){
								$("#loader_brand_"+data_id).html(\'\');
								var new_id = data_id + 1;
								if ( $( "#area_"+new_id ).length ) {
								 	$("#area_"+new_id).remove();							 
								}

								$(".search_area").append(data);
							}
						});
					}else{
						var new_id = data_id + 1;
						var jumlah = $(".search_area_item").length;
						for (i = jumlah; i > 0; i--) {
							if(i > data_id){
								if ( $( "#area_"+i ).length ) {
								 	$("#area_"+i).remove();							 
								}						
							}
						}					

						// if ( $( "#area_"+new_id ).length ) {
						//  	$("#area_"+new_id).remove();							 
						// }						
					}
				})

				$("#brand_list").bind("change", function(){
					var category_id = $("#category_list").val();
					var brand_id	= $(this).val();
					if(category_id != "" ){
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
					}
				});

			',
			[
				'inline' => false,
				'block' => 'customScript'
			]

		);

?>