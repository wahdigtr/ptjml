<?php
	class ProductGroupsController extends AppController {
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
				'page_header'		=> 'Product Group',
				'small_page_header'	=> 'Manage Category Product',
				'mainkey'			=> 'product_group',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Product',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-building"></i> Product Group',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'ProductGroup.id' => 'ID',
					'ProductGroup.group_name' => 'Name',
					'ProductGroup.created' => 'Created',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('ProductGroup');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Product Group',
				'small_page_header'	=> 'Tambah Category Product',
				'mainkey'			=> 'product_group',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Product',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-building"></i> Add Product Group',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->ProductGroup->create();
				if($this->ProductGroup->save($data))
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
				'page_header'		=> 'Product Group',
				'small_page_header'	=> 'Edit Category Product',
				'mainkey'			=> 'product_group',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Product',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-building"></i> Edit Product Group',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['ProductGroup']['id'] = $id;
				if($this->ProductGroup->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->ProductGroup->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Product Group',
				'small_page_header'	=> 'Tambah Category Product',
				'mainkey'			=> 'product_group',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Product',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-building"></i> Group',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->ProductGroup->delete($id))
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
				if($this->ProductGroup->delete($id))
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