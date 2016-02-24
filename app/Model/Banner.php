<?php

	class Banner extends AppModel{
		public $actsAs = array(
	        'Upload.Upload' => array(				
				'image' => array(	
					'path' => '{ROOT}webroot{DS}frontend{DS}img{DS}banner{DS}',
					'thumbnailMethod' => 'php',   
					'thumbnailPath' => '{ROOT}webroot{DS}frontend{DS}img{DS}banner{DS}',
					'fields' => array(
						'dir' => 'image_dir',
						
					),
					'thumbnailSizes' => array(
											'100h' 		=> '100h',
											'large' 	=> '1200w',
											'portait' 	=> '350w',
											'large_static' => '1300x350'
										),
					'thumbnailName' => '{size}_{geometry}_{filename}'
					
				)
			)
		);		
	}

?>