<?php
	foreach ($dtResults as $result) {			

	    $this->dtResponse['aaData'][] = array(
	        $result['Dealer']['id'],
	        $result['Dealer']['picture_dir'],
	        $this->Html->image('/frontend/img/dealer/'.$result['Dealer']['picture_dir'].'/200x_200x200_'.$result['Dealer']['picture']),
	        $this->Utilities->getProductGroupData($result['Dealer']['product_group_id'],'group_name'),
	        $result['Dealer']['dealer_name'],
	        $result['Dealer']['address'],
	        $result['Dealer']['created'],
				$this->Html->link(
	        		'Edit',
	        		[
	        			'action' => 'edit',
	        			$result['Dealer']['id']
	        		],
	        		[
	        			'class' => 'btn btn-success'
	        		]
	        	).'
				'.$this->Form->postLink(
	        		'Hapus',
	        		[
	        			'action' => 'delete',
	        			$result['Dealer']['id']
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