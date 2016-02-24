		<?php if(count($list_category) > 0){ ?>
			<div class="form-group search_area_item" id="area_<?=$data_id;?>">
				<label><?='';?></label>
				<div class="">
					<?=$this->Form->input('category[]', ['class' => 'form-control input-sm category', 'div' => false, 'label' => false, 'options' => $list_category, 'empty' => 'Pilih Kategori', 'id' => 'category_list', 'data-id' => $data_id, 'name' => 'category[]']);?>
					 <div id="loader_brand_0"></div>
				</div>
			</div>
		<?php } ?>