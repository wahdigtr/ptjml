<?php

	class Product extends AppModel{
		public $actsAs = array(
	        'Upload.Upload' => array(				
				'cover' => array(	
					'path' => '{ROOT}webroot{DS}frontend{DS}img{DS}products{DS}',
					'thumbnailMethod' => 'php',   
					'thumbnailPath' => '{ROOT}webroot{DS}frontend{DS}img{DS}products{DS}',
					'fields' => array(
						'dir' => 'cover_dir',
						
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