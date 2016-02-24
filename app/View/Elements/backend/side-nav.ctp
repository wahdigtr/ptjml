        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?=$this->Html->image('/backend/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']);?>
            </div>
            <div class="pull-left info">
              <p><?=ucwords($user['fullname']);?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
              $list_menu = [  
                0 => [
                  'mainkey' => 'dashboard',
                  'url'     => Router::url("/admin", true),
                  'name'    => '<span class="fa fa-dashboard"></span> Dashboard'
                ],
                1 => [
                  'mainkey' => 'product_group',
                  'url'     => Router::url(['controller' => 'product_groups', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-building"></span> Product Group'
                ],
                2 => [
                  'mainkey' => 'category',
                  'url'     => Router::url(['controller' => 'categories', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-list"></span> Category'
                ],
                // 3 => [
                //   'mainkey' => 'product_category',
                //   'url'     => Router::url(['controller' => 'product_categories', 'action' => 'index', 'admin' => true], true),
                //   'name'    => '<span class="fa fa-cubes"></span> Product Category'
                // ],
                4 => [
                  'mainkey' => 'brand',
                  'url'     => Router::url(['controller' => 'brands', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-tags"></span> Product Brand'
                ],
                5 => [
                  'mainkey' => 'product_type',
                  'url'     => Router::url(['controller' => 'product_types', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-gears"></span> Product Type'
                ],
                6 => [
                  'mainkey' => 'products',
                  'url'     => Router::url(['controller' => 'products', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-truck"></span> Product'
                ],
                7 => [
                  'mainkey' => 'dealer',
                  'url'     => Router::url(['controller' => 'dealers', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-building"></span> Dealer'
                ],
                8 => [
                  'mainkey' => 'po_list',
                  'url'     => Router::url(['controller' => 'po_lists', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-edit"></span> List PO'
                ],
                9 => [
                  'mainkey' => 'become_dealer',
                  'url'     => Router::url(['controller' => 'become_dealers', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-industry"></span> Become Dealer'
                ],
                10 => [
                  'mainkey' => 'data_pages',
                  'url'     => Router::url(['controller' => 'data_pages', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-file-text"></span> Pages'
                ],
                11 => [
                  'mainkey' => 'group',
                  'url'     => Router::url(['controller' => 'groups', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-group"></span> Groups'
                ],
                12 => [
                  'mainkey' => 'user',
                  'url'     => Router::url(['controller' => 'users', 'action' => 'index', 'admin' => true], true),
                  'name'    => '<span class="fa fa-user"></span> User'
                ],
                13 => [
          				'mainkey' => 'other',
          				'url'     => '#',
          				'name'    => '<span class="fa fa-bookmark"></span> Other',
          				'submain'	=> 
          					[						
                              0 => [
                                  'mainkey' => 'banner',
                                  'url'     => Router::url(['controller' => 'banners', 'action' => 'index', 'admin' => true], true),
                                  'name'    => '<span class="fa fa-image"></span> Banner',    
                                ],                                          
          		                1 => [
                    							'mainkey' => 'image_roll',
                    							'url'     => Router::url(['controller' => 'image_rolls', 'action' => 'index', 'admin' => true], true),
                    							'name'    => '<span class="fa fa-image"></span> Image Roll',		
                    						],											                  	
          		                2 => [
                  							'mainkey' => 'client',
                  							'url'     => Router::url(['controller' => 'clients', 'action' => 'index', 'admin' => true], true),
                  							'name'    => '<span class="fa fa-industry"></span> Client',		
                  						],											                  	
          		                3 => [
                    							'mainkey' => 'setting',
                    							'url'     => Router::url(['controller' => 'web_settings', 'action' => 'index', 'admin' => true], true),
                    							'name'    => '<span class="fa fa-gears"></span> Setting',		
                    						],									                  	
          					]
                ]
              ];

              foreach ($list_menu as $key => $value) {
                # code...
                $active_data = '';
                if($value['mainkey'] == $data_page['mainkey']){
                  	$active_data = 'class="active"';
                }
            
                if(isset($value['submain'])){
                	echo '<li '.$active_data.' class="treeview"><a href="'.$value['url'].'">'.$value['name'].'
                		<i class="fa fa-angle-left pull-right"></i></a>
                	';
                	echo '<ul class="treeview-menu">';
		              	foreach ($value['submain'] as $key => $value) {
			                # code...
			                $active_data = '';
			                if($value['mainkey'] == $data_page['mainkey']){
			                  	$active_data = 'class="active"';
			                }
			            
			                echo '<li '.$active_data.'><a href="'.$value['url'].'">'.$value['name'].'</a></li>';      
		             	}          	
                	echo '</ul>';
                }else{
                	echo '<li '.$active_data.'><a href="'.$value['url'].'">'.$value['name'].'</a>';                	
                }
                echo '</li>';
              }

            ?>


<!--        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> 
-->
          </ul>
        </section>