<?php
	class CategoriesController extends AppController {
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
			
			$this->Auth->allow('findby_cateogry','findby_id');
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Category',
				'small_page_header'	=> 'Manage Category',
				'mainkey'			=> 'category',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Category',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->Paginator->settings = array('order'=>'Category.lft');
			$data_paginate = $this->Paginator->paginate('Category');
			$data = $this->Category->formatTreeList($data_paginate, [
					'spacer' => '>> '
				]);

			$this->set(compact('data_page', 'data'));

		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Category',
				'small_page_header'	=> 'Tambah Category',
				'mainkey'			=> 'category',
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
						'content' 	=> '<i class="fa fa-tags"></i> Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$category_data = $this->Category->find('all', ['order' => 'Category.lft']);
			$category_list = $this->Category->formatTreeList($category_data, [
					'spacer' => '>> '
				]);


			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->Category->create();
				if($this->Category->save($data))
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
				'page_header'		=> 'Category',
				'small_page_header'	=> 'Edit Category',
				'mainkey'			=> 'category',
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
						'content' 	=> '<i class="fa fa-tags"></i> Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			]; 

			$category_data = $this->Category->find('all', ['order' => 'Category.lft']);
			$category_list = $this->Category->formatTreeList($category_data, [
					'spacer' => '>> '
				]);

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['Category']['id'] = $id;
				if($this->Category->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->Category->read(null, $id);
			}
			
			$this->set(compact('data_page', 'category_list'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Category',
				'small_page_header'	=> 'Tambah Category',
				'mainkey'			=> 'category',
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
						'content' 	=> '<i class="fa fa-tags"></i> Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->Category->delete($id))
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
				if($this->Category->delete($id))
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
			$find_category		= $this->Category->find('list', ['conditions' => ['product_category_id' => $category_id], 'fields' => ['id', 'category_name']]);
			$status 		= 1;

			if(count($find_category) > 0){
				$status 	= 2;
			}

			$output 		= [
				'status' 	=> $status,
				'category' 	=> $find_category
			];

			return json_encode($output);
		}

		public function admin_ajax_get_category()
		{
			$this->autoRender = false;
			if($this->request->is('post') || $this->request->is('put')){
				$key_path 	= 1; //EV
				$data 		= $this->request->data;
				if($data['id'] == 6){
					$key_path = 3; //CRANE
				}

				$data_category = $this->Category->children($key_path);
				$category_list = $this->Category->formatTreeList($data_category, ['spacer' => '>> ']);
				$status 	= 2;
				$message 	= 'Data categori belum dimasukan';
				if(count($data_category) > 0){
					$status 	= 1;
					$message 	= '';
				}
				$output = [
					'status' 	=> $status,
					'message' 	=> $message,
					'data'		=> $category_list,
					'key'		=> $key_path
				];				

				return json_encode($output);
			}
		}

		public function findby_id()
		{
			# code...
			$this->layout = 'ajax';
			if ($this->request->is('post') || $this->request->is('put')) {
				# code...
				$data 			= $this->request->data;
				$id 			= $data['id'];
				$data_id		= $data['data_id'] + 1;
				$first_label 	= '';

				$category_data 	= $this->Category->children($id, true);
				$list_category	= $this->Category->formatTreeList($category_data);
				$this->set(compact('list_category', 'first_label', 'data_id'));
			}
		}
	}
?>