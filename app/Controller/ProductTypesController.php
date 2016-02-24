<?php
	class ProductTypesController extends AppController {
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

			$this->Auth->allow('findby_brand');
	
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Product Type',
				'small_page_header'	=> 'Manage Type Product',
				'mainkey'			=> 'product_type',
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
						'content' 	=> '<i class="fa fa-gears"></i> Type',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'ProductType.id' => 'ID',
					'ProductType.product_category_id' 	=> 'Product Category Name',
					'ProductType.brand_id' 				=> 'Brand Name',
					'ProductType.type_name' 			=> 'Name',
					'ProductType.created' 				=> 'Created',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('ProductType');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Product Type',
				'small_page_header'	=> 'Tambah Type Product',
				'mainkey'			=> 'product_type',
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
						'content' 	=> '<i class="fa fa-gears"></i> Type',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductCategory');
			$category_list = $this->ProductCategory->find('list', ['fields' => ['id', 'category_name'] ]);

			$this->loadModel('Brand');
			$brand_list = $this->Brand->find('list', ['fields' => ['id', 'brand_name'] ]);	

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->ProductType->create();
				if($this->ProductType->save($data))
				{
					$this->Session->setFlash('Data berhasil tersimpan', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}
			
			$this->set(compact('data_page', 'category_list', 'brand_list'));
		}

		public function admin_edit($id) {
			$data_page = [
				'page_header'		=> 'Product Type',
				'small_page_header'	=> 'Edit Type Product',
				'mainkey'			=> 'product_type',
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
						'content' 	=> '<i class="fa fa-gears"></i> Type',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			$this->loadModel('ProductCategory');
			$category_list = $this->ProductCategory->find('list', ['fields' => ['id', 'category_name'] ]);

			$this->loadModel('Brand');
			$brand_list = $this->Brand->find('list', ['fields' => ['id', 'brand_name']]);
			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['ProductType']['id'] = $id;
				if($this->ProductType->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->ProductType->read(null, $id);
			}
			
			$this->set(compact('data_page', 'category_list', 'brand_list'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Product Type',
				'small_page_header'	=> 'Tambah Type Product',
				'mainkey'			=> 'product_type',
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
						'content' 	=> '<i class="fa fa-gears"></i> Type',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->ProductType->delete($id))
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
				if($this->ProductType->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

		public function findby_brand()
		{
			# code...
			$this->autoRender = false;	
			$output 		= [];
			$brand_id 		= $this->request->data['brand_id'];
			$find_type		= $this->ProductType->find('list', ['conditions' => ['brand_id' => $brand_id], 'fields' => ['id', 'type_name']]);
			$status 		= 1;

			if(count($find_type) > 0){
				$status 	= 2;
			}

			$output 		= [
				'status' 	=> $status,
				'type' 		=> $find_type
			];

			return json_encode($output);
		}
	}
?>