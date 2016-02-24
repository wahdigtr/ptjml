<?php
	foreach ($dtResults as $result) {					
	    $this->dtResponse['aaData'][] = array(
	        $result['Banner']['id'],
	        $result['Banner']['image_dir'],
	        $result['Banner']['key_area'],
	        $this->Html->image('/frontend/img/banner/'.$result['Banner']['image_dir'].'/100h_100h_'.$result['Banner']['image']),
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['Banner']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['Banner']['id']
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