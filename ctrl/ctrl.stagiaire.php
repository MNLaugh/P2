<?php
//Assignation de la vue liste des stagiaires
$tpl->assign("allStagiaire", $stagQuery->get_arr_stagiaire());


//		Assignation des valeurs d'otpions
$tpl->assign("power_values", array(1, 2));
//		Assignation des textes d'otpions
$tpl->assign("power_output", array('Gestionnaire', 'Stagiaire'));
//		Assignation de l'option selected
$tpl->assign("power_selected", "2");



?>