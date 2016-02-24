<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		$data_switch = $path[0];
		switch ($data_switch) {
			case 'home':
				$this->loadModel('ImageRoll');
				$this->loadModel('Client');
				$this->loadModel('Banner');

				$data_image 	= $this->ImageRoll->find('all');
				$data_client 	= $this->Client->find('all');
				$data_banner	= $this->Banner->find('all');
				foreach ($data_banner as $key => $value) {
					# code...
					$key_area 			= $value['Banner']['key_area'];
					$banner[$key_area] 	= [
						'image_dir' => $value['Banner']['image_dir'],
						'image'		=> $value['Banner']['image']
					];
				}
				$this->set(compact('data_image', 'data_client','banner'));
				break;
			case 'home_mimika':
				$this->layout = 'frontend_sub_layout';
				$this->loadModel('ImageRoll');
				$this->loadModel('Client');
				$this->loadModel('Banner');

				$data_image 	= $this->ImageRoll->find('all');
				$data_client 	= $this->Client->find('all');
				$data_banner	= $this->Banner->find('all');
				foreach ($data_banner as $key => $value) {
					# code...
					$key_area 			= $value['Banner']['key_area'];
					$banner[$key_area] 	= [
						'image_dir' => $value['Banner']['image_dir'],
						'image'		=> $value['Banner']['image']
					];
				}
				$group_id = '-';
				$this->set(compact('data_image', 'data_client','banner','group_id'));
				break;				
			case 'about_us':
				# code...
				$this->loadModel('DataPage');

				$data_content = $this->DataPage->find('first', ['conditions' => ['page_key' => 'about']]);
				break;
			case 'about_ev':
				# code...
				$this->loadModel('DataPage');
				$data_content = $this->DataPage->find('first', ['conditions' => ['page_key' => 'about_ev']]);
				break;

			case 'home_equipt':
				# code...
				$this->loadModel('Product');
				$this->loadModel('ProductCategory');

				$product_new 	= $this->Product->find('all', ['conditions' => ['Product.status_baru' => 2, 'Product.product_group_id' => $this->group_id]]);
				//$list_product 	= $this->Product->find('all', ['conditions' => ['Product.product_group_id' => $this->group_id]]);
				$list_category 	= $this->ProductCategory->find('list', [ 'fields' => ['id','category_name'],'conditions' => ['ProductCategory.product_group_id' => 2] ] );
			    $this->Paginator->settings = array(
			        // 'conditions' => ["PaperSubmission.member_id" => $this->Auth->user('id')],
			        'conditions' 	=> ['Product.product_group_id' => $this->group_id],
			        'order' 		=> ["created" => "asc"],
			        'limit' 		=> 10
			    );
			    $list_product = $this->Paginator->paginate('Product');
				$this->set(compact('product_new', 'list_product', 'list_category'));			
				break;
			
			default:
				# code...
				break;
		}

		$this->set(compact('data_content'));

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function admin_display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		switch ($path[0]) {
			case 'dashboard':
				# code...
				$data_page = [
					'page_header'		=> 'Dashboard',
					'small_page_header'	=> 'Manage Website PT JML',
					'mainkey'			=> 'dashboard',
					'breadcrumb' 		=> [
						'0' => [
							'content' 	=> 'Home',
							'url'		=> Router::url("/", true),
							'active'	=> false,
						],
						'1' => [
							'content' 	=> '<i class="fa fa-dashboard"></i> Dashboard',
							'url'		=> '',
							'active'	=> true,
						],
					]

				];
				$this->set(compact('data_page'));
				break;
			
			default:
				# code...
				break;
		}

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
