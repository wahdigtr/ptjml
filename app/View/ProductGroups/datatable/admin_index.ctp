<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['ProductGroup']['id'],
	        $result['ProductGroup']['group_name'],
	        $result['ProductGroup']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['ProductGroup']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['ProductGroup']['id']
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