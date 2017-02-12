<?php
include('configs/func.php');
include('configs/const.php');
echo "<h1>Page de test</h1>";

//Manipulation des date pour savoir si la formation est en cours, passer ou à venir
echo "Now date : ";
echo "<br>";
$nowDate = date('Y-m-d');
echo $nowDate;
echo '<br>';
$nowTimestamp = strtotime($nowDate);
echo $nowTimestamp;
echo '<br><br>';

$stmt = $db->query('SELECT id_formation, short_name, long_name, date_in, date_out FROM formations');
$listFormations = $stmt->fetchAll();
foreach ($listFormations as $key => $value) {
	//if($value['short_name'] == "DISII"){
echo '<br>-------------------<br>Formation : <br>';
	echo $value['long_name'];
echo '<br><br>';

echo "In date :";
echo "<br>";
	echo $value['date_in'];
echo '<br>';
echo "In timestamp :";
echo '<br>';
	$inTimestamp = strtotime($value['date_in']);
	echo $inTimestamp;
echo '<br><br>';

echo "Out date :";
echo '<br>';
	echo $value['date_out'];
echo '<br>';

echo "Out timestamp :";
echo '<br>';
	$outTimestamp = strtotime($value['date_out']);
	echo $outTimestamp;
echo '<br><br>';

	echo utf8_decode('Début des calculs<br>');

	$inInterval = $nowTimestamp-$inTimestamp;
	$outInterval = $nowTimestamp-$outTimestamp;
	
	if($inInterval < 0 && $outInterval < 0){
		echo "<h4>Pas encore commencer</h4>";
	}elseif($inInterval > 0 && $outInterval > 0){
		echo "<h4>Fini</h4>";
	}else{
		echo "<h4>En cour</h4>";
	echo $inInterval;
echo "<br> jour écouler: <br>";
	echo round((($inInterval/24)/60)/60);
echo "<br><br>";
	
	echo $outInterval;
	echo "<br> jour rester: <br>";
	echo round((($outInterval/24)/60)/60)*-1;
	}



echo "<br><br>";
//}
}

var_dump($listFormations);
?>