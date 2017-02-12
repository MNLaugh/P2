<?php
ob_start();
session_start();
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', 'cache/logs/error_php.txt');
$nowDate = date('Y-m-d');
$nowTimestamp = strtotime($nowDate);
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

$pageNameF = $page;
//Initialisation de la variable nom de page visible à droite dans le navbar et dans le titre de l'onglet. 
$tpl->assign("pageName", $pageNameF);
//Transfert de la page à la vue.
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
		$level_list = get_level_list($db);

		$tpl->assign("levelFormation_values", $level_list['value']);
		//		Assignation des textes d'otpions
		$tpl->assign("levelFormation_output", $level_list['name']);
		//		Assignation de l'option selected
		$tpl->assign("levelFormation_selected", "");

		$op = (isset($_GET['op']))? $_GET['op']: "list";
		switch ($op) {
			//Suppression d'une formation
			case 'del':
				//Si il existe un paramètre get id
				if(isset($_GET['id'])){
					//Et si la suppression retourne true
					if($formaQuery->delete_formation_by_id($_GET['id'])){
						//On affiche la notification de suppression effectuer
						$noty[] = simply_notif('success', "Formation supprimer !");
						header('Refresh:2;url=./?p=formation');
					}
				}
			break;

			case 'view':
				$tpl->assign("view", 1);
				if(isset($_GET['id'])){
					if($formaQuery->get_formation_by_id($_GET['id'])){
						$once_form = $formaQuery->get_formation_by_id($_GET['id']);
						$tpl->assign("uniq_form", $once_form);
						//		Assignation de l'option selected
						$tpl->assign("levelFormation_selected", $once_form['id_level']);

						$inTimestamp = strtotime($once_form['date_in']);
						$outTimestamp = strtotime($once_form['date_out']);
						$inInterval = $nowTimestamp-$inTimestamp;
						$outInterval = $nowTimestamp-$outTimestamp;

						if($inInterval < 0 && $outInterval < 0){
							$tpl->assign("textDate", "<h6>Formation à venir</h6>");
						}elseif($inInterval > 0 && $outInterval > 0){
							$tpl->assign("textDate", "<h6>Formation terminée</h6>");
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

							$dayTotal = $daysPass+$daysFutur;
							$percent = ($daysPass*100)/$dayTotal;
							$tpl->assign("progressBarForm", progress_bar($percent, $daysPass.' jours passés', $daysFutur.' jours restant'));
						}

						//Traitement update
						if(isset($_POST['updateFormation'])){
							//On envoie tout les contenu du formulaire dans la fonction d'ajout de l'objet Formation
							$updateFormTab = $formaQuery->operating_formation($_POST, 'update');
							$tpl->assign("test", $updateFormTab);
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
							if(count($noty)==1 && isset($noty['type'])=='success'){
								header("refresh;2:url=" .$_SERVER['PHP_SELF']);
							}
						}
					}
				}else{
					$noty[] = simply_notif('danger', "Aucune formation trouver !");
				}
			break;
			default:
				//Ajout d'une formation
				if(isset($_POST['addFormation'])){
					//On envoie tout les contenu du formulaire dans la fonction d'ajout de l'objet Formation
					$addFormTab = $formaQuery->operating_formation($_POST, 'add');
					$tpl->assign("test", $_POST);
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
				//Assigne le tableau des formation a la variable de vue "allFormation"
				$tpl->assign("allFormation", $formaQuery->get_arr_formation());
			break;
		}
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