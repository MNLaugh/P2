<?php
if(isset($_SESSION['user_id']) && $stagQuery->public_get_user_by_id($_SESSION['user_id'])!=false){
	$uniq_stagiaire = $stagQuery->public_get_user_by_id($_SESSION['user_id']);
	//Formation
	if($uniq_stagiaire['id_formation'] != 0){
		$formationInfos = $formaQuery->get_formation_by_id($uniq_stagiaire['id_formation']);
		$uniq_stagiaire['formation'] = $formationInfos['long_name'];
	}else{ $uniq_stagiaire['formation'] = "Inconnu"; }

	if(isset($_GET['p']) == 'viewStagiaire' && isset($_GET['id']) && $stagQuery->public_get_user_by_id($_GET['id'])!=false){
		$uniq_stagiaire = $stagQuery->public_get_user_by_id($_GET['id']);
		$tpl->assign("arianna", $menuQuery->html_arianna($_GET['p']));
		if($_GET['id'] != $_SESSION['user_id']){
			$uniq_stagiaire['password'] = null;
		}
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
			$tpl->assign("user_img", TARGET_UPLOAD.$imgInfos['file_name']);
		}else{
			$tpl->assign("user_img", DEFAULT_AVATAR);
		}
		$tpl->assign("user_img_alt", 'Image utilisateur');

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

		$tpl->assign("page", "templates/page/stagiaire/viewStagiaire");
		//Initialisation de la variable nom de page visible à droite dans le navbar et dans le titre de l'onglet.
		$tpl->assign("pageName", "Stagiaire");
	}else{
		if($uniq_stagiaire['id_formation'] != 0){
			$formationInfos = $formaQuery->get_formation_by_id($uniq_stagiaire['id_formation']);
			$listStag = $stagQuery->get_arr_stagiaire();
			$colList = [];
			foreach ($listStag as $i => $stag) {
				if($uniq_stagiaire['id_formation'] == $stag['id_formation']){
					$colList[] = $stag;
				}
			}
			$tpl->assign("allStagiaire", $colList);
			$uniq_stagiaire['formation'] = $formationInfos['long_name'];
		}else{ $uniq_stagiaire['formation'] = 0; }

		$tpl->assign("page", "templates/page/accueil2");
	}
	$tpl->assign("uniq_stagiaire", $uniq_stagiaire);
}
?>