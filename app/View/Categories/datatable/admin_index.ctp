<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['Brand']['id'],
	        $this->Utilities->getProductCategoryData($result['Brand']['product_category_id'], 'category_name'),
	        $result['Brand']['brand_name'],
	        $result['Brand']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['Brand']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['Brand']['id']
	        		],
	        		[
	        			'class' => 'btn btn-danger'
	        		],
	        		[
	        		'are you sure? '
	        		]
	        	)

	    );
	}
?>