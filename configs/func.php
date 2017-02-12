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

function progress_bar($percent, $daysPass, $daysFutur){
	return '
        <div class="progress">
            <div class="progress-bar bg-teal progress-bar-striped" role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%">
                '. $daysPass .'
            </div>
            <center>'. $daysFutur .'</center>
        </div>';
}
?>