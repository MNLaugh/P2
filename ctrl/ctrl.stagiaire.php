<?php
//		Assignation des valeurs d'otpions
$tpl->assign("power_values", array(0, 1, 2));
//		Assignation des textes d'otpions
$tpl->assign("power_output", array('Administrateur', 'Gestionnaire', 'Stagiaire'));
//		Assignation de l'option selected
$tpl->assign("power_selected", "2");

$allOpStag = array('adduser', 'edit', 'del', 'view');
$op = (isset($op) && in_array($op, $allOpStag))? $op : "";
if($op == "" && isset($_GET['op'])){
	$op = (in_array($_GET['op'], $allOpStag))? $_GET['op'] : "";
}
switch ($op) {
	/**
	*	Case de suppression d'un stagiaire
	*/
	case 'del':
		if(isset($_GET['id']) && $stagQuery->public_get_user_by_id($_GET['id'])!=false){
			if($stagQuery->del_user_by_id($_GET['id'])){
				//On affiche la notification de suppression effectuer
				$noty[] = simply_notif('success', "Stagiaire supprimer !", "center");
				header('Refresh:2;url=./?p=stagiaire');
			}
		}else{
			header('Location: ./?p=stagiaire');
		}
	break;
	/**
	*	Case d'ajout d'un stagiaire
	*/
	case 'adduser':
		if($power==0){
			if(isset($_POST['adduser'])){
				$addUserTab = $stagQuery->add_new_user($_POST);
				//On assigne notre ou nos erreurs à la variable "noty" pour afficher soit les erreur, soit le message de succès
				$noty = (isset($addUserTab['noty']))? $addUserTab['noty']: $addUserTab;
				//Si il existe un tableau "arrAddUser" dans le rendu de la fonction
				if(isset($addUserTab['arrAddUser'])){
					//On extrait les clefs du tableau pour pouvoir faire les assignation Smarty en cas d'erreur des données formulaire
					$keysFormation = array_keys($addUserTab['arrAddUser']);
					//On boucle dessus affin de procéder au assignation
					foreach($addUserTab['arrAddUser'] as $i => $var){
						//Et on procède au assignation Smarty
						$tpl->assign($i, $addUserTab['arrAddUser'][$i]);
					}
				}
				if(count($noty)==1 && isset($noty[0]['type'])=='success'){
					header("refresh:2;url=./?p=stagiaire");
				}
			}
		}else{
			header('Location: ./');
		}
	break;
	/**
	*	Case de vue d'un stagiaire
	*/
	case 'view':
		if(isset($_GET['id']) && $stagQuery->public_get_user_by_id($_GET['id'])!=false){
			$uniq_stagiaire = $stagQuery->public_get_user_by_id($_GET['id']);
				$uniq_stagiaire['password'] = null;
	            //traitement date_naissance
	            if(strtotime($uniq_stagiaire['date_naissance'])==0){
	                $uniq_stagiaire['date_naissance'] = 'Pas de date de naissance';
	            }else{
	            	$uniq_stagiaire['date_naissance'] = convert_date_USinFR($uniq_stagiaire['date_naissance']);
	            }

	            if($uniq_stagiaire['code_postal']==0){
	            	$uniq_stagiaire['code_postal'] = "";
	            }

	            //telephone
	            if($uniq_stagiaire['telephone'] !=0 ){
					if(strlen($uniq_stagiaire['telephone'])==9){
						$uniq_stagiaire['telephone'] = 0 . $uniq_stagiaire['telephone'];
					}
				}else{ $uniq_stagiaire['telephone'] = "Pas de téléphone"; }

				//Avatar
				if($uniq_stagiaire['id_image'] != 0){
					$imgInfos = $imgQuery->get_infos_img_by_id($uniq_stagiaire['id_image']);
					$tpl->assign("stag_img", TARGET_UPLOAD.$imgInfos['file_name']);
				}else{
					$tpl->assign("stag_img", DEFAULT_AVATAR);
				}
				$tpl->assign("stag_img_alt", 'Image utilisateur');

				//Niveau d'étude
				if($uniq_stagiaire['level_diplom'] != 0){
					$level_list = get_level_list($db);
					foreach ($level_list['value'] as $i => $lN) {
						if($lN == $uniq_stagiaire['level_diplom']){
							$uniq_stagiaire['level_name'] = $level_list['name'][$i];
						}
					}
				}else{ $uniq_stagiaire['level_name'] = "Inconnu"; }

				//Formation
				if($uniq_stagiaire['id_formation'] != 0){
					$formationInfos = $formaQuery->get_formation_by_id($uniq_stagiaire['id_formation']);
					$uniq_stagiaire['formation'] = $formationInfos['long_name'];
				}else{ $uniq_stagiaire['formation'] = "Inconnu"; }
				$tpl->assign("uniq_stagiaire", $uniq_stagiaire);
		}
	break;
	/**
	*	Case d'édition d'un stagiaire
	*/
	case 'edit':
		if(isset($_GET['id']) && $stagQuery->public_get_user_by_id($_GET['id'])!=false){
			$uniq_stagiaire = $stagQuery->public_get_user_by_id($_GET['id']);
			
			if(strlen($uniq_stagiaire['telephone'])==9){
				$uniq_stagiaire['telephone'] = 0 . $uniq_stagiaire['telephone'];
			}
            //traitement date_naissance
            if(strtotime($uniq_stagiaire['date_naissance'])==0){
                $uniq_stagiaire['date_naissance'] = '';
            }else{
            	$uniq_stagiaire['date_naissance'] = convert_date_USinFR($uniq_stagiaire['date_naissance']);
            }
            if($uniq_stagiaire['id_image']==null){
                $uniq_stagiaire['file_image'] = DEFAULT_AVATAR;
                $uniq_stagiaire['alt_image'] = "Default avatar";
            }else{
            	$imgInfo = $imgQuery->get_infos_img_by_id($uniq_stagiaire['id_image']);
            	if(file_exists(TARGET_UPLOAD_THUMBS.$imgInfo['thumbnail_name'])){
                    $uniq_stagiaire['file_image'] = TARGET_UPLOAD_THUMBS.$imgInfo['thumbnail_name'];
	                $uniq_stagiaire['alt_image'] = "avatar de ".$uniq_stagiaire['login'];
            	}else{
	                $uniq_stagiaire['file_image'] = DEFAULT_AVATAR;
	                $uniq_stagiaire['alt_image'] = "Default avatar";
            	}
            }
			//Extraction des valeurs du select via la fonction "get_level_list()" de l'objet Stagiaire
			$level_list = get_level_list($db);
			//		Assignation des valeurs d'otpions
			$tpl->assign("levelStagiairen_values", $level_list['value']);
			//		Assignation des textes d'otpions
			$tpl->assign("levelStagiairen_output", $level_list['name']);
			//		Assignation de l'option selected
			$tpl->assign("levelStagiaire_selected", ($uniq_stagiaire['level_diplom']!=0)? $uniq_stagiaire['level_diplom'] : "");

			//Extraction des valeurs du select via la fonction "get_formation_id_list()" de l'objet Formation
			$formation_list = $formaQuery->get_arr_formation();
			$id_formation = [];
			$id_formation[] = 'default';
			$name_formation = [];
			$name_formation[] = '-- Formation --';
			foreach ($formation_list as $forma) {
				$id_formation[] = $forma['id_formation'];
				$name_formation[] = $forma['short_name'];
			}
			//		Assignation des valeurs d'otpions
			$tpl->assign("formation_values", $id_formation);
			//		Assignation des textes d'otpions
			$tpl->assign("formation_output", $name_formation);
			//		Assignation de l'option selected default si déja existant pour l'utilisateur
			$tpl->assign("formation_selected", ($uniq_stagiaire['id_formation']!=0)? $uniq_stagiaire['id_formation'] : "default");

			$tpl->assign('uniq_stagiaire', $uniq_stagiaire);

			if(isset($_POST['editStagiaire'])){
				$_POST['id_image'] = $uniq_stagiaire['id_image'];
				if(isset($_FILES['userfile'])){
					if($_FILES['userfile']['name']!=''){
						$addImgSatus = $imgQuery->add_image($_FILES);
						if(is_string($addImgSatus)){
							$imgInfos = $imgQuery->get_image_name_by_file_name(valideChaine($_FILES['userfile']['name']));
							$_POST['id_image'] = $imgInfos['id_image'];
							$uniq_stagiaire['file_image'] = TARGET_UPLOAD_THUMBS.$imgInfos['thumbnail_name'];
							$uniq_stagiaire['file_image'] = 'coucou';
						}elseif(is_array($addImgSatus)){
							$noty[] = $addImgSatus;
						}
					}
				}

				$editUserTab = $stagQuery->edit_stagiaire($_POST);
				//On assigne notre ou nos erreurs à la variable "noty" pour afficher soit les erreur, soit le message de succès
				$noty = (isset($editUserTab['noty']))? $editUserTab['noty']: $editUserTab;
				//Si il existe un tableau "arrEditUser" dans le rendu de la fonction
				if(isset($editUserTab['arrEditUser'])){
					//On extrait les clefs du tableau pour pouvoir faire les assignation Smarty en cas d'erreur des données formulaire
					$keysFormation = array_keys($editUserTab['arrEditUser']);
					//On boucle dessus affin de procéder au assignation
					foreach($editUserTab['arrEditUser'] as $i => $var){
						//Et on procède au assignation Smarty
						$tpl->assign($i, $editUserTab['arrEditUser'][$i]);
					}
				}
				if(count($noty)==1 && isset($noty[0]['type'])=='success'){
					header("refresh:2;url=./?p=stagiaire");
				}
			}

		}
	break;
	/**
	*	Case par défaut (liste des stagiaires)
	*/
	default:
		$allStag = $stagQuery->get_arr_stagiaire();
		foreach ($allStag as $i => $stag){
			if($stag['id_formation']!=0){
				$formation = $formaQuery->get_formation_by_id($stag['id_formation']);
				$allStag[$i]['id_formation'] = '<a id="clink-formation" title="Voir '. $formation["short_name"] .'" href="./?p=viewFormation&id='. $formation["id_formation"] .'">'. $formation["long_name"] .'</a>';
			}else{
				$allStag[$i]['id_formation'] = 'Acune formation';
			}
		}
		//Assignation de la vue liste des stagiaires
		$tpl->assign("allStagiaire", $allStag);
	break;
}
?>