<?php
/**
*	Fonction qui retourne une chaine de caractère aléatoire
*
*	@param 	Int 		- Paramètre de grandeur de la chaine
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
//Initialise une chaine de caractère de 8 caractères
$randPassword = rand_string(8);
//Affiche le résultat
echo $randPassword ."<br>";
echo strlen($randPassword) ."<br>";
//Initialise une chaine de caractère de 4 caractères
$randID = rand_string(4);
//Affiche le résultat
echo $randID ."<br>";
echo strlen($randID)
?>