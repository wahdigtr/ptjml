<?php

	class ProductImage extends AppModel{
		public $actsAs = array(
	        'Upload.Upload' => array(				
				'image' => array(	
					'path' => '{ROOT}webroot{DS}frontend{DS}img{DS}products{DS}addon{DS}',
					'thumbnailMethod' => 'php',   
					'thumbnailPath' => '{ROOT}webroot{DS}frontend{DS}img{DS}products{DS}addon{DS}',
					'fields' => array(
						'dir' => 'image_dir',
						
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