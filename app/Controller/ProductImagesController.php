<?php

	class ProductImagesController extends AppController{
		
		public function admin_delete_image($id)
		{
			# code...
			if($this->request->is('post') || $this->request->is('put')){
				$this->ProductImage->id = $id;

				if($this->ProductImage->exists())
				{
					$data = $this->ProductImage->findById($id);
					if($this->ProductImage->delete()){	
						$dir = WWW_ROOT.'frontend/img/products/addon/'.$id;
						if(is_dir($dir)){
							$this->deleteDir($dir);
						}	
										
						$this->Session->setFlash('Data Berhasil Terhapus', 'green');
					}
				}

			}

			return $this->redirect(['controller' => 'products', 'action' => 'save_image', $data['ProductImage']['product_id'], 'admin' => true]);
		}

		public static function deleteDir($dirPath) {
		    if (! is_dir($dirPath)) {
		        throw new InvalidArgumentException("$dirPath must be a directory");
		    }
		    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		        $dirPath .= '/';
		    }
		    $files = glob($dirPath . '*', GLOB_MARK);
		    foreach ($files as $file) {
		        if (is_dir($file)) {
		            self::deleteDir($file);
		        } else {
		            unlink($file);
		        }
		    }
		    rmdir($dirPath);
		}						

	}

?>