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
 * @param String $noty["type"] 		-Type: "danger, success, warning, info"
 * @param String $noty["text"] 		-Message de la notifications
 * @param String $noty["hP"] 		-Placement Horizontale "left", "" (Defaut "center"), "right".
 *	Exemple-  
 *		//Type: "warning" (Background-color: orange)
 *		//Texte: Constante "NOTCO" (Voir fichier: ./configs/func.php)
 *		//Placement Horizontale: "" (Vide) Par defaut: "center"
 *		$noty[] = simply_notif("warning", NOTCO, "");
 *
 * $noty[] = array("type" => "mon_type", "text" => "mon_message"); //V1
 * $noty[] = simply_notif($type, $texte); //V2 (voir fichier: ./configs/func.php)
 * $noty[] = simply_notif($type, $texte, $placementHorizontal); //V3 (voir fichier: ./configs/func.php)
**/
function simply_notif($type, $texte, $horizontalPlacement="right"){
	return array("type" => $type, "text" => $texte, "hP" => $horizontalPlacement);
}

function valideChaine($chaineNonValide){
    $url = $chaineNonValide;
    $url = preg_replace('`\s+`', '_', trim($url));
    $url = str_replace("'", "_", $url);
    $url = preg_replace('`_+`', '_', trim($url));
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
    $url = strtolower($url);
    return ($url);
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

function get_level_list($db){
	try {
		$stmt = $db->query('SET NAMES utf8');
		$stmt = $db->query('SELECT * FROM level_diplome');
		$level_list = $stmt->fetchAll();
		$level_value = array("");
		$level_name = array("-- Niveau diplomant --");
		foreach ($level_list as $i => $val) {
			$level_value[$i+1] = $val['id_level'];
			$level_name[$i+1] = $val['level_name'];
		}
		$levelListFinal['value'] = $level_value;
		$levelListFinal['name'] = $level_name;
		return $levelListFinal;
	} catch(PDOException $e) {
		return false;
	}
}

function progress_bar($percent, $daysPass=null, $daysFutur=null){
	return '
        <div class="progress">
            <div class="progress-bar bg-teal progress-bar-striped" role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%">
                '. $daysPass .'
            </div>
            <center>'. $daysFutur .'</center>
        </div>';
}
?>