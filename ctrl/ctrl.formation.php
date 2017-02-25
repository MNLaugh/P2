<?php
/**
 * Controleur de Formation
 *	 	
 */
//Extraction des valeurs au select via la fonction "get_level_list()" de l'objet Formation
$level_list = get_level_list($db);
//		Assignation des valeurs d'otpions
$tpl->assign("levelFormation_values", $level_list['value']);
//		Assignation des textes d'otpions
$tpl->assign("levelFormation_output", $level_list['name']);
//		Assignation de l'option selected
$tpl->assign("levelFormation_selected", "");
$allOpForm = array('add', 'edit', 'del', 'view');
$op = (isset($op) && in_array($op, $allOpForm))? $op : "";
if($op == "" && isset($_GET['op'])){
	$op = (in_array($_GET['op'], $allOpForm))? $_GET['op'] : "";
}

switch ($op) {
	/**
	*	Case de suppression d'une formation
	*/
	case 'del':
		//Si il existe un paramètre get id
		if(isset($_GET['id'])){
			//Et si la suppression retourne true
			if($formaQuery->delete_formation_by_id($_GET['id'])){
				//On affiche la notification de suppression effectuer
				$noty[] = simply_notif('success', "Formation supprimer !", "center");
				header('Refresh:2;url=./?p=formation');
			}
		}
	break;
	/**
	*	Case d'ajout d'une formation
	*/
	case 'add':
		//Ajout d'une formation
		if(isset($_POST['addFormation'])){
			//On envoie tout les contenu du formulaire dans la fonction d'ajout de l'objet Formation
			$addFormTab = $formaQuery->operating_formation($_POST, 'add');
			//On assigne notre ou nos erreurs à la variable "noty" pour afficher soit les erreur, soit le message de succès
			$noty = (isset($addFormTab['noty']))? $addFormTab['noty']: $addFormTab;
			//Si il existe un tableau "arrAddFormation" dans le rendu de la fonction
			if(isset($addFormTab['arrAddFormation'])){
				//On extrait les clefs du tableau pour pouvoir faire les assignation Smarty en cas d'erreur des données formulaire
				$keysFormation = array_keys($addFormTab['arrAddFormation']);
				//On boucle dessus affin de procéder au assignation
				foreach($addFormTab['arrAddFormation'] as $i => $var){
					//Et on procède au assignation Smarty
					$tpl->assign($i, $addFormTab['arrAddFormation'][$i]);
				}
			}
			if(count($noty)==1 && isset($noty['type'])=='success'){
				header("refresh;2:url=./?p=formation");
			}
		}
	break;
	/**
	*	Case de vue d'une formation
	*/
	case 'view':
		if(isset($_GET['id'])){
			if($formaQuery->get_formation_by_id($_GET['id'])){
				$once_form = $formaQuery->get_formation_by_id($_GET['id']);
				$tpl->assign("pagename", 'Edition : '.$once_form['short_name']);
				$tpl->assign("uniq_form", $once_form);

				$nbStagiaire = $stagQuery->get_number_stagiaire_in_formation($once_form['id_formation']);
				$tpl->assign("nbStagiaire", $nbStagiaire);

				$inTimestamp = strtotime($once_form['date_in']);
				$outTimestamp = strtotime($once_form['date_out']);
				$inInterval = $nowTimestamp-$inTimestamp;
				$outInterval = $nowTimestamp-$outTimestamp;
				//les deux interval sont déjà passés
				if($inInterval < 0 && $outInterval < 0){
					//Assignation au tpl
					$tpl->assign("DateContentFormation", "<h4>Formation à venir</h4>");
				//les deux interval sont à venir
				}elseif($inInterval > 0 && $outInterval > 0){
					//Assignation au tpl
					$tpl->assign("DateContentFormation", "<h4>Formation terminée</h4>");
				//Sinon la formation est en cours
				}else{
					//calcul des jours passées
					$daysPass = round((($inInterval/24)/60)/60);
					//calcul des semaines passées
					$daysWeekPass = round($daysPass/7)*2;
					//recalcul des jour passer sans les weekend
					$daysPass = $daysPass - $daysWeekPass;
					//Calcul des jours restants
					$daysFutur = round((($outInterval/24)/60)/60)*-1;
					//Calcul des semaines restantes
					$daysWeekFutur = round($daysFutur/7)*2;
					//Recalcul des jours restants sans les weekend
					$daysFutur = $daysFutur - $daysWeekFutur;
					//Total de jours de formation
					$dayTotal = $daysPass+$daysFutur;
					//Pourcentage passé
					$percent = ($daysPass*100)/$dayTotal;
					//Envoi au template avec la fonction de création de la progress bar
					$tpl->assign("DateContentFormation", progress_bar($percent, $daysPass.' jours passés', $daysFutur.' jours restant'));
				}

				$allStag = $stagQuery->get_arr_stagiaire();
				$allStagiaire = [];
				foreach ($allStag as $i => $stag){
					if($stag['id_formation']!=0 && $_GET['id']==$stag['id_formation']){
						$allStagiaire[] = $stag;
					}
				}
				$tpl->assign("nbstag", count($allStagiaire));
				//Assignation de la vue liste des stagiaires
				$tpl->assign("allStagiaire", $allStagiaire);
			}
		}else{
			$noty[] = simply_notif('danger', "Aucune formation trouver !");
		}
	break;
	/**
	*	Case d'édition d'une formation
	*/
	case 'edit':
		if(isset($_GET['id'])){
			if($formaQuery->get_formation_by_id($_GET['id'])){
				$once_form = $formaQuery->get_formation_by_id($_GET['id']);
				$tpl->assign("uniq_form", $once_form);
				//		Assignation de l'option selected
				$tpl->assign("levelFormation_selected", $once_form['id_level']);
				//Traitement update
				if(isset($_POST['updateFormation'])){
					//On envoie tout les contenu du formulaire dans la fonction d'ajout de l'objet Formation
					$updateFormTab = $formaQuery->operating_formation($_POST, 'update');
					//On assigne notre ou nos erreurs à la variable "noty" pour afficher soit les erreur, soit le message de succès
					$noty = (isset($addFormTab['noty']))? $updateFormTab['noty']: $updateFormTab;
					//Si il existe un tableau "arrAddFormation" dans le rendu de la fonction
					if(isset($updateFormTab['arrAddFormation'])){
						//On extrait les clefs du tableau pour pouvoir faire les assignation Smarty en cas d'erreur des données formulaire
						$keysFormation = array_keys($updateFormTab['arrAddFormation']);
						//On boucle dessus affin de procéder au assignation
						foreach($updateFormTab['arrAddFormation'] as $i => $var){
							//Et on procède au assignation Smarty
							$tpl->assign($i, $updateFormTab['arrAddFormation'][$i]);
						}
					}
					if(count($noty)==1 && isset($noty[0]['type'])=='success'){
						header("refresh:2;url= ./?p=formation");
					}
				}
			}
		}else{
			$noty[] = simply_notif('danger', "Aucune formation trouver !");
		}
	break;
	/**
	*	Case par défaut (liste des formations)
	*/
	default:
		//Assigne le tableau des formation a la variable de vue "allFormation"
		$tpl->assign("allFormation", $formaQuery->get_arr_formation());
	break;
}
?>