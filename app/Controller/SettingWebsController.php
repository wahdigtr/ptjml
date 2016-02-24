<?php

	class SettingWebsController extends AppController {


		public function beforeFilter() {
		    parent::beforeFilter();

		    if($this->request->prefix == "admin"){

			    	$data_head = [
						'title_page' => 'Web Setting'
					];
					$active_menu = 'other';

					$this->set(compact('data_head', 'active_menu'));

			}
	
		}

		public function admin_index(){

			$data_page = [
				'page_header'		=> 'Web Setting',
				'small_page_header'	=> 'Manage Web Setting',
				'mainkey'			=> 'other',
				'breadcrumb' 		=> [
					'0' => [
						'content' 	=> 'Home',
						'url'		=> Router::url("/", true),
						'active'	=> false,
					],
					'1' => [
						'content' 	=> 'Web Setting',
						'url'		=> Router::url(['controller' => 'web_settings', 'action' => 'index', 'admin' => true], true),
						'active'	=> false,
					],
					'2' => [
						'content' 	=> '<i class="fa fa-tags"></i> Index',
						'url'		=> '',
						'active'	=> true,
					],
				]

			];


			if($this->request->is('post') || $this->request->is('put'))
			{
				$data 		= $this->request->data;
				$data_save 	= array();

				foreach ($data as $key => $value) {
					# code...
					foreach ($value as $k => $val) {
						# code...

						$find_id 	 	= $this->WebSetting->find("first", array("conditions" =>array("WebSetting.key_setting" => $key.".".$k)));
						$id_setting		= "";
						if(isset($find_id['WebSetting']['id']))
						{
							$id_setting = $find_id['WebSetting']['id'];
						}

						if(is_array($val)){

							$filename = basename($val['name']);
							if(!empty($filename)){
								
								// $filename = basename($filename);
							    $filePath 	= WWW_ROOT . 'frontend' . DS . 'img' . DS . 'logos' . DS .  $filename;
							    $dir 		= WWW_ROOT . 'frontend' . DS . 'img' . DS . 'logos';
							    if(!is_dir($dir)){
							    	mkdir($dir);
							    } 

							    move_uploaded_file(
							        $val['tmp_name'],
							        $filePath
							    );
							    $val = $filename;
							}else{
								if(isset($find_id['WebSetting'])){
									$val = $find_id['WebSetting']['value_setting'];
								}
							}
							//pr($find_id);
						}
						$data_save[] = array( "id" => $id_setting, "key_setting" => $key.".".$k, "value_setting" => $val );
					}
					
				}
				//pr($data_save);
				$this->WebSetting->saveAll($data_save);
				$this->Session->setFlash(__('Data %s has been edited', array('WebSetting')), 'green');
				$this->redirect(array('action' => 'index'));
			}else{
				$form_default = array();

				$data = $this->WebSetting->find("all");
				foreach ($data as $d) {
					# code...
					$ex = explode(".", $d['WebSetting']['key_setting']);
					$key_1 = $ex[0];
					$key_2 = $ex[1];
					$value = $d['WebSetting']['value_setting'];
					$form_default[$key_1][$key_2] = $value;
				}


				$this->request->data = $form_default;


			}

			$this->set(compact('data_page'));
		}

	}

?>
