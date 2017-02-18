<?php

    Class Stagiaire extends User{
        
        private $db;
        public function __construct($db){
            $this->_db = $db;
        }

        /**
         * Function qui retourne un tableau des formation
         *
         * @return Array 		-Tableau des plugins (HTML/CSS/JS)
         */
    	private function get_list_stagiaire(){
		 	try {
				$stmt = $this->_db->query('SET NAMES utf8');
				$stmt = $this->_db->query('SELECT name, first_name, email, date_naissance, adresse_1, adresse_2, adresse_3, code_postal, ville, telephone, level_diplom, id_formation, id_image, full_profile FROM users WHERE power = 2');
				$listStagiaire = $stmt->fetchAll();
			 	return $listStagiaire;
			} catch(PDOException $e) {
			    echo '<p class="error">'.$e->getMessage().'</p>';
			}
    	}

        /**
         * Function qui créer un utilisateur en BDD
         *
         * @param Array $arrAddUser         - Tableau cotenant les valeur a ajouter en base de donnée
         *
         * @return bolean                   - true si tout c'est bien passer
         */
        private function add_SQL_user($arrAddUser){
            try{
                $arrAddUser['password'] = $this->myEncrypt($key, rand_string(8), $mode);
                $stmt = $this->_db->prepare('INSERT INTO formations (short_name, long_name, description, level_down, date_in, date_out, mode) VALUES (:short_name, :long_name, :description, :level_down, :date_in, :date_out, :mode)');
                $stmt->execute(array(
                    ':login' => $arrAddUser['login'],
                    ':password' => $arrAddUser['password'],
                    ':name' => $arrAddUser['name'],
                    ':first_name' => $arrAddUser['firstname'],
                    ':email' => $arrAddUser['email'],
                    ':power' => intval($arrAddUser['power'])
                    ));
                return true;
            } catch(PDOException $e) {
                return false;
            }
        }

        /**
         * Function qui retourne la liste des utilisateur de type stagiaire (power == '2')
         *
         * @return array                   - tableau des stagiaires
         */
    	public function get_arr_stagiaire(){
    		return $this->get_list_stagiaire();
    	}

        /**
         * Function de traitement avant création de l'utilisateur en BDD
         *
         * @param Array $arrAddUser         - Tableau cotenant les valeur a ajouter en base de donnée
         *
         * @return Array                  - renvoi un tableau des information et erreur en cas d'echec ou un message de succès dans l'autre cas
         */
        public function add_new_user($arrAddUser){
            /**
            *   Traitement Nom de l'utilisateur
            * Si il n'existe pas de variable post "name" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddUser['name']) || $arrAddUser['name']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucun nom n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddUserEchec['isset_name'] = $arrAddUser['name'];
            }

            /**
            *   Traitement Prénom de l'utilisateur
            * Si il n'existe pas de variable post "firstname" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddUser['firstname']) || $arrAddUser['firstname']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucun prénom n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddUserEchec['isset_firstname'] = $arrAddUser['firstname'];
            }

            /**
            *   Traitement Email de l'utilisateur
            * Si il n'existe pas de variable post "email" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddUser['email']) || $arrAddUser['email']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucune adresse mail n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddUserEchec['isset_email'] = $arrAddUser['email'];
            }

            /**
            *   Traitement Email de l'utilisateur
            * Si il n'existe pas de variable post "power" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddUser['power']) || $arrAddUser['power']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucune permission n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddUserEchec['isset_power'] = $arrAddUser['power'];
            }

            /**
            *   Envoie final à la classe pour insertion en BDD
            *
            * Si il n'existe pas d'erreurs et si la fonction d'ajout en base de donnée retourne true on assigne le message de succès
            */
            if(!isset($noty)){
                //Si la fonction d'ajout return true
                if($this->add_SQL_user($arrAddUser)){
                    //On ajoute un message de succès à "$noty"
                    $noty[] = simply_notif('success', ADDUSERSUCCES, "center");
                    //Et on retourne '$noty'
                    return $noty;
                }
            //Sinon il existe des erreurs
            }else{
                //On stock ces erreurs dans un tableau à la clef 'noty'
                $returnArray['noty'] = $noty;
                //On stock les bonnes valeurs à renvoyées
                $returnArray['arrAddUser'] = $arrAddUserEchec;
                //Et on retourne le tableau qui sera récupéré et traité
                return $returnArray;
            }
        }

        public function testcrypt(){
            $pass = $this->rand_string(8);
            var_dump($pass);
            return $this->myEncrypt(PASSWORD_SCRYPT, $pass, PASSWORD_MODE);
        }
        public function testdecrypt($cryptedpass){
            $decryptedPass = $this->myDecrypt(PASSWORD_SCRYPT, $cryptedpass, PASSWORD_MODE);
            var_dump($decryptedPass);
            return $decryptedPass;
        }
    }
