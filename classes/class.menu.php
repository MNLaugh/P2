<?php
Class Menu {
	/** 
	 * Lecture du fichier menu et retour du resultat en tableau
	 *
	 * @return Array   		- tableau du menu
	 **/
	private function menu_array(){
		//Initialise le tableau du menu
		$tmpArr = [];
		//Lecture du fichier
		$menuList = file("configs/menu.conf");
		//On boucle sur le fichier
		foreach($menuList as $value) {
			//Converti le string en tableau garce a la séparation " | "
			$once_link = explode(" | ", $value);
			//On boucle sur le tableau de la ligne
			foreach ($once_link as $i => $val) {
				//Et on assigne chaque ligne de celui-ci à une clef prévise
				if($i == 0){ $once['id'] = intval($val); }elseif($i == 1){ $once['name'] = $val; }elseif($i == 2){ $once['icon'] = $val; }elseif($i == 3){ $once['link'] = $val; }elseif($i == 4){ $once['parent'] = intval($val); }elseif($i == 5){ $once['perm'] = intval($val); }
			}
			//Chaque élément est inclu dans le tableau final du menu
			$tmpArr[] = $once;
		}
		//Et on retourne le tableau
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
		//Si l'id n'est pas '0' (il n'existe pas)
		if($id!=0){
			//On boucle sur le tableau du menu
			foreach($this->menu_array() as $row){
				//On vérifie si l'id correspond à un lien dans le tableau du menu
				if($row['id']==$id){
					//On retourne le tableau du lien contenant tout les element de celui-ci
					return $row;
				//Sinon l'id ne correspond à aucun liens et on retourne false
				}else{
					return false;
				}
			}
		//Sinon l'id est '0' et comme aucun liens n'a l'id '0' on retourne false
		}else{
			return false;
		}
	}

	/**
	 * Retourne un name via le link
	 *
	 * @param String $link				- Url du lien
	 *
	 * @return String  $row['name'] 	- Nom du lien
	 **/
	public function get_name_by_link($link){
		//On boucle sur le tableau du menu
		foreach($this->menu_array() as $row){
			//Si le lien sans "./?p=" correspond a un lien existant
			if(str_replace('./?p=', '', $row['link'])==$link){
				//On retourne le nom du lien
				return $row['name'];
			}
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
		//Assigne le tableau du menu dans une variable
		$tmpArr = $this->menu_array();
		//On booucle dessus pour séparer les enfants des parents
		foreach($tmpArr as $row){
			//Si la valeur de 'parent' est '0' c'est un parent
			if($row['parent']==0){
				//Et on l'ajoute au tableau des parents
				$parent[]=$row;
			//Sinon la valeur de parent correspond à l'id d'un lien et est donc un enfant 
			}else{
				//Et on l'ajoute au tableau des enfants
				$enfant[]=$row;
			}
		}
		//Initialisation du string final
		$finalString = "";
		//On boucle sur les parents
		foreach ($parent as &$pp){
			//Si le power de l'utilisateur est inférieur ou égale à la permission de voir le lien
			if($power <= $pp['perm']){
				//On ajoute une ouverture de LI dans le string final
				$finalString .= "<li>";
				//Si le l'url du lien est égale à un "#" 
				if($pp['link']=="#"){
					//On ajoute un lien multiple html et css
	                $finalString .= '<a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">'.$pp['icon'].'</i><span>'.$pp['name'].'</span></a><ul class="ml-menu">';
					//Et on boucle sur les enfants
					foreach ($enfant as &$bb){
						//Si le power de l'utilisateur est inférieur ou égale à la permission de voir le lien
						if($power <= $bb['perm']){
							//Et si l'id du parent correspond à celui de l'enfant
							if($pp['id']==$bb['parent']){
								//On ajoute le lien html au string final
	            	            $finalString .= '<li><a href="'.$bb['link'].'"><span>'.$bb['name'] .'</span></a></li>';
							}
						}
					}
					//Ferme le lien multiple
					$finalString .= '</ul>';
				//Sinon le lien n'est pas un parent et on ajoute un lien simple au string final
				}else{
			    	$finalString .= '<a href="'.$pp['link'].'"><i class="material-icons">'.$pp['icon'].'</i><span>'.$pp['name'].'</span></a>';
			    }
			    //Ferme le lien parent
				$finalString .= "</li>";
			}
		}
		//Retourne les menu html final
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
		//Si le paramètre "get" n'est pas égale à "accueil"
		if($get != "accueil"){
			//Initialisation du string final avec le lien de l'accueil par défaut
			$finalString = '<ol class="breadcrumb breadcrumb-col-teal"><li><a href="./">Accueil</a></li>';
			//Assigne le tableau du menu dans une variable
			$tmpArr = $this->menu_array();
			//On booucle dessus
			foreach ($tmpArr as $item) {
				//On supprime "./?p=" du lien
				$cleanLink = str_replace('./?p=', '', $item['link']);
				//Si le lien "get" est égale au lien du tableau sans "./?p="
				if($get==$cleanLink){
					//Si la fonction de récupération de lien via l'id de renvoi pas false si l'id est 0 elle renverra false
					if($this->get_link_by_id($item['parent'])){
						//On assigne le tableau du lien récupérer via l'id dans la variable "parent" 
						$parent = $this->get_link_by_id($item['parent']);
						//Et on ajoute le lien parent dans le file d'arianne
						$finalString .= '<li><a href="javascript:void(0);">'. $parent['name'] .'</a></li>';
					}
					//On ajoute le lien en cours dans le file d'arianne
					$finalString .= '<li class="active">'. $item['name'] .'</li>';
				}
			}
			//Ferme le file d'arianne
			$finalString .= '</ol>';
			//Retourne le string final
			return $finalString;
		}
	}

}
?>