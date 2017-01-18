<?php
function rand_pass() {
	$pass = NULL;
	$alpha = '0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ'; //60
    $fourchette = rand(6,12);
    //Généation du mot de pass
	for ($i = 0; $i < $fourchette; $i++) {
	    $n = rand(0, strlen($alpha)-1);
	    $pass .= $alpha[$n];
	}
	return $pass;
}
$rand_pass = rand_pass();
echo $rand_pass;
?>