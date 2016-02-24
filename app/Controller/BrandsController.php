<?php
	class BrandsController extends AppController {
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
			
			$this->Auth->allow('findby_cateogry');
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Brand',
				'small_page_header'	=> 'Manage Brand',
				'mainkey'			=> 'brand',
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
						'content' 	=> '<i class="fa fa-tags"></i> Brand',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'Brand.id' => 'ID',
					'Brand.product_group_id' 		=> 'Product Group Name',
					'Brand.brand_name' 				=> 'Name',
					'Brand.created' 				=> 'Created',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('Brand');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Brand',
				'small_page_header'	=> 'Tambah Brand',
				'mainkey'			=> 'brand',
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
						'content' 	=> '<i class="fa fa-tags"></i> Brand',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductGroup');
			$category_list = $this->ProductGroup->find('list', ['fields' => ['id', 'group_name'] ]);

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->Brand->create();
				if($this->Brand->save($data))
				{
					$this->Session->setFlash('Data berhasil tersimpan', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}
			
			$this->set(compact('data_page','category_list'));
		}

		public function admin_edit($id) {
			$data_page = [
				'page_header'		=> 'Brand',
				'small_page_header'	=> 'Edit Brand',
				'mainkey'			=> 'brand',
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
						'content' 	=> '<i class="fa fa-tags"></i> Brand',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductGroup');
			$category_list = $this->ProductGroup->find('list', ['fields' => ['id', 'group_name'] ]);

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['Brand']['id'] = $id;
				if($this->Brand->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->Brand->read(null, $id);
			}
			
			$this->set(compact('data_page', 'category_list'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Brand',
				'small_page_header'	=> 'Tambah Brand',
				'mainkey'			=> 'brand',
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
						'content' 	=> '<i class="fa fa-tags"></i> Brand',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->Brand->delete($id))
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
				if($this->Brand->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

		public function findby_cateogry()
		{
			# code...
			$this->autoRender = false;	
			$output 		= [];
			$category_id 	= $this->request->data['category_id'];
			$find_brand		= $this->Brand->find('list', ['conditions' => ['product_category_id' => $category_id], 'fields' => ['id', 'brand_name']]);
			$status 		= 1;

			if(count($find_brand) > 0){
				$status 	= 2;
			}

			$output 		= [
				'status' 	=> $status,
				'brand' 	=> $find_brand
			];

			return json_encode($output);
		}
	}
?>