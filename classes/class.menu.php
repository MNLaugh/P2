<?php

    Class Menu {
		/** 
		 * Lecture du fichier menu
		 *
		 * @return Array   		- tableau du menu
		 **/
		private function menu_array(){
			$tmpArr = [];
			$menuList = file("configs/menu.conf");
			foreach($menuList as $value) {
				$coucou = explode(" | ", $value);
				foreach ($coucou as $key => $val) {
					if($key == 0){
						$once['id'] = $val;
					}elseif($key == 1){
						$once['name'] = $val;
					}elseif($key == 2){
						$once['icon'] = $val;
					}elseif($key == 3){
						$once['link'] = $val;
					}elseif($key == 4){
						$once['parent'] = $val;
					}elseif($key == 5){
						$once['perm'] = $val;
					}
				}
				$tmpArr[] = $once;
			}
			return $tmpArr;
		}
		/**
		 * Retourne un lien via l'id
		 *
		 * @param int $id		- Niveau de permission
		 *
		 * @return Array   	- Tableau du lien demandé
		 **/
		private function get_link_by_id($id){
			if($id!=0){
				foreach($this->menu_array() as $row){
					if($row['id']==$id){
						return $row;
					}
				}
			}else{
				return false;
			}
		}

		/**
		 * Retourne le menu final Html
		 *
		 * @param int $power	- Niveau de permission
		 *
		 * @return String   	- Menu vue HTML
		 **/
		public function html_menu($power){
			$tmpArr = $this->menu_array();
			foreach($tmpArr as $row){
			   if($row['parent']==0){
			      $parent[]=$row;
			   }else{
			      $enfant[]=$row;
			   }
			}
			$finalString = "";
				foreach ($parent as &$pp){
					if($pp['perm']<=$power){
						$finalString .= "<li>";
						if($pp['link']=="#"){
		                        $finalString .= '<a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">'.$pp['icon'].'</i><span>'.$pp['name'].'</span></a><ul class="ml-menu">';
						foreach ($enfant as &$bb){
							if($bb['perm']<=$power){
								if($pp['id']==$bb['parent']){
		                            $finalString .= '<li><a href="'.$bb['link'].'"><span>'.$bb['name'].'</span></a></li>';
								}
							}
						}
						$finalString .= '</ul>';
						}else{
					    	$finalString .= '<a href="'.$pp['link'].'"><i class="material-icons">'.$pp['icon'].'</i><span>'.$pp['name'].'</span></a>';
					    }
						$finalString .= "</li>";
					}
				}
			return $finalString;
		}
		/**
		 * Retourne le file d'arianne final Html
		 *
		 * @param String $get		- Paramètre GET
		 *
		 * @return String   		- File d'arianne vue HTML
		 **/
		public function html_arianna($get){
			if($get != "accueil"){
				$finalString = '<ol class="breadcrumb breadcrumb-col-teal"><li><a href="./">Accueil</a></li>';
				$tmpArr = $this->menu_array();
				foreach ($tmpArr as $item) {
					$cleanLink = str_replace('./?p=', '', $item['link']);
					if($get==$cleanLink){
						if($this->get_link_by_id($item['parent'])!=false){
							$parent = $this->get_link_by_id($item['parent']);
							$finalString .= '<li><a href="javascript:void(0);">'. $parent['name'] .'</a></li>';
						}
						$finalString .= '<li class="active">'. $item['name'] .'</li>';
					}
				}
				$finalString .= '</ol>';
				return $finalString;
			}
		}

    }
?>