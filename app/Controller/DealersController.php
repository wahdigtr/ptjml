<?php
	class DealersController extends AppController {
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
	
			$this->Auth->allow('all');
		}

		public function admin_index() {
			$data_page = [
				'page_header'		=> 'Dealer',
				'small_page_header'	=> 'Manage Dealer',
				'mainkey'			=> 'dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Dealer',
						'url'		=> Router::url(['controller' => 'Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-Dealers"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'Dealer.id' 				=> 'ID',
					'Dealer.picture_dir' 		=> 'picture dir',
					'Dealer.picture' 			=> 'Picture',
					'Dealer.product_group_id' 	=> 'Group',
					'Dealer.dealer_name' 		=> 'Dealers Name',
					'Dealer.address' 			=> 'Address',
					'Dealer.created' 			=> 'Created',
					'Actions' 				=> null,
				)
			);

			$this->DataTable->paginate = array('Dealer');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'Dealer',
				'small_page_header'	=> 'Tambah Dealer',
				'mainkey'			=> 'dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Dealers',
						'url'		=> Router::url(['controller' => 'Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-Dealers"></i> Add Dealer',
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
				$this->Dealer->create();
				if($this->Dealer->save($data))
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
				'page_header'		=> 'Dealer',
				'small_page_header'	=> 'Edit Dealer',
				'mainkey'			=> 'dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Dealers',
						'url'		=> Router::url(['controller' => 'Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-Dealers"></i> Edit Dealer',
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
				$data['Dealer']['id'] = $id;
				if($this->Dealer->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->Dealer->read(null, $id);
			}
			
			$this->set(compact('data_page'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'Dealer',
				'small_page_header'	=> 'Tambah Dealer',
				'mainkey'			=> 'dealer',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Dealers',
						'url'		=> Router::url(['controller' => 'Dealer', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-Dealers"></i> Delete Dealers',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->Dealer->delete($id))
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
				if($this->Dealer->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

		public function all($group_id) {
			$this->layout = 'frontend_sub_layout';			
		    $background_data 	= $this->background_data;
		    $warna 				= $this->warna;		
			if($group_id == 2){
			    $background_data 	= '9.png';
			    $warna 				= 'green';				
			}
			$data_dealer = $this->Dealer->find('all',[
					'conditions' => [
						'product_group_id' => $group_id
					]
				]);
 			$this->set(compact('data_dealer','background_data','warna','group_id'));
		}

	}
?>