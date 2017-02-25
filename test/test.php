<?php
include('../configs/func.php');
include('../configs/const.php');
echo "<h1>Page de test</h1>";

// if(isset($_FILES['userfile'])){
// // Below lines are to display file name, temp name and file type , you can use them for testing your script only//////
// echo "File Name: ".$_FILES['userfile']['name']."<br>";
// echo "tmp name: ".$_FILES['userfile']['tmp_name']."<br>";
// echo "File Type: ".$_FILES['userfile']['type']."<br>";
// echo "<br><br>";
// ///////////////////////////////////////////////////////////////////////////
// $add=TARGET_UPLOAD.$_FILES['userfile']['name']; // the path with the file name where the file will be stored, upload is the directory name. 
// echo $add;
// if(move_uploaded_file ($_FILES['userfile']['tmp_name'],$add)){
//   echo "Image ajouter !";
//   chmod("$add",0777);
// }else{
//   echo "Une erreur inconnu c'est produite contacter un administrateur !";
//   exit;
// }

// function thumbnail_generator($n_width=50, $n_height=50, $file, $add){
//   $tsrc=TARGET_UPLOAD_THUMBS.$file['userfile']['name'];
//   if (!($file['userfile']['type'] =="image/jpeg" OR $file['userfile']['type']=="image/png")){
//     echo "L'extenstion choisi est obselète";
//     exit;
//   }
//   /////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
//   if($file['userfile']['type']=="image/png"){
//     $im=ImageCreateFromPNG($add); 
//     $width=ImageSx($im);              // Original picture width is stored
//     $height=ImageSy($im);             // Original picture height is stored
//     $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
//     $newimage=imagecreatetruecolor($n_width,$n_height);                 
//     imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
//     ImagePng($newimage,$tsrc);
//     chmod("$tsrc",0777);
//   }elseif($file['userfile']['type']=="image/jpeg"){
//     $im=ImageCreateFromJPEG($add); 
//     $width=ImageSx($im);              // Original picture width is stored
//     $height=ImageSy($im);             // Original picture height is stored
//     $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
//     $newimage=imagecreatetruecolor($n_width,$n_height);                 
//     imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
//     ImageJpeg($newimage,$tsrc);
//     chmod("$tsrc",0777);
//   }
// }
// thumbnail_generator($n_width=50, $n_height=50, $_FILES, $add);
// ////////////////  End of JPG thumb nail creation //////////
// echo "<br>width = ($width) $n_width , height = ($height) $n_height ";
// }else{
// ?>
// <form ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
// Upload this file: <input NAME="userfile" TYPE="file">
// <input TYPE="submit" VALUE="Send File"></form>
// <?php
// }
//         ini_set('SMTP','198.100.149.118');
// ini_set('smtp_port',25);
//                 $nomcomplet = 'coucou';
//                 $mail = 'djko4@live.fr';
//                 $subjet = "coucou test";
//                 $messageclient = nl2br('petit test');
//                 $date = date('Y-m-d H:i:s');

//                 $mailexp = utf8_decode($nomcomplet).' <'.$mail.'>';
//                 $to = 'contact@mnlaugh.com';
//                 //$to = 'nicolasmet@orange.fr';

//                 $subject = utf8_decode($subjet).' (contact margot.ovh)';
//                 $title = 'Nouveau message de ' . $nomcomplet.', avec l\'adresse mail '.$mail.'.';
//                 $message = 'Objet du message: '. $subjet .'<br>Message:<br>'.$messageclient;
//                 $links = '';
//                 //Fonction spécifique au contact mail L515

//   $header = "MIME-Version: 1.0". "\r\n";
//   $header .= "Content-type: text/html; charset=UTF-8". "\r\n";
//   $header .= 'From:'.$mailexp.''."\r\n";
//   $header .= 'Cc:  ' . 'contact@mnlaugh.com' . "\r\n";
//   // $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
//   $header .= 'X-Mailer: PHP/' . phpversion();

//   $content = '
//       <!-- Title -->
//       <tr>
//          <td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight:bold; color: #333333; text-align:left;line-height: 24px;">
//             '.$title.'
//          </td>
//       </tr>
//       <tr><td height="5"></td></tr>
//       <tr>
//          <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">
//             '.$message.'
//          </td>
//       </tr>
//       <tr><td width="100%" height="5"></td></tr>
//       <tr>
//          <td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight:bold; color: #333333; text-align:left;line-height: 24px;">
//             '.$links.'
//          </td>
//       </tr>
//       <tr><td width="100%" height="20"></td></tr>';
//     // Envoi le mail
//   mail( $to, $subject , $content, $header );



//Manipulation des date pour savoir si la formation est en cours, passer ou à venir
// echo "Now date : ";
// echo "<br>";
// $nowDate = date('Y-m-d');
// echo $nowDate;
// echo '<br>';
// $nowTimestamp = strtotime($nowDate);
// echo $nowTimestamp;
// echo '<br><br>';

// $stmt = $db->query('SELECT id_formation, short_name, long_name, date_in, date_out FROM formations');
// $listFormations = $stmt->fetchAll();
// foreach ($listFormations as $key => $value) {
// 	//if($value['short_name'] == "DISII"){
// echo '<br>-------------------<br>Formation : <br>';
// 	echo $value['long_name'];
// echo '<br><br>';

// echo "In date :";
// echo "<br>";
// 	echo $value['date_in'];
// echo '<br>';
// echo "In timestamp :";
// echo '<br>';
// 	$inTimestamp = strtotime($value['date_in']);
// 	echo $inTimestamp;
// echo '<br><br>';

// echo "Out date :";
// echo '<br>';
// 	echo $value['date_out'];
// echo '<br>';

// echo "Out timestamp :";
// echo '<br>';
// 	$outTimestamp = strtotime($value['date_out']);
// 	echo $outTimestamp;
// echo '<br><br>';

// 	echo utf8_decode('Début des calculs<br>');

// 	$inInterval = $nowTimestamp-$inTimestamp;
// 	$outInterval = $nowTimestamp-$outTimestamp;
	
// 	if($inInterval < 0 && $outInterval < 0){
// 		echo "<h4>Pas encore commencer</h4>";
// 	}elseif($inInterval > 0 && $outInterval > 0){
// 		echo "<h4>Fini</h4>";
// 	}else{
// 		echo "<h4>En cour</h4>";
// 	echo $inInterval;
// echo "<br> jour écouler: <br>";
// 	echo round((($inInterval/24)/60)/60);
// echo "<br><br>";
	
// 	echo $outInterval;
// 	echo "<br> jour rester: <br>";
// 	echo round((($outInterval/24)/60)/60)*-1;
// 	}



// echo "<br><br>";
// //}
// }

// var_dump($listFormations);
?>