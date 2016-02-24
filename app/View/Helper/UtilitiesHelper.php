<?php

	class UtilitiesHelper extends AppHelper{

		public function getCategoryData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('Category', 'Model');
			$pc = new Category;
			$d 	= $pc->findById($id);
			if(isset($d['Category']))
			{
				if(!empty($fields))
				{
					$output = $d['Category'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}

		public function getChildernArray($id){

			App::uses('Category', 'Model');
			$c 		= new Category;
			$output = $c->children($id,true);
			return $output;
		}

		public function getParentPath($id='', $skip = '')
		{
			# code...
			$output = '';
			if($id > 0){
				App::uses('Category', 'Model');
				$c 		= new Category;
				$data 	= $c->getPath($id);
				$output = '';
				$count	= count($data);
				$no		= 0;
				foreach ($data as $key => $value) {
					# code...
					if(is_numeric($skip)){
						if($skip != $key){
							$output .= $value['Category']['name'];
							if($no < $count - 1){
								$output .= ' >> ';
							}							
						}
					}else{
						$output .= $value['Category']['name'];
						if($no < $count - 1){
							$output .= ' >> ';
						}						
					}
					$no++;
				}
			}

			return $output;
		}

		public function getProductCategoryData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('ProductCategory', 'Model');
			$pc = new ProductCategory;
			$d 	= $pc->findById($id);
			if(isset($d['ProductCategory']))
			{
				if(!empty($fields))
				{
					$output = $d['ProductCategory'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}

		public function getBrandData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('Brand', 'Model');
			$pc = new Brand;
			$d 	= $pc->findById($id);
			if(isset($d['Brand']))
			{
				if(!empty($fields))
				{
					$output = $d['Brand'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}


		public function getProductTypeData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('ProductType', 'Model');
			$pc = new ProductType;
			$d 	= $pc->findById($id);
			if(isset($d['ProductType']))
			{
				if(!empty($fields))
				{
					$output = $d['ProductType'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}


		public function getProductGroupData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('ProductGroup', 'Model');
			$pc = new ProductGroup;
			$d 	= $pc->findById($id);
			if(isset($d['ProductGroup']))
			{
				if(!empty($fields))
				{
					$output = $d['ProductGroup'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}
		public function getGroupData($id, $fields)
		{
			# code...
			$output = '';

			App::uses('Group', 'Model');
			$pc = new Group;
			$d 	= $pc->findById($id);
			if(isset($d['Group']))
			{
				if(!empty($fields))
				{
					$output = $d['Group'][$fields];
				}else{
					$output = $d;
				}
			}

			return $output;
		}	

		public function getProductCondition($id)
		{
			# code...
			$output = '';

			switch ($id) {
				case 1:
					# code...
					$output = 'Sold';
					break;
				case 2:
					# code...
					$output = 'Ready';
					break;
				
				default:
					# code...
					break;
			}

			return $output;
		}

		public function getStatusProduct($id)
		{
			# code...
			$output = '';

			switch ($id) {
				case 1:
					# code...
					$output = 'Excellent';
					break;
				case 2:
					# code...
					$output = 'Very Good';
					break;
				case 3:
					# code...
					$output = 'Good';
					break;
				case 4:
					# code...
					$output = 'Broken';
					break;
				
				default:
					# code...
					break;
			}

			return $output;
		}
	}

?>