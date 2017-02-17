<?php

$first_name = 'Coco';
$name = 'Lasticot';
echo $name;
echo "<br>";
echo $first_name;
echo "<br>";
function get_login_by_name($name, $first_name){
		$name = mb_strtolower($name);
		$first_len = strlen($first_name);
		$first_name_substr = mb_strtolower(substr($first_name, $first_len*-1, 1));
		return $first_name_substr.$name;
}
 echo get_login_by_name($name, $first_name);
	/**
	*	Fonction qui retourne une chaine de caractère aléatoire
	*
	*	@param 	Int 		- Paramètre de longueur de la chaine
	*	@return String 		- Chaine de caractère
	*/
	 function rand_string($length) {
		//Initialise la variable "string"
		$string = NULL;
		//Déclaration de la variable contenant tous les caractères disponibles
		$alpha = '#!}@$%^&+={|>0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ'; //78
		$arr = str_split($alpha);
		//Boucle sur le nombre passé en paramètre
		for ($i = 0; $i < $length; $i++) {
			//On choisit un caractère de manière aléatoire dans "alpha"
		    $n = rand(0, count($arr)-1);
		    //Concataine les caractères sélectionnés à chaque boucle
		    $string .= $arr[$n];
		}
		//On retourne notre chaine finale
		return $string;
	}
	$rand_string = rand_string(8);
	echo "<br><br>pass length : ". strlen($rand_string);
	echo "<br>pass : ". $rand_string ."<br>";


    # --- CHIFFREMENT ---

    $key = pack('H*', strrev("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3"));
    $plaintext = $rand_string;
    $mode = MCRYPT_MODE_OFB;
    


function myEncrypt($key, $plaintext, $mode){
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, $mode);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;
    $ciphertext_base64 = strrev(base64_encode($ciphertext));
    return $ciphertext_base64;
}
$ciphertext_base64 = myEncrypt($key, $plaintext, $mode);
echo "<br><br>encrypted<br>";
echo $ciphertext_base64;

function myDecrypt($key, $ciphertext_base64, $mode){
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, $mode);
    $ciphertext_base64 = strrev($ciphertext_base64);
    $ciphertext_dec = base64_decode($ciphertext_base64);
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,  $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    return $plaintext_dec;
}
echo "<br><br>decrypted<br>";
echo myDecrypt($key, $ciphertext_base64, $mode);
?>