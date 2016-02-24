<?php
	foreach ($dtResults as $result) {		

	    $this->dtResponse['aaData'][] = array(
	        $result['PoList']['id'],
	        $result['PoList']['name'],
	        $result['PoList']['email'],
	        $result['PoList']['phone_number'],
	        $result['PoList']['subject'],
	        $result['PoList']['created'],
				$this->Html->link(
	        		'Detail',
	        		[
	        			'action' => 'detail',
	        			$result['PoList']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
	        	'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['PoList']['id']
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