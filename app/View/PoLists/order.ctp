<?php
	$style_list = [
		'simpleGallery/css/jquery.simpleGallery',
		'simpleGallery/css/jquery.simpleLens'
	];

	echo $this->Html->css($style_list, ['inline' => false, 'block' => 'cssCustom', 'pathPrefix' => '/plugins/']);
?>
<section class="wrapper white-bg home-description content-area">
	<div class="inner-content clearfix">
		<h3>Pre Order</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu ipsum vitae dui pretium tempus sit amet ut orci. Fusce dapibus rutrum odio, in elementum quam gravida eu. Curabitur viverra sem vitae dui maximus, rhoncus placerat velit pulvinar. Morbi eu massa est. Phasellus vel turpis eget neque ornare convall</p>
		<div class="row">
			<div class="col-sm-12">
				<?=$this->Session->flash();?>
			</div>
			<div class="col-sm-8">
				<?=$this->Form->create('PoList');?>
					<div class="form-group">
						<label>Name</label>
						<div>
							<?=$this->Form->input('name', ['label' => false, 'div' => false, 'placeholder' => 'Input nama anda', 'class' => 'form-control input-sm', 'required']);?>
						</div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<div>
							<?=$this->Form->input('email', ['label' => false, 'div' => false, 'placeholder' => 'Input email anda', 'class' => 'form-control input-sm', 'required']);?>
						</div>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<div>
							<?=$this->Form->input('phone_number', ['label' => false, 'div' => false, 'placeholder' => 'Input nomor handphone anda', 'class' => 'form-control input-sm', 'required']);?>
						</div>
					</div>
					<div class="form-group">
						<label>Subject</label>
						<div>
							<?=$this->Form->input('subject', ['label' => false, 'div' => false, 'placeholder' => 'Input Subject', 'class' => 'form-control input-sm', 'required']);?>
						</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<div>
							<?=$this->Form->textarea('description', ['label' => false, 'div' => false, 'placeholder' => 'Input kebutuhan anda disini', 'class' => 'form-control input-sm', 'required']);?>
						</div>
					</div>
					<div class="form-group text-right">
						<?=$this->Form->submit('Proses', ['label' => false, 'div' => false, 'class' => 'btn btn-primary btn-lg']);?>
					</div>
				<?=$this->Form->end();?>
			</div>
			<div class="col-sm-4">

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