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
$tpl = new Smarty;
//Active le debugger
//$tpl->debugging = false;
/***************  -A activer en prod-  ***************\
//Active la compilation
$tpl->force_compile = false;
//Active la mise en cache
$tpl->caching = false;
//Temps de vie du cache en seconde
$tpl->cache_lifetime = 120;
*/


/***************  -Contrôle de session-  ***************\*/
require_once('./classes/class.user.php'); //Inclusion de la class utilisateur
$user = new User($db);	//Initialise la class User
$tpl->assign("loggedin", false); //Etat de la session par defaut "false"
//$noty[] = simply_notif('danger', NOTCO);
$power = 2;


/***************  -Contrôle de menu-  ***************\*/
require_once('./classes/class.menu.php'); //Inclusion de la class menu
//Initialisation de l'objets Menu
$menuQuery = new Menu;
//Transfert de la vue Menu HTML au template
$tpl->assign("left_menu", $menuQuery->html_menu($power));
//Initialisation de la page par requête GET
$page = (isset($_GET['p'])) ? $_GET['p'] : "accueil";
//Transfert de la vue file d'arianne au template
$tpl->assign("arianna", $menuQuery->html_arianna($page));
//Transfert de la page à la vue
$tpl->assign("page", "templates/page/".$page);

//perm au max (3)
$tpl->assign("perm", 2);
if(substr_count($page, 'docs')==true){
	$page = 'docs';
}
switch ($page) {
	case 'docs':
		require_once('./classes/class.docs.php'); //Inclusion de la class documentation
		$docsQuery = new Docs;
		$modulesList = $docsQuery->module_list();
		$tpl->assign("modulesList", $modulesList);
	break;
	case 'formation':
		require_once('./classes/class.forma.php'); //Inclusion de la class formation
		$formaQuery = new Formations($db); //Initialisation de l'objet Formations

		//Initialisation de isset_modeFormation
		$tpl->assign("isset_modeFormation", null);
		/*Création de l'objet select du formulaire d'ajout
		*	 	Assignation des valeurs		*/
		$tpl->assign("levelFormation_values", array("", "Bac +2", "Bac +3", "Bac +5"));
		//		Assignation des textes d'otpions
		$tpl->assign("levelFormation_output", array("-- Niveau diploment --", "Bac +2", "Bac +3", "Bac +5"));
		//		Assignation de l'option selected
		$tpl->assign("levelFormation_selected", "");	

		if(isset($_GET['op'])=='del' && isset($_GET['id'])){
			if($formaQuery->delete_formation_by_id($_GET['id'])){
				$noty[] = simply_notif('success', "Formation supprimer !");
			}
		}

		//Si l'utilisateur à envoyer le formulaire d'ajout d'une formation
		if(isset($_POST['addFormation'])){
			return $formaQuery->add_formation($_POST);
			header("refresh;2:url=./?p=formation");
		}

		//Assigne le tableau des formation a la variable de vue "allFormation"
		$tpl->assign("allFormation", $formaQuery->get_arr_formation());
	break;
	case 'stagiaire':
		require_once('./classes/class.stag.php'); //Inclusion de la class stagiaire
		$stagQuery = new Stagiaire($db);
		$tpl->assign("allStagiaire", $stagQuery->get_arr_stagiaire());
	break;
	default:
		# code...
		break;
}

/*****  -Contrôle de contenu-  *****\*/
$tpl->assign("global_info_dev", get_defined_vars());

//smarty exemple
$tpl->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
//table exemple
$tpl->assign("FirstName", array("John", "Mary", "James", "Henry"));
$tpl->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));

$tpl->assign("Class", array(array("A", "B", "C", "D"), array("E", "F", "G", "H"), array("I", "J", "K", "L"),
                               array("M", "N", "O", "P")));
$tpl->assign("contacts", array(array("phone" => "1", "fax" => "2", "double" => "760-1234"),
                                  array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234")));
$tpl->assign("option_values", array("NY", "NE", "KS", "IA", "OK", "TX"));
$tpl->assign("option_output", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));
$tpl->assign("option_selected", "NE");
//Affichage générale
$tpl->display('index.tpl');

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
<script type="text/javascript">
	$("#dateInForm").inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
	$("#dateOutForm").inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
</script>