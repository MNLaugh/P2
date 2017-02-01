<?php
/** EXEMPLE **\
 * Fonction example
 *
 * @param Array $maVar 		-Information d'entrer
 *
 * @return String   		-Information de sortie
 **/
//function function_name($param){}


/**
 * Fonction de simplication de l'écriture de notification
 *
 * @param String $type 			-Information de type de notification (danger, success, warning, info)
 * @param String $texte 		-Information d'entrer
 *
 * @return Array   		-Information de sortie
 **/
function simply_notif($type, $texte, $horizontalPlacement="right"){
	return array("type" => $type, "text" => $texte, "hP" => $horizontalPlacement);
}

/**
 * Fonction d'inversement de la date
 *
 * @param String $date 			- Date avant modification
 *
 * @return String   				- Date près modification
 **/
function reformate_dat($date){
	$date = str_replace("/", "-", $date);
	return date("Y-m-d", strtotime($date));
}
?>