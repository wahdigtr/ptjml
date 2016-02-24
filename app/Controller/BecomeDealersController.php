<?php
	class BecomeDealersController extends AppController {
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
				'page_header'		=> 'Become Dealer',
				'small_page_header'	=> 'Manage Become Dealer',
				'mainkey'			=> 'become_dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Become Dealer',
						'url'		=> Router::url(['controller' => 'Become Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-BecomeDealers"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'BecomeDealer.id' 				=> 'ID',
					'BecomeDealer.name' 				=> 'Name',
					'BecomeDealer.email' 				=> 'Email',
					'BecomeDealer.phone_number' 		=> 'Phone Number',
					'BecomeDealer.subject' 			=> 'Subject',
					'BecomeDealer.created' 			=> 'Created',
					'Actions' 					=> null,
				)
			);

			$this->DataTable->paginate = array('BecomeDealer');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Become Dealer',
				'small_page_header'	=> 'Tambah BecomeDealer',
				'mainkey'			=> 'become_dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'BecomeDealers',
						'url'		=> Router::url(['controller' => 'Become Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-BecomeDealers"></i> Add BecomeDealer',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->BecomeDealer->create();
				if($this->BecomeDealer->save($data))
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
				'page_header'		=> 'Become Dealer',
				'small_page_header'	=> 'Edit BecomeDealer',
				'mainkey'			=> 'become_dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'BecomeDealers',
						'url'		=> Router::url(['controller' => 'Become Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-BecomeDealers"></i> Edit BecomeDealer',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['Become Dealer']['id'] = $id;
				if($this->BecomeDealer->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->BecomeDealer->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Become Dealer',
				'small_page_header'	=> 'Tambah BecomeDealer',
				'mainkey'			=> 'become_dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'BecomeDealers',
						'url'		=> Router::url(['controller' => 'Become Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-BecomeDealers"></i> Delete BecomeDealers',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->BecomeDealer->delete($id))
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
				if($this->BecomeDealer->delete($id))
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
				'page_header'		=> 'Become Dealer',
				'small_page_header'	=> 'Edit BecomeDealer',
				'mainkey'			=> 'become_dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'BecomeDealers',
						'url'		=> Router::url(['controller' => 'Become Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-industry"></i> Edit Become Dealer',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			$data_detail = $this->BecomeDealer->findById($id);

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
				if($this->BecomeDealer->validates()){
					if($this->BecomeDealer->save($this->request->data)){
						$this->Session->setFlash('Terima Kasih, data anda segera kami proses', 'green');
					}else{
						$this->Session->setFlash('Terjadi kesalahan, hubungi administrator', 'red');						
					}
				}else{
				}

				return $this->redirect(['controller' => 'become_dealers', 'action' => 'order']);
			}
		}

	}
?>