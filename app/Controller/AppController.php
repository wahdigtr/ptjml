<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components 	= array( 
									'Session', 
									'Cookie',
									'Paginator', 
									'Auth',
									'Utilities',
									'DebugKit.Toolbar'
									
								);
	
	public $helpers 		= array('Html', 'Text', 'Form', 'Session', 'Time', 'Paginator','Utilities');
	public $group_id		= 2;
	public $background_data = '10.png';
	public $warna 			= 'red';
	public $uses 			= ['WebSetting'];
	// public $group_id		= 2;
		
	public function beforeFilter() {
	    parent::beforeFilter();

	    if($this->request->prefix == "admin"){
	    	$this->layout = 'backend_layout';
            AuthComponent::$sessionKey 		= 'JMLAdmin';
	        $this->Auth->loginAction 		= array('controller'=>'users','action'=>'login', 'admin' => true);
	        $this->Auth->loginRedirect 		= array('controller'=>'pages','action'=>'display', 'dashboard', 'admin' => true);
	        $this->Auth->logoutRedirect 	= array('controller'=>'users','action'=>'login', 'admin' => true);
	        $this->Auth->authenticate 		= array(
										            'Form' => array(
										                'userModel' => 'User',
						                                'passwordHasher' => array(
											                    'className' => 'Simple',
											                    'hashType' => 'sha256'
											                ),
						                                'fields' => array(
										                  'username' => 'username', //Default is 'username' in the userModel
										                  'password' => 'password'  //Default is 'password' in the userModel
										                )
										            )
										        );
	        $this->Auth->allow('login');
	        $user = $this->Auth->user();
	       	$this->set(compact('user'));	    	
	    }else{
	    	$this->Auth->allow('display');
	    	$this->layout = 'frontend_layout';
	    	$this->WebSetting->getcfg();
	    }

	    $prefix =  array_shift((explode(".",$_SERVER['HTTP_HOST'])));
	    switch ($prefix) {
	    	case 'equipt':
	    		# code...
	    		if($this->request->action == 'display' && $this->request->params['pass'][0] == 'home'){
		    		$this->request->params['pass'][0] = 'home_equipt';
	    		}

	    		$this->group_id = 2;
	    		break;
	    	
	    	default:
	    		# code...
	    		$this->group_id = 2;
	    		break;
	    }

	    $background_data 	= $this->background_data;
	    $warna 				= $this->warna;
	    $this->set(compact('background_data', 'warna', 'group_id'));
	}

}
