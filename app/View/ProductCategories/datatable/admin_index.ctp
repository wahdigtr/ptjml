<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['ProductCategory']['id'],
	        $this->Utilities->getProductGroupData($result['ProductCategory']['product_group_id'], 'group_name'),
	        $result['ProductCategory']['category_name'],
	        $result['ProductCategory']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['ProductCategory']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['ProductCategory']['id']
	        		],
	        		[
	        			'class' => 'btn btn-danger'
	        		],[
	        		'are you sure? '
	        		]
	        	)

	    );
	}
?>