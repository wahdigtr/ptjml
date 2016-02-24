<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['DataPage']['id'],
	        $result['DataPage']['page_key'],
	        $result['DataPage']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['DataPage']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['DataPage']['id']
	        		],
	        		[
	        			'class' => 'btn btn-danger'
	        		],
	        		[
	        			'are you sure?'
	        		]
	        	)

	    );
	}
?>