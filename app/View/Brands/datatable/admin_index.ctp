<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['Brand']['id'],
	        $this->Utilities->getProductGroupData($result['Brand']['product_group_id'], 'group_name'),
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