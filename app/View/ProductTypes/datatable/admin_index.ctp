<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['ProductType']['id'],
	        $this->Utilities->getProductCategoryData($result['ProductType']['product_category_id'],'category_name'),
	        $this->Utilities->getBrandData($result['ProductType']['brand_id'], 'brand_name'),
	        $result['ProductType']['type_name'],
	        $result['ProductType']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['ProductType']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['ProductType']['id']
	        		],
	        		[
	        			'class' => 'btn btn-danger'
	        		],[
	        		'are you sure?'
	        		]
	        	)

	    );
	}
?>