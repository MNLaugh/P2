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
 * Fonction d'inversement de la date du format US (SQL) au format FR
 *
 * @param String $date 			- Date US (SQL) avant modification
 *
 * @return String   				- Date après modification
 **/
function convert_date_USinFR($dateUS){
	$date = date("d-m-Y", strtotime($dateUS));
	return str_replace("-", "/", $date);
}

/**
 * Fonction d'inversement de la date du format FR au format US (SQL)
 *
 * @param String $date 			- Date FR avant modification
 *
 * @return String   				- Date après modification
 **/
function convert_date_FRinUS($dateFR){
	$date = str_replace("/", "-", $dateFR);
	return date("Y-m-d", strtotime($date));
}

/**
*	Fonction qui retourne une chaine de caractère aléatoire
*
*	@param 	Int 		- Paramètre de longueur de la chaine
*	@return String 		- Chaine de caractère
*/
function rand_string($length) {
	//Initialise la variable "string"
	$string = NULL;
	//Déclaration de la variable contenant tous les caractères disponibles
	$alpha = '0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ'; //60
	//Boucle sur le nombre passé en paramètre
	for ($i = 0; $i < $length; $i++) {
		//On choisit un caractère de manière aléatoire dans "alpha"
	    $n = rand(0, strlen($alpha)-1);
	    //Concataine les caractères sélectionnés à chaque boucle
	    $string .= $alpha[$n];
	}
	//On retourne notre chaine finale
	return $string;
}
?>