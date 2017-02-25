<?php
//------ MYSQL -------\\
//Information de connection mysql
define('DBHOST','127.0.0.1');
define('DBNAME','gestiform');
define('DBUSER','root');
define('DBPASS','');
$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
define('PASSWORD_SCRYPT', pack('H*', strrev("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3")));
define('PASSWORD_MODE', MCRYPT_MODE_OFB);

$allPageList = array(
'formation', 
'addFormation', 
'viewFormation', 
'editFormation', 

'stagiaire', 
'adduserStagiaire', 
'viewStagiaire', 
'editStagiaire',
'singleStagiaire'
);

//------ UPLOAD -------\\
$extension = '';
$message = '';
$nomImage = '';
define('DEFAULT_AVATAR', './ressources/images/default-avatar.png');
define('TARGET_UPLOAD', "./ressources/images/upload/");	// Repertoire cible public images
define('TARGET_UPLOAD_THUMBS', "./ressources/images/upload/thumbs/");	// Repertoire cible thumbails
define('MAX_SIZE', 2000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 2000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 2000);    // Hauteur max de l'image en pixels
// Tableaux de donnees

$infosImg = array();

//------ NOTIFICATIONS -------\\
//***Messages d'erreurs.***
define('ERROR_NOT_KNOW', "Une erreur est survenu, nous en sommes désolé !");
//LOGIN
define('NOT_LOGIN', "Veuillez entrer un nom d'utilisateur !");
define('NOT_PASS', "Veuillez entrer un mot de passe !");

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
//FORMATION ERROR
define('NOT_ACRONYME', "Aucun acronyme n'a été saisie !");
define('NOT_FULL_NAME', "Aucun nom complet n'a été saisie !");
define('NOT_DESC', "Aucune description n'a été saisie !");
define('NOT_LEVEL', "Veuillez choisir un niveau diplomant !");
define('NOT_DATE_IN', "Aucune date d'entrée n'a été saisie !");
define('NOT_DATE_OUT', "Aucune date de fin n'a été saisie !");
define('INVALID_DATE_IN_OUT', "Date de début est supérieur à la date de fin !");
define('NOT_MODE', "Aucun mode de formation choisie !");
define('INVALID_ID', "Identifiant de formation invalide !");

/*END ERROR*/

//***Messages de succès.***
//Login
define('OKLOGIN', 'Succès! Connexion réussi!');
//GOOD UPLOAD
define('GOODUPLOAD', 'Image ajouté avec succès!');

//FORMATION SUCCES
define('ADDFORMSUCCES', "Formation ajouté avec succès !");
define('UPDATEFORMSUCCES', "Formation modifié avec succès !");


define('ADDUSERSUCCES', 'Utilisateur ajouté!');
define('USERUPDATED', 'Informations utilisateur modifié!');
define('USERDELETED', 'Utilisateur supprimé!');
//Edit utilisateur sucès
define('EDITUSERSUCCES', "Utilisateur modifié !");
?>
