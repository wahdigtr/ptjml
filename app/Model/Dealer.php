<?php

	class Dealer extends AppModel{
		public $actsAs = array(
	        'Upload.Upload' => array(				
				'picture' => array(	
					'path' => '{ROOT}webroot{DS}frontend{DS}img{DS}dealer{DS}',
					'thumbnailMethod' => 'php',   
					'thumbnailPath' => '{ROOT}webroot{DS}frontend{DS}img{DS}dealer{DS}',
					'fields' => array(
						'dir' => 'picture_dir',
						
					),
					'thumbnailSizes' => array(
											'100h' => '100h',
											'200x' => '200x200',
											'lens' => '200h',
											'prod_detail' => '850w'
										),
					'thumbnailName' => '{size}_{geometry}_{filename}'
					
				)
			)
		);		
	}

?>