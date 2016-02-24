<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['ImageRoll']['id'],
	        $result['ImageRoll']['image_dir'],
	        $this->Html->image('/frontend/img/image_roll/'.$result['ImageRoll']['image_dir'].'/100h_100h_'.$result['ImageRoll']['image']),
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['ImageRoll']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['ImageRoll']['id']
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