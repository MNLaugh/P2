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

function format_search_formation($item){
    $formRes['id_formation'] = $item['id_formation'];
    $formRes['short_name'] = $item['short_name'];
    $formRes['long_name'] = $item['long_name'];
    $formRes['mode'] = $item['mode'];
    //Initialise la date du jour
    $nowDate = date('Y-m-d');
    //Convertion de cette date en timestamp Unix pour manipulation
    $nowTimestamp = strtotime($nowDate);
    $formRes['status'] = null;
    $inTimestamp = strtotime($item['date_in']);
    $outTimestamp = strtotime($item['date_out']);
    $inInterval = $nowTimestamp-$inTimestamp;
    $outInterval = $nowTimestamp-$outTimestamp;
    //les deux interval sont déjà passés
    if($inInterval < 0 && $outInterval < 0){
        //Assignation au tpl
        $formRes['status'] = "Formation à venir";
    //les deux interval sont à venir
    }elseif($inInterval > 0 && $outInterval > 0){
        //Assignation au tpl
        $formRes['status'] = "Formation terminée";
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
        $formRes['status'] =  progress_bar($percent, $daysPass.' jours passés', $daysFutur.' jours restant');
    }
    return $formRes;
}
?>