<?php
if(isset($_POST['keyword'])){
	$searched = $_POST['keyword'];
	require_once('../configs/func.php'); //Fonctions
	require_once('../configs/const.php'); //Constantes
	require_once('../classes/class.search.php');	//Inclusion de la class formation
	$searchQuery = new Search($db); 			//Initialisation de l'objet Formations
	$result = $searchQuery->autoComplete_searching($searched);
	$result = json_encode($result);
	echo $result;
}
?>