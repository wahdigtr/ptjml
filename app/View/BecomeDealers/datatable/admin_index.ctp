<?php
	foreach ($dtResults as $result) {		

	    $this->dtResponse['aaData'][] = array(
	        $result['BecomeDealer']['id'],
	        $result['BecomeDealer']['name'],
	        $result['BecomeDealer']['email'],
	        $result['BecomeDealer']['phone_number'],
	        $result['BecomeDealer']['subject'],
	        $result['BecomeDealer']['created'],
				$this->Html->link(
	        		'Detail',
	        		[
	        			'action' => 'detail',
	        			$result['BecomeDealer']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
	        	'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['BecomeDealer']['id']
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