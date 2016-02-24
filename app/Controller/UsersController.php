<?php
	class UsersController extends AppController {
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
				'page_header'		=> 'User',
				'small_page_header'	=> 'Manage User',
				'mainkey'			=> 'user',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'User',
						'url'		=> Router::url(['controller' => 'user', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			$this->set(compact('data_page'));

			$this->DataTable->settings = array(
				'triggerAction' => 'admin_index',
				'columns' => array(
					'User.id'				=> 'ID',
					'User.group_id' 		=> 'Group',
					'User.fullname' 		=> 'Fullname',
					'User.username' 		=> 'Username',
					'User.created' 			=> 'Created',
					'Actions' => null,
				)
			);

			$this->DataTable->paginate = array('User');

			$this->set(compact('data_page'));
		}			

		public function admin_add() {
			$data_page = [
				'page_header'		=> 'User',
				'small_page_header'	=> 'Tambah User',
				'mainkey'			=> 'user',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Users',
						'url'		=> Router::url(['controller' => 'user', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Page',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			$this->loadModel('Group');
			$group_list = $this->Group->find('list', ['fields' => ['id', 'group_name']]);

			if($this->request->is('post'))
			{
				$data = $this->request->data;
				$this->User->create();
				if($this->User->save($data))
				{
					$this->Session->setFlash('Data berhasil tersimpan', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}
			
			$this->set(compact('data_page','group_list'));
		}

		public function admin_edit($id) {
			$data_page = [
				'page_header'		=> 'User',
				'small_page_header'	=> 'Tambah User',
				'mainkey'			=> 'user',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Users',
						'url'		=> Router::url(['controller' => 'user', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Page',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];
			
			$this->loadModel('Group');
			$group_list = $this->Group->find('list', ['fields' => ['id', 'group_name']]);

			if($this->request->is('post') || $this->request->is('put'))
			{
				$data = $this->request->data;
				$data['User']['id'] = $id;
				if($this->User->save($data))
				{
					$this->Session->setFlash('Data berhasil dirubah', 'green');
				}else{
					$this->Session->setFlash('Terdapat kesalahan dalam penyimpanan data', 'red');
				}

				return $this->redirect(['action' => 'index']);
			}else{
				$this->request->data = $this->User->read(null, $id);
			}
			
			$this->set(compact('data_page','group_list'));
		}

		public function admin_delete($id) {
			$data_page = [
				'page_header'		=> 'User',
				'small_page_header'	=> 'Tambah User',
				'mainkey'			=> 'user',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Users',
						'url'		=> Router::url(['controller' => 'user', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Page',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];

			if($this->request->is('post') || $this->request->is('put'))
			{
				if($this->User->delete($id))
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
				if($this->User->delete($id))
				{
					$output = [
						'status' => 1
					];
				}
			}


			return json_encode($output);			
		}		

		public function admin_login() {
			$this->layout = 'admin_login';
		    if ($this->request->is('post') || $this->request->is('put')) {
		        // Important: Use login() without arguments! See warning below.
		        if ($this->Auth->login()) {
		            return $this->redirect($this->Auth->redirectUrl());
		            // Prior to 2.3 use
		            // `return $this->redirect($this->Auth->redirect());`
		        }else{
			        $this->Session->setFlash(
			            __('Username or password is incorrect'),
			            'red'
			        );
		    	}
		    }
		} 	
		
		public function admin_logout() {
			return $this->redirect($this->Auth->logout());
		}	
	}
?>