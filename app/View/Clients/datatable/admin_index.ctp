<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['Client']['id'],
	        $result['Client']['image_dir'],
	        $this->Html->image('/frontend/img/client/'.$result['Client']['image_dir'].'/100h_100h_'.$result['Client']['image']),
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['Client']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['Client']['id']
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