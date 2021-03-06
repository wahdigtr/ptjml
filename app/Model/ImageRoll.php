<?php

	class ImageRoll extends AppModel{
		public $actsAs = array(
	        'Upload.Upload' => array(				
				'image' => array(	
					'path' => '{ROOT}webroot{DS}frontend{DS}img{DS}image_roll{DS}',
					'thumbnailMethod' => 'php',   
					'thumbnailPath' => '{ROOT}webroot{DS}frontend{DS}img{DS}image_roll{DS}',
					'fields' => array(
						'dir' => 'image_dir',
						
					),
					'thumbnailSizes' => array(
											'100h' => '100h',
											'400h' => '400h',
											'lens' => '200h',
											'prod_detail' => '850w'
										),
					'thumbnailName' => '{size}_{geometry}_{filename}'
					
				)
			)
		);		
	}

?>