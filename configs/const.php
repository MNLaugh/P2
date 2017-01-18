<?php
//------ MYSQL -------\\
/* Information de connection mysql
define('DBHOST','127.0.0.1');
define('DBNAME','nom_db');
define('DBUSER','user_db');
define('DBPASS','pass_db');
*/
$db = ""; //new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);

//------ MENU -------\\
$menu_list=array(
	//Noms
	"menu_nom" 	=> array(
		"Accueil",
		"Formations",
		"Stagiaires",
		"Documentations"
	),
	//Icones
	"menu_icon" => array(
		"home",
		"assignment",
		"assignment_ind",
		"info"
	),
	//Liens
	"menu_link" => array(
		"./",
		"./?p=form",
		"./?p=stag",
		array(
			"smenu_nom" => array(
				"Présentation", 
				"Variables", 
				"ClassPHP", 
				"Liens externes",
				"Template Html"
			),
			"smenu_link" => array(
				"./?p=docs/docs_accueil", 
				"./?p=docs/docs_var", 
				"./?p=docs/docs_class", 
				"./?p=docs/docs_link",
				"./html/"
			),
			"smenu_perm" => array(
				2, 
				2, 
				2, 
				2,
				2
			)
		)
	),
	//Permissions
	"menu_perm" => array(
		0,
		0,
		0,
		2
	)
);

//------ UPLOAD -------\\
$extension = '';
$message = '';
$nomImage = '';
define('TARGET_UPLOAD', 'folder');	// Repertoire cible public timeline
define('MAX_SIZE', 20000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 4000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 4000);    // Hauteur max de l'image en pixels
// Tableaux de donnees
$tabExt = array('JPG','jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();

//------ NOTIFICATIONS -------\\
//***Messages d'erreurs.***

//Pas de session active
define('NOTCO', 'Accès refuser! Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté!');
define('CO', 'Accès refuser! Vous ête déjà connecté!');
//LOGIN
define('ERRLOGIN', 'Erreur de connexion! Identifiant incorrect!');
define('ERRCONNECTION', 'Erreur de connexion! Un ou plusieurs champs sont vide!');
//USER FORM 
define('EMPTYUSERNAME', 'Erreur! Entrer un nom d\'utilisateur!');
define('EMPTYPASS', 'Erreur! Veuillez entrer un mot de passe!');
define('EMPTYPASSCOMFIRM', 'Erreur! Veuillez confirmer votre mot de passe!');
define('EMPTYPASSVERIF', 'Erreur! Les mots de passe ne correspondent pas!');
define('EMPTYMAIL', 'Erreur! Entrer une adresse mail!');
//FORM IMG 
define('EMPTYNAMEIMG', 'Erreur! Entrez un Nom!');
define('EMPTYDETAILS', 'Erreur! Champ détails vide!');
define('EMPTYURL', 'Erreur! Entrez un url!');
define('INVALIDURL', 'Erreur! Url invalide!');
define('EMPTYDATE', 'Erreur! Entrez une date!');
define('INVALIDDATE', 'Erreur! Format date invalide!');
define('EMPTYSTATUS', 'Erreur! Entrez un statut!');
//UPLOAD ERROR
define('EMPTYFILEIMG', 'Erreur! Ajouter une image!');
define('BADEXT', "Erreur! L'extension du fichier est incorrecte!");
define('FILENOTIMG', 'Erreur! Le fichier à uploader n\'est pas une image!');
define('BADSIZE', 'Erreur! Erreur dans les dimensions de l\'image!');
define('INTERROR', 'Erreur! Une erreur interne a empêché l\'uplaod de l\'image!');
define('BADUPLOAD', 'Erreur! Problème lors de l\'upload!');

/*END ERROR*/

//***Messages de succès.***
//Login
define('OKLOGIN', 'Succès! Connexion réussi!');
//GOOD UPLOAD
define('GOODUPLOAD', 'Succès! Image(s) upload avec succès!');
//User add/del
define('USERADDED', 'Succès! Utilisateur ajouter!');
define('USERUPDATED', 'Succès! Informations utilisateur modifier!');
define('USERDELETED', 'Succès! Utilisateur supprimer!');
?>
