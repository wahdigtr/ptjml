<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['Product']['id'],
	        $this->Utilities->getProductGroupData($result['Product']['product_group_id'], 'group_name'),
	        // $this->Utilities->getProductCategoryData($result['Product']['product_category_id'], 'category_name'),
	        // $this->Utilities->getBrandData($result['Product']['brand_id'], 'brand_name'),
	        // $this->Utilities->getProductTypeData($result['Product']['product_type_id'], 'type_name'),

	       	$this->Utilities->getParentPath($result['Product']['category_id']),
	        $result['Product']['product_name'],
	        $result['Product']['serial_number'],
	        $this->Utilities->getStatusProduct($result['Product']['status']),
	        '
			<div class="btn-group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li>
					'.$this->Html->link(
			        		'Input Image',
			        		[
			        			'action' => 'save_image',
			        			$result['Product']['id']
			        		]
			        	).'
					</li>					
					<li>
					'.$this->Html->link(
			        		'Detail',
			        		[
			        			'action' => 'detail',
			        			$result['Product']['id']
			        		]
			        	).'
					</li>
					<li role="separator" class="divider"></li>
					<li>
			        	'.$this->Html->link(
			        		'Edit',
			        		[
			        			'action' => 'edit',
			        			$result['Product']['id']
			        		]
			        	).'
			        </li>
			        <li>
						'.$this->Form->postLink(
			        		'Hapus',
			        		[
			        			'action' => 'delete',
			        			$result['Product']['id']
			        		],
			        		[],
			        		[
			        			'are you sure? '
			        		]
			        	).'
			        </li>
				</ul>
			</div>
	        '		
	    );
	}
?>