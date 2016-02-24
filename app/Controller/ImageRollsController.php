<?php
	class ImageRollsController extends AppController {
		public $components = array(
			'DataTable.DataTable',
		);
		
		public $helpers = array(
			'DataTable.DataTable'
		);

		public function beforeFilter() {
		    parent::beforeFilter();

		    if($this->request->prefix == "admin"){

			}
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Data Image Roll',
				'small_page_header'	=> 'Manage Data Image Roll',
				'mainkey'			=> 'image_roll',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Image Rolls',
						'url'		=> Router::url(['controller' => 'data_pages', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-file-text"></i> Image Roll',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'ImageRoll.id' 			=> 'ID',
					'ImageRoll.image_dir' 	=> 'Image Dir',
					'ImageRoll.image' 		=> 'Image',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('ImageRoll');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Data Image Roll',
				'small_page_header'	=> 'Tambah Data Image Roll',
				'mainkey'			=> 'image_roll',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Image Rolls',
						'url'		=> Router::url(['controller' => 'image_rolls', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-file-text"></i> Add Image Roll',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->ImageRoll->create();
				if($this->ImageRoll->save($data))
				{
					$this->Session->setFlash('Data berhasil tersimpan', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_edit($id) {
			$data_page = [
				'page_header'		=> 'Data Image Roll',
				'small_page_header'	=> 'Tambah Data Image Roll',
				'mainkey'			=> 'image_roll',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Image Rolls',
						'url'		=> Router::url(['controller' => 'image_roll', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-file-text"></i> Edit Image Roll',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['ImageRoll']['id'] = $id;
				if($this->ImageRoll->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->ImageRoll->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Data Image Roll',
				'small_page_header'	=> 'Edit Data Image Roll',
				'mainkey'			=> 'image_roll',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Image Rolls',
						'url'		=> Router::url(['controller' => 'image_roll', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-file-text"></i> Delete Image Roll',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->ImageRoll->delete($id))
				{
					$this->Session->setFlash('Data berhasil dihapus', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}
			}
			
			$this->set(compact('data_page'));

			return $this->redirect(['action' => 'index']);
			
		}

		public function admin_delete_tag() {
			$this->autoRender = false;
			$output = [
				'status' => 2
			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data 	= $this->request->data;
				$id 	= $data['id']; 
				if($this->ImageRoll->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

	}
?>