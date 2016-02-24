<?php

	class DataContactsController extends AppController{

		public function beforeFilter() {
		    parent::beforeFilter();

		    if($this->request->prefix == "admin"){

			}
			
			$this->Auth->allow('new_data');
		}

		public function new_data()
		{
			# code...
			$this->autoRender = false;

			if($this->request->is('post') || $this->request->is('put')){
				if($this->DataContact->save($this->request->data)){
					$this->Session->setFlash("Data berhasil terkirim, mohon tunggu administrator akan segera memberikan feedback", 'green');
				}
			}

			return $this->redirect(['controller' => 'pages', 'action' => 'display', 'contact_us']);
		}

	}

?>