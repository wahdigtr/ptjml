<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['ProductImage']['id'],
	        $result['ProductImage']['image_dir'],
	        $this->Html->image('/frontend/img/products/addon/'.$result['ProductImage']['image_dir'].'/100h_100h_'.$result['ProductImage']['image'], ['width' => 150]),
	        '
			<div class="btn-group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
			        <li>
						'.$this->Form->postLink(
			        		'Hapus',
			        		[
			        			'controller' => 'product_images',
			        			'action' => 'delete_image',
			        			$result['ProductImage']['id']
			        		],[
			        			'are you sure?'
			        		]
			        	).'
			        </li>
				</ul>
			</div>
	        '		
	    );
	}
?>