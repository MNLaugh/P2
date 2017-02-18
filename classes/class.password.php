<?php

    Class Password {

        public function __construct() {}

        private $key = PASSWORD_SCRYPT;
        private $mode = PASSWORD_MODE;
        /**
         * Encrypt the password
         *
         * @param string $password          - The password to crypt
         * @param string    $key            - The algorithm to use (Defined by PASSWORD_* constants)
         * @param param  $mode              - The mode to use (Defined by PASSWORD_* constants)
         *
         * @return string|false The hashed password, or false on error.
         */
        function myEncrypt($key, $password, $mode){
            $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, $mode);
            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
            $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $password, MCRYPT_MODE_CBC, $iv);
            $ciphertext = $iv . $ciphertext;
            $ciphertext_base64 = strrev(base64_encode($ciphertext));
            return $ciphertext_base64;
        }
        /**
         * Decrypt the password
         *
         * @param string $cryptedpass       - The password to hash
         * @param string    $key            - The algorithm to use (Defined by PASSWORD_* constants)
         * @param param  $mode              - The mode to use (Defined by PASSWORD_* constants)
         *
         * @return string|false The hashed password, or false on error.
         */
        function myDecrypt($key, $cryptedpass, $mode){
            $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, $mode);
            $ciphertext_base64 = strrev($cryptedpass);
            $ciphertext_dec = base64_decode($ciphertext_base64);
            $iv_dec = substr($ciphertext_dec, 0, $iv_size);
            $ciphertext_dec = substr($ciphertext_dec, $iv_size);
            $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,  $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
            $plaintext_dec = substr($plaintext_dec, -16, 8);
            return $plaintext_dec;
        }
        /**
        *   Fonction qui retourne une chaine de caractère aléatoire
        *
        *   @param  Int         - Paramètre de longueur de la chaine
        *   @return String      - Chaine de caractère
        */
        function rand_string($length){
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
    }