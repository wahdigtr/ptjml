<?php
	class ProductCategoriesController extends AppController {
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

			$this->Auth->allow('by_category');
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Product Category',
				'small_page_header'	=> 'Manage Category Product',
				'mainkey'			=> 'product_category',
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
						'content' 	=> '<i class="fa fa-cubes"></i> Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'ProductCategory.id' => 'ID',
					'ProductCategory.product_group_id' => 'Group',
					'ProductCategory.category_name' => 'Name',
					'ProductCategory.created' => 'Created',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('ProductCategory');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Product Category',
				'small_page_header'	=> 'Tambah Category Product',
				'mainkey'			=> 'product_category',
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
						'content' 	=> '<i class="fa fa-cubes"></i> Add Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductGroup');
			$group_list = $this->ProductGroup->find('list', ['fields' => ['id', 'group_name']]);
			$this->set(compact('group_list'));

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->ProductCategory->create();
				if($this->ProductCategory->save($data))
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
				'page_header'		=> 'Product Category',
				'small_page_header'	=> 'Edit Category Product',
				'mainkey'			=> 'product_category',
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
						'content' 	=> '<i class="fa fa-cubes"></i> Edit Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->loadModel('ProductGroup');
			$group_list = $this->ProductGroup->find('list', ['fields' => ['id', 'group_name']]);
			$this->set(compact('group_list'));

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['ProductCategory']['id'] = $id;
				if($this->ProductCategory->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->ProductCategory->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Product Category',
				'small_page_header'	=> 'Tambah Category Product',
				'mainkey'			=> 'product_category',
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
						'content' 	=> '<i class="fa fa-cubes"></i> Category',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->ProductCategory->delete($id))
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
				if($this->ProductCategory->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

		public function by_category($group_id, $id) {
			$this->layout = 'frontend_sub_layout';
			$this->loadModel('Product');
			$this->loadModel('Category');
			$this->loadModel('Brand');
			$this->loadModel('ProductCategory');

			$this->group_id = $group_id;
			$id_category 	=  3;
			if($this->group_id == 2){
					$id_category 	=  1;
				    $background_data = '9.png';
				    $warna = 'green';
				    $this->set(compact('background_data','warna'));
			}	
			//$list_product 	= $this->Product->find('all', ['conditions' => ['Product.product_group_id' => $this->group_id]]);
			// $list_category 	= $this->ProductCategory->find('list', [ 'fields' => ['id','category_name'],'conditions' => ['ProductCategory.product_group_id' => $this->group_id] ] );
			$find_childern 	= $this->Category->children($id, false, null, null, null, 1, 7);
			$tampung[] = $id;
			foreach ($find_childern as $key => $value) {
				# code...
				$tampung[] = $value['Category']['id'];
			}

			$category_array = ['Product.category_id' => $tampung];
			$category_data	= $this->Category->findById($id);
			$data_category	= $this->Category->children($id_category, true);
			$list_brand		= $this->Brand->find('list', ['fields' => ['id', 'brand_name'], 'conditions' => ['product_group_id' => $this->group_id]]);
			$list_category	= $this->Category->formatTreeList($data_category);

			$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' => $this->group_id, $category_array]]);
		    $this->Paginator->settings = array(
		        // 'conditions' => ["PaperSubmission.member_id" => $this->Auth->user('id')],
		        'conditions' 	=> ['Product.product_group_id' => $this->group_id, $category_array],
		        'order' 		=> ["created" => "asc"],
		        'limit' 		=> 10
		    );
		    $list_product = $this->Paginator->paginate('Product');
			$this->set(compact('product_new', 'list_product', 'list_category', 'group_id','category_data', 'list_brand'));

		}

	}
?>