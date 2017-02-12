<?php
function array_by_excel($array, $caractExclusif){
	$nbKey = 0;
	$valArr = [];
	foreach ($array as $ligne) {
		//var_dump($ligne);
		foreach ($ligne as $col) {
			foreach ($col as $cell) {
				if(substr_count($cell, 'Colonne')==false){
					$nbKey++;
					if(substr_count($cell, $caractExclusif)==true){
						$keyArr[] = str_replace('key ', '', $cell);
					}else{
						if($cell == "coucou"){ $cell = ''; }
						$valArr[] = $cell;
					}
				}
			}
			// echo "<pre>";
			// var_dump($valArr);
			// echo "</pre>";
		}
	}
	//Déclare le tableau finale
	//$finalArrayExcel = array('key' => $keyArr, 'val' => $valArr,);
	//compte le nombre de clef
	$nbK = count($keyArr);
	//compte le nombre de valeur
	$nbV = count($valArr);
	//Divise nombre de valeur par nombre de clef
	$gM = $nbV/count($keyArr);
	//Defini le départ de la boucle 2 à 0
	$min = 0;

	$attributs = '';
	for ($k=0; $k <= $nbK-1; $k++) {
		$attributs .= '`'.$keyArr[$k].'`, ';
	}
	$sqlString = 'INSERT INTO `table_name` ('. mb_substr($attributs, 0, -2) .') VALUES ';
	$itemG = '';
	//Début de la 1er boucle
	for ($ig=0; $ig <= $gM; $ig++) {
		//Si la variable "$ig" n'est pas égale à 0
		if($ig!=0){
			//On défini le début de la boucle à "$nbK (Nombre de clef, 8) multiplier par le numéro du tour actuel"
			$min = $nbK*$ig;
			//On défini la fin de la boucle à "(("$nbK" (Nombre de clef, 8) multiplier par le numéro du tour "$ig")-1)+$nbK (8)"
			$max = (($nbK*$ig)-1)+$nbK;
		//Sinon la variable "$ig" est égale à 0 (premier tour) 
		}else{
			//La boucle commençera à 0
			$min = 0;
			//Elle finira à 8-1= "7"
			$max = $nbK-1;
		}
		//Si le nombre de fin de boucle dépasse le nombre de valeur $max deviens le nombre de valeur moins 1
		if($max>=$nbV){ $max = $nbV-1;}
		$item = '';
		//Et on boucle entre nos paramètre $min et $max
		for ($i=$min; $i <= $max; $i++) {
			if(gettype($valArr[$i])=='string'){
				$item .= '"'.$valArr[$i].'", ';
			}elseif(gettype($valArr[$i])=='double'){
				$item .= ''.$valArr[$i].', ';
			}
		}
		$item = mb_substr($item, 0, -2);
		$item = '('.$item."), ";
		$itemG .= $item;
	}
	return mb_substr($sqlString . $itemG, 0, -6) .';';
	//return $finalArrayExcel;
}
require_once 'Classes/PHPExcel/IOFactory.php';
// Chargement du fichier Excel
$excelFile = "file_name.xlsx";
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($excelFile);
//Itrating through all the sheets in the excel workbook and storing the array data
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $arrayData[$worksheet->getTitle()] = $worksheet->toArray();
}

echo '<pre>';
echo array_by_excel($arrayData, "key");
echo '</pre>';
?>