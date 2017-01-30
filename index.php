<?php
ob_start();
session_start();
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', 'cache/logs/error_php.txt');

/*****  -Import des fonctions- && -Constantes-  *****\*/
require_once('configs/func.php'); //Fonctions
require_once('configs/const.php'); //Constantes

require 'smarties/libs/Smarty.class.php';
$smarty = new Smarty;
//Active le debugger
//$smarty->debugging = false;
/***************  -A activer en prod-  ***************\
//Active la compilation
$smarty->force_compile = false;
//Active la mise en cache
$smarty->caching = false;
//Temps de vie du cache en seconde
$smarty->cache_lifetime = 120;
*/


/***************  -Contrôle de session-  ***************\*/
require_once('./classes/class.user.php'); //Inclusion de la class utilisateur
$user = new User($db);	//Initialise la class User
$smarty->assign("loggedin", false); //Etat de la session par defaut "false"
$noty[] = simply_notif('danger', NOTCO, 'right');
$power = 2;


/***************  -Contrôle de menu-  ***************\*/
require_once('./classes/class.menu.php'); //Inclusion de la class menu
//Initialisation de l'objets Menu
$menuQuery = new Menu;
//Transfert de la vue Menu HTML au template
$smarty->assign("left_menu", $menuQuery->html_menu($power));
//Initialisation de la page par requête GET
$page = (isset($_GET['p'])) ? $_GET['p'] : "accueil";
//Transfert de la vue file d'arianne au template
$smarty->assign("arianna", $menuQuery->html_arianna($page));
//Transfert de la page à la vue
$smarty->assign("page", "templates/page/".$page);





//perm au max (3)
$smarty->assign("perm", 2);
if(substr_count($page, 'docs')==true){
	$page = 'docs';
}
switch ($page) {
	case 'docs':
		require_once('./classes/class.docs.php'); //Inclusion de la class documentation
		$docsQuery = new Docs;
		$modulesList = $docsQuery->module_list();
		$smarty->assign("modulesList", $modulesList);
	break;
	case 'formation':
		require_once('./classes/class.forma.php'); //Inclusion de la class formation
		$formaQuery = new Formations($db);
		$smarty->assign("allFormation", $formaQuery->get_arr_formation());
	break;
	default:
		# code...
		break;
}

/*****  -Contrôle de contenu-  *****\*/
$smarty->assign("global_info_dev", get_defined_vars());

//smarty exemple
$smarty->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
//table exemple
$smarty->assign("FirstName", array("John", "Mary", "James", "Henry"));
$smarty->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));

$smarty->assign("Class", array(array("A", "B", "C", "D"), array("E", "F", "G", "H"), array("I", "J", "K", "L"),
                               array("M", "N", "O", "P")));
$smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "double" => "760-1234"),
                                  array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234")));
$smarty->assign("option_values", array("NY", "NE", "KS", "IA", "OK", "TX"));
$smarty->assign("option_output", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));
$smarty->assign("option_selected", "NE");
//Affichage générale
$smarty->display('index.tpl');

/*****  -Contrôle de notifications-  *****\*/
/**
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
//Si il existe une notification on l'affiche
echo (isset($noty)) ? "<script type=\"text/javascript\">view_notif(".json_encode($noty).");</script>" : false;
?>