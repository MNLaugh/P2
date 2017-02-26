<?php
$tpl->assign('nbStagiaire', $stagQuery->get_number_stagiaire());
$tpl->assign('nbFormation', $formaQuery->get_number_formation());

$listFormation = $formaQuery->get_arr_formation();
$allStag = $stagQuery->get_arr_stagiaire();
$allStagiaire = [];
foreach ($listFormation as $i => $form) {
	$nbstag = 0;
	foreach ($allStag as $stag){
		if($stag['id_formation'] == $form['id_formation']){
			$nbstag ++;
		}
	}
	$listFormation[$i]['status'] = null;
	$listFormation[$i]['nbstagiaire'] = $nbstag;
	$inTimestamp = strtotime($form['date_in']);
	$outTimestamp = strtotime($form['date_out']);
	$inInterval = $nowTimestamp-$inTimestamp;
	$outInterval = $nowTimestamp-$outTimestamp;
	//les deux interval sont déjà passés
	if($inInterval < 0 && $outInterval < 0){
		//Assignation au tpl
		$listFormation[$i]['status'] = "Formation à venir";
	//les deux interval sont à venir
	}elseif($inInterval > 0 && $outInterval > 0){
		//Assignation au tpl
		$listFormation[$i]['status'] = "Formation terminée";
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
		$listFormation[$i]['status'] =  progress_bar($percent, $daysPass.' jours passés', $daysFutur.' jours restant');
	}
}

//Assigne le tableau des formation a la variable de vue "allFormation"
$tpl->assign("allFormation", $listFormation);

if($page == "accueil0"){
	$userList = $user->get_user_list();
	foreach ($userList as $id => $u) {
		$userList[$id]['power'] = $user->textuel_power(intval($u['power']));
		$userList[$id]['name'] = $u['name'];
		$userList[$id]['first_name'] = $u['first_name'];
	}
	$tpl->assign("listUser", $userList);
}
?>