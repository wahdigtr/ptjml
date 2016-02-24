<?php
	class ProductsController extends AppController {
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

			$this->Auth->allow('list_product','product_search','product_detail','detail_crane','download_image');
	
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Manage Product',
				'mainkey'			=> 'product',
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
						'content' 	=> '<i class="fa fa-truck"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'Product.id' => 'ID',
					'Product.product_group_id' 		=> 'Group',
					'Product.category_id' 			=> 'Category',
					// 'Product.product_category_id' 	=> 'Products Category',
					// 'Product.brand_id' 				=> 'Brand',
					// 'Product.product_type_id' 		=> 'Type',
					'Product.product_name' 			=> 'Name',
					'Product.serial_number' 		=> 'S/n',
					'Product.status' 				=> 'Status',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('Product');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Tambah Product',
				'mainkey'			=> 'product',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Products',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-truck"></i> Add Page',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('Category');
			$this->loadModel('ProductGroup');
			$this->loadModel('ProductType');
			$this->loadModel('Brand');

			$group_list 	= $this->ProductGroup->find('list', ['fields' => ['id', 'group_name']]);
			$category_data 	= $this->Category->find('all', ['order' => 'Category.lft']);
			$category_list 	= $this->Category->formatTreeList($category_data, ['spacer' => '>> ']);

			$type_list 		= $this->ProductType->find('list', ['fields' => ['id', 'type_name']]);
			$brand_list 	= $this->Brand->find('list', ['fields' => ['id', 'brand_name']]);

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->Product->create();
				if($this->Product->save($data))
				{
					$this->Session->setFlash('Data berhasil tersimpan', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}
			
			$this->set(compact('data_page', 'category_list', 'type_list', 'brand_list', 'group_list'));
		}

		public function admin_edit($id) {

			$this->loadModel('Category');
			$this->loadModel('ProductGroup');
			$this->loadModel('ProductType');
			$this->loadModel('Brand');

			$group_list 	= $this->ProductGroup->find('list', ['fields' => ['id', 'group_name']]);
			$category_data 	= $this->Category->find('all', ['order' => 'Category.lft']);
			$category_list 	= $this->Category->formatTreeList($category_data, ['spacer' => '>> ']);			
			$type_list 		= $this->ProductType->find('list', ['fields' => ['id', 'type_name']]);
			$brand_list 	= $this->Brand->find('list', ['fields' => ['id', 'brand_name']]);

			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Edit Product',
				'mainkey'			=> 'product',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Products',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-truck"></i> Edit Product',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['Product']['id'] = $id;
				if($this->Product->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->Product->read(null, $id);
			}
			
			$this->set(compact('data_page', 'category_list', 'type_list', 'brand_list', 'group_list'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Delete Product',
				'mainkey'			=> 'product',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Products',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-truck"></i> Delete Product',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductCategory');
			$this->loadModel('ProductType');
			$this->loadModel('Brand');

			$category_list 	= $this->ProductCategory->find('list', ['fields' => ['id', 'category_name']]);
			$type_list 		= $this->ProductType->find('list', ['fields' => ['id', 'type_name']]);
			$brand_list 	= $this->Brand->find('list', ['fields' => ['id', 'brand_name']]);
			
			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->Product->delete($id))
				{
					$this->Session->setFlash('Data berhasil dihapus', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}
			}
			
			$this->set(compact('data_page'));

			return $this->redirect(['action' => 'index']);
			
		}


		public function admin_save_image($id) {
			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Tambah Image',
				'mainkey'			=> 'product',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Products',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-truck"></i> Add Image',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('ProductImage');

			$data_detail = $this->Product->findById($id);

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_save_image',
				'conditions'	=> ['ProductImage.product_id' => $id],
				'columns' => array(
					'ProductImage.id' 			=> 'ID',
					'ProductImage.image_dir' 	=> 'Image Dir',
					'ProductImage.image' 		=> 'Image',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('ProductImage');

			if($this->request->is('post') || $this->request->is('put'))
			{
				$this->request->data['ProductImage']['product_id'] = $id;
				if($this->ProductImage->save($this->request->data))
				{
					$this->Session->setFlash('Data berhasil disimpan', 'green');
					$this->redirect(['action' => 'save_image', $id]);
				}
			}

			$this->set(compact('data_page', 'data_image', 'id', 'data_detail'));
		}

		public function admin_detail($id){

			$data_page = [
				'page_header'		=> 'Product',
				'small_page_header'	=> 'Detail',
				'mainkey'			=> 'product',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Products',
						'url'		=> Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-truck"></i> Detail',
						'url'		=> '',
						'active'	=> true,
					],
				]
			];

			$this->loadModel('ProductCategory');
			$this->loadModel('ProductImage');

			$data_product 	= $this->Product->findById($id);
			$data_image 	= $this->ProductImage->find('all', ['conditions' => ['ProductImage.product_id' => $id] ]);

			$this->set(compact('data_product','data_image','data_page'));
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
				if($this->Product->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		


		public function list_product() {

			if(isset($this->request->params['id'])){
				$this->group_id = $this->request->params['id'];
				$id_category 	=  3;
				if($this->group_id == 2){
					$id_category 	=  1;
				    $background_data = '9.png';
				    $warna = 'green';
				    $this->set(compact('background_data','warna'));
				}
			}else{
				return $this->redirect(['controller' => 'pages', 'action' => 'display', 'home_mimika']);
			}

			$this->layout = 'frontend_sub_layout';
			// $this->loadModel('ProductCategory');
			// $list_category 	= $this->ProductCategory->find('list', [ 'fields' => ['id','category_name'],'conditions' => ['ProductCategory.product_group_id' => $this->group_id] ] );
	        //'conditions' => ["PaperSubmission.member_id" => $this->Auth->user('id')],

			$this->loadModel('Category');
			$this->loadModel('Brand');


			$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' => $this->group_id]]);
			$data_category	= $this->Category->children($id_category, true);
			$list_category	= $this->Category->formatTreeList($data_category);
			$list_brand		= $this->Brand->find('list', ['fields' => ['id', 'brand_name'], 'conditions' => ['product_group_id' => $this->group_id]]);
		    $this->Paginator->settings = array(
		        'conditions' 	=> ['Product.product_group_id' => $this->group_id],
		        'order' 		=> ["created" => "asc"],
		        'limit' 		=> 8
		    );
		    $list_product 	= $this->Paginator->paginate('Product');
		    $group_id 		= $this->group_id;
			$this->set(compact('product_new', 'list_product', 'list_category','group_id', 'list_brand'));

		}

		public function product_search() {
			$this->loadModel('ProductCategory');
			$this->loadModel('Category');
			$this->loadModel('Brand');
			$this->layout = 'frontend_sub_layout';

			$category_array 	= [];
			$brand_array		= [];
			$type_array 		= [];

			if(isset($_GET['category']) && !empty($_GET['category'])){
				$filter_data 	= $_GET['category'];
				$jml			= count($filter_data);
				$index_data		= $jml-1;
				$data_category	= $filter_data[$index_data];
				if(empty($data_category)){
					$index_data		= $jml-2;
					$data_category	= $filter_data[$index_data];
				}

				$find_childern 	= $this->Category->children($data_category, false, null, null, null, 1, 7);
				$tampung[] = $data_category;
				foreach ($find_childern as $key => $value) {
					# code...
					$tampung[] = $value['Category']['id'];
				}

				$category_array = ['category_id' => $tampung];				
			}	

			if(isset($_GET['brand']) && !empty($_GET['brand'])){
				$brand_array 	= ['brand_id' =>$_GET['brand']];
			}

			if(isset($_GET['type']) && !empty($_GET['type'])){
				$type_array 	= ['product_type_id' =>$_GET['type']];
			}

			$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' =>  $this->group_id]]);
			$group_id 	 	= $_GET['group_id'];
			$this->group_id = $group_id;
			$id_category 	=  3;
			if($this->group_id == 2){
					$id_category 	=  1;
				    $background_data = '9.png';
				    $warna = 'green';
				    $this->set(compact('background_data','warna'));
			}
			$list_product 	= $this->Product->find('all', ['conditions' => ['Product.product_group_id' =>  $_GET['group_id'], $category_array, $brand_array, $type_array]]);
			$data_category	= $this->Category->children($id_category, true);
			$list_category	= $this->Category->formatTreeList($data_category);
			$list_brand		= $this->Brand->find('list', ['fields' => ['id', 'brand_name'], 'conditions' => ['product_group_id' => $this->group_id]]);
			$this->set(compact('product_new', 'list_product', 'list_category','group_id', 'list_brand'));
		}

		public function product_detail($id) {
			$this->loadModel('ProductCategory');
			$this->loadModel('ProductImage');
			$this->layout = 'frontend_sub_layout';

			$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' =>  $this->group_id]]);
			$data_product 	= $this->Product->findById($id);
			$group_id 		= $data_product['Product']['product_group_id'];
			if($group_id == 2){
			    $background_data = '9.png';
			    $warna = 'green';
			    $this->set(compact('background_data','warna'));
			}				
			$data_image 	= $this->ProductImage->find('all', ['conditions' => ['ProductImage.product_id' => $id] ]);
			$list_category 	= $this->ProductCategory->find('list', [ 'fields' => ['id','category_name'],'conditions' => ['ProductCategory.product_group_id' => $group_id] ] );

			$this->set(compact('product_new', 'data_product', 'list_category','data_image','group_id'));
		}		

		public function detail_crane($id) {
			$this->loadModel('ProductCategory');
			$this->loadModel('ProductImage');
			$this->layout = 'frontend_sub_layout';

			$data_product 	= $this->Product->findById($id);
			$group_id 		= $data_product['Product']['product_group_id'];
			if($group_id == 2){
			    $background_data = '9.png';
			    $warna = 'green';
			    $this->set(compact('background_data','warna'));
			}			
			$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' =>  $this->group_id]]);
			$data_image 	= $this->ProductImage->find('all', ['conditions' => ['ProductImage.product_id' => $id] ]);
			$list_category 	= $this->ProductCategory->find('list', [ 'fields' => ['id','category_name'],'conditions' => ['ProductCategory.product_group_id' => $group_id] ] );
			$this->set(compact('product_new', 'data_product', 'list_category','data_image','group_id'));
		}

		public function download_image($product_id){
			// $this->autoRender = false;
			$this->loadModel('ProductImage');

			$data_product 	= $this->Product->findById($product_id);
			$nama_clear		= urlencode($data_product['Product']['product_name']).'.zip';
			$dest 			= WWW_ROOT.'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$nama_clear;
			$url_dest		= Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$nama_clear;
			if(!is_file($dest)){


				$data_image 	= $this->ProductImage->find('all', ['conditions' => ['ProductImage.product_id' => $product_id] ]);
				$tampung_image 	= [
					0 => WWW_ROOT.'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$data_product['Product']['cover']
				];

				$no = 1;
				foreach ($data_image as $key => $value) {
					# code...
					$tampung_image[$no] = WWW_ROOT.'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/'.$value['ProductImage']['image'];
					$no++;
				}

				$bikin_zip = $this->Utilities->create_zip($tampung_image, $dest, false);
			}

			return $this->redirect($url_dest);
		}
	}
?>