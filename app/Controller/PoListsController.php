<?php
	class PoListsController extends AppController {
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

			$this->Auth->allow('order');
	
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'PoList',
				'small_page_header'	=> 'Manage PoList',
				'mainkey'			=> 'po_list',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'PoList',
						'url'		=> Router::url(['controller' => 'PoList', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-PoLists"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'PoList.id' 				=> 'ID',
					'PoList.name' 				=> 'Name',
					'PoList.email' 				=> 'Email',
					'PoList.phone_number' 		=> 'Phone Number',
					'PoList.subject' 			=> 'Subject',
					'PoList.created' 			=> 'Created',
					'Actions' 					=> null,
				)
			);

			$this->DataTable->paginate = array('PoList');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'PoList',
				'small_page_header'	=> 'Tambah PoList',
				'mainkey'			=> 'po_list',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'PoLists',
						'url'		=> Router::url(['controller' => 'PoList', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-PoLists"></i> Add PoList',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->PoList->create();
				if($this->PoList->save($data))
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
				'page_header'		=> 'PoList',
				'small_page_header'	=> 'Edit PoList',
				'mainkey'			=> 'po_list',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'PoLists',
						'url'		=> Router::url(['controller' => 'PoList', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-PoLists"></i> Edit PoList',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['PoList']['id'] = $id;
				if($this->PoList->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->PoList->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'PoList',
				'small_page_header'	=> 'Tambah PoList',
				'mainkey'			=> 'po_list',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'PoLists',
						'url'		=> Router::url(['controller' => 'PoList', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-PoLists"></i> Delete PoLists',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->PoList->delete($id))
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
				if($this->PoList->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}	

		public function admin_detail($id='')
		{
			$data_page = [
				'page_header'		=> 'PoList',
				'small_page_header'	=> 'Edit PoList',
				'mainkey'			=> 'po_list',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'PoLists',
						'url'		=> Router::url(['controller' => 'PoList', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-PoLists"></i> Edit PoList',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			$data_detail = $this->PoList->findById($id);

			$this->set(compact('data_page', 'data_detail'));
		}	

		public function order()
		{
			$this->layout 		= 'frontend_sub_layout';
		    $background_data 	= '9.png';
		    $warna 				= 'green';
		    $group_id			= '2';
		    $this->set(compact('background_data','warna','group_id'));			
			# code...
			if($this->request->is('post') || $this->request->is('put')){
				if($this->PoList->validates()){
					if($this->PoList->save($this->request->data)){
						$this->Session->setFlash('Terima Kasih, data anda segera kami proses', 'green');
					}else{
						$this->Session->setFlash('Terjadi kesalahan, hubungi administrator', 'red');						
					}
				}else{
				}

				return $this->redirect(['controller' => 'po_lists', 'action' => 'order']);
			}
		}

	}
?>