<?php
ob_start();
session_start();
// Afficher les erreurs à l'écran (A passer à '0' en production)
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log oui (1), non (0)
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', 'cache/logs/error_php.txt');
//Initialise la zone pour les dates
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK

//Initialise la date du jour
$nowDate = date('Y-m-d');
//Convertion de cette date en timestamp Unix pour manipulation
$nowTimestamp = strtotime($nowDate);

/*****  -IMPORT -Classes- && -Fonctions- && -Constantes-  *****\*/
require_once('configs/func.php'); //Fonctions
require_once('configs/const.php'); //Constantes
//SMARTY
require 'smarties/libs/Smarty.class.php';	//Inclusion de la class MVC
$tpl = new Smarty; 							//Initialisation de l'objet Smarty
//USER
require_once('./classes/class.user.php'); 	//Inclusion de la class utilisateur
$user = new User($db);						//Initialise la class User
//MENU
require_once('./classes/class.menu.php'); 	//Inclusion de la class menu
$menuQuery = new Menu;						//Initialisation de l'objets Menu
//IMAGE
require_once('./classes/class.image.php');	//Inclusion de la class image
$imgQuery = new Image($db); 				//Initialisation de l'objet Image
//STAGIAIRE
require_once('./classes/class.stag.php');	//Inclusion de la class stagiaire
$stagQuery = new Stagiaire($db);			//Initialisation de l'objet Stagiaire
//FORMATION
require_once('./classes/class.forma.php');	//Inclusion de la class formation
$formaQuery = new Formations($db); 			//Initialisation de l'objet Formations

//Active le debugger si besoin
//$tpl->debugging = false;
/***************  -A activer en prod-  ***************\*/
//Active la compilation
$tpl->force_compile = true;
//Active la mise en cache
$tpl->caching = false;
//Temps de vie du cache en seconde
$tpl->cache_lifetime = 120;



/***************  -Contrôle de session-  ***************\*/

if($user->is_logged_in()){
	if(isset($_GET['logged'])=="out"){
		$user->logout();
		header('Location: ./');
	}
	/** Format date du jour **/
	$today = utf8_encode(strftime("%A %d %B %Y")); //Date du jour au format texuel (Exemple : mardi 1 janvier 2016)
	$tmpArrToday = explode(' ', $today);	//4 elems Passe le string en tableau
	$tmpArrToday[0] = ucfirst($tmpArrToday[0]); //Passe la première letttre du mot en majuscule
	$today = $tmpArrToday[0] .' '. $tmpArrToday[1] .' '. $tmpArrToday[2] .' '. $tmpArrToday[3]; //Recompose le string
	$tpl->assign("today", $today); //Assignation a smarty
	/** Information utilisateur **/
	$tpl->assign("loggedin", true); //Etat de la session par defaut "false"
	$tpl->assign("id_user", $_SESSION['user_id']);
	$tpl->assign("user_login", $_SESSION['user_login']);
	$tpl->assign("user_email", $_SESSION['user_email']);
	$power = $_SESSION['user_power'];
	$power = 1;
	$tpl->assign("user_power", $power);
	$tpl->assign("user_textuel_power", $user->textuel_power($power));
	$user_img_default = DEFAULT_AVATAR;
	$sessionUserInfos = $user->get_user_by_id($_SESSION['user_id']);
	$tpl->assign("pageName", $user->textuel_power($power));
	if($sessionUserInfos['id_image']!=0){
		$imgInfos = $imgQuery->get_infos_img_by_id($sessionUserInfos['id_image']);
		$tpl->assign("user_img", TARGET_UPLOAD_THUMBS.$imgInfos['thumbnail_name']);
	}else{
		$tpl->assign("user_img", DEFAULT_AVATAR);
	}
	$tpl->assign("user_img_alt", 'Image utilisateur');

	//Si le grade n'est pas stagiaire
	if($power!=2){
		/***************  -Contrôle de menu-  ***************\*/
		//Transfert de la vue Menu HTML au template
		$tpl->assign("left_menu", $menuQuery->html_menu($power));
		//Initialisation de la page par requête GET
		$page = (isset($_GET['p']) && in_array($_GET['p'], $allPageList)) ? $_GET['p'] : "accueil".$power;
		//Transfert de la vue file d'arianne au template
		$tpl->assign("arianna", $menuQuery->html_arianna($page));
		//Initialisation de la variable nom de page visible à droite dans le navbar et dans le titre de l'onglet.
		$pageName = ($menuQuery->get_name_by_link($page)!=null)? $menuQuery->get_name_by_link($page) : $user->textuel_power($_SESSION['user_power']);
		//Transfert au template
		$tpl->assign("pageName", $pageName);
		
		//Si la var '$page' n'est pas égale a "accueil"
		if($page == "accueil0"){
			$pageLink = $page;
		}elseif($page == "accueil1"){
			$pageLink = $page;
		}else{
			//Et si il existe une lettre en majuscule dans la chaine
			if (preg_match('#^[^A-Z]*([A-Z].*)#', $page, $result)){
				//La variable op est égale à $page sans la partie avec la lettre en majuscule (Exemple pour : addFormation l'op est "add")
				$op = str_replace($result[1], "", $page);
				//Page link corrrespond au fichier à inclure dans l'index (Exemple pour : addFormation le lien est "formation/addFormation")
				$pageLink = strtolower($result[1]) .'/'. $op.$result[1];
				//La page coorespond a la case dans le switch (Exemple pour : addFormation la case est "formation")
				$page = strtolower(str_replace($op, "", $page));
			}else{
				//sinon il n'existe pas de majuscule dans la chaine est le lien est une page principale (Exemple pour : formation le lien est "formation/formation")
				$pageLink = $page .'/'. $page;
			}
		}

		//Transfert de la page à la vue.
		$tpl->assign("page", "templates/page/".$pageLink);
		//Switch des divers éléments du site
		switch ($page) {
			//Case de formation
			case 'formation':
				require_once('ctrl/ctrl.formation.php'); 	//Inclusion du contrôleur de formation
			break;
			//Case stagiaire
			case 'stagiaire':
				require_once('ctrl/ctrl.stagiaire.php');	//Inclusion du contrôleur de formation
			break;
			default:
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
						$userList[$id]['name'] = utf8_decode($u['name']);
						$userList[$id]['first_name'] = utf8_decode($u['first_name']);
					}
					$tpl->assign("listUser", $userList);
				}
			break;
		}
	//Sinon c'est un satgiaire
	}else{
		require_once('ctrl/ctrl.limtedStagiaire.php');
	}
//Sinon on affiche la page de login
}else{
	$tpl->assign("loggedin", false); //Etat de la session par defaut "false"
	if(isset($_POST['login'])){
		if(isset($_POST['username']) && $_POST['username']!=""){
			$login = $_POST['username'];
		}else{
			$noty[] = simply_notif('danger', NOT_LOGIN, "center");
		}
		if(isset($_POST['password']) && $_POST['password']!=""){
			$password = $_POST['password'];
		}else{
			$noty[] = simply_notif('danger', NOT_PASS, "center");
		}
		if(!isset($noty)){
			if($user->login($login,$password)){
				header('Location: ./?typeN=success&noty=LOGIN');
			}else{
				$noty[] = simply_notif('danger', ERROR_NOT_KNOW, "center");
			}
		}
	}
}


//Affichage générale
$tpl->display('index.tpl');


class notyGET{
    const LOGIN = 'Bienvenue !';
}
$notyGET = new ReflectionClass('notyGET');
if(isset($_GET['typeN']) && isset($_GET['noty'])){
	$noty[] = simply_notif($_GET['typeN'], $notyGET->getConstant($_GET['noty']), "center");
}

/*****  -Contrôle de notifications-  *****\*/
echo (isset($noty)) ? "<script type=\"text/javascript\">view_notif(".json_encode($noty).");</script>" : false;
?>
<script type="text/javascript">
//Exemple d'activation d'un tooltip (pour l'aide)
	//$("#allFormTT").tooltip('show');
//Général mask date input pour le model de date français
$("[type='date']").inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
$("[name='codePostal']").inputmask('99999');
$("[name='phone']").inputmask('9999999999');
</script>
