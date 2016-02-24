<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['User']['id'],
	        $this->Utilities->getGroupData($result['User']['group_id'], 'group_name'),
	        $result['User']['fullname'],
	        $result['User']['username'],
	        $result['User']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['User']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['User']['id']
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