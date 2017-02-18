<?php

    Class Formations {

        private $db;
        public function __construct($db){
			$this->_db = $db;
		}

        /**
         * Function qui retourne le tableau des formations
         *
         * @return Array 		-Tableau des formations
         */
    	private function get_list_formation(){
		 	try {
				$stmt = $this->_db->query('SET NAMES utf8');
				$stmt = $this->_db->query(
                    'SELECT id_formation, short_name, long_name, description, level_name, date_in, date_out, mode FROM formations, level_diplome WHERE level_down = id_level'
                );
				$listFormations = $stmt->fetchAll();
			 	return $listFormations;
			} catch(PDOException $e) {
			    echo '<p class="error">'.$e->getMessage().'</p>';
			}
    	}

        /**
         * Function qui retourne le tableau d'une formation par l'id
         *
         * @return Array        -Tableau des formations
         */
        private function get_once_by_id_formation($idFormation){
            try {
                $stmt = $this->_db->query('SET NAMES utf8');
                $stmt = $this->_db->query(
                    'SELECT id_formation, short_name, long_name, description, date_in, date_out, mode, id_level, level_name FROM formations, level_diplome WHERE id_formation = '. $idFormation .' AND level_diplome.id_level = formations.level_down');
                $listFormations = $stmt->fetch();
                return $listFormations;
            } catch(PDOException $e) {
                return false;
            }
        }

        public function get_formation_by_id($id){
            if($this->get_once_by_id_formation($id)){
                return $this->get_once_by_id_formation($id);
            }else{
                return false;
            }
        }
        /**
         * Function qui insert une formation en BDD
         *
         * @param Array $arrAddFormation        - Tableau cotenant les valeur a ajouter en base de donnée
         *
         * @return bolean       - true si tout c'est bien passer
         */
        private function add_SQL_formation($arrAddFormation){
            try{
                $stmt = $this->_db->prepare('INSERT INTO formations (short_name, long_name, description, level_down, date_in, date_out, mode) VALUES (:short_name, :long_name, :description, :level_down, :date_in, :date_out, :mode)');
                $stmt->execute(array(
                    ':short_name' => $arrAddFormation['sNameFormation'],
                    ':long_name' => $arrAddFormation['lNameFormation'],
                    ':description' => $arrAddFormation['descFormation'],
                    ':level_down' => intval($arrAddFormation['levelFormation']),
                    ':date_in' => convert_date_FRinUS($arrAddFormation['dInFormation']),
                    ':date_out' => convert_date_FRinUS($arrAddFormation['dOutFormation']),
                    ':mode' => intval($arrAddFormation['modeFormation'])
                    ));
                return true;
            } catch(PDOException $e) {
                return false;
            }
        }

        /**
         * Function qui met à jour les information d'une formation en BDD
         *
         * @param Array $arrUpdateFormation        - Tableau des valeurs mis à jour
         *
         * @return boolean       - true si tout c'est bien passer
         */
        private function update_SQL_formation($arrUpdateFormation){
            var_dump($arrUpdateFormation);
            try{
                $stmt = $this->_db->prepare('UPDATE formations SET short_name=:short_name, long_name=:long_name, description=:description, level_down=:level_down, date_in=:date_in, date_out=:date_out, mode=:mode WHERE id_formation=:id_formation');
                $stmt->execute(array(
                    ':short_name' => $arrUpdateFormation['sNameFormation'],
                    ':long_name' => $arrUpdateFormation['lNameFormation'],
                    ':description' => $arrUpdateFormation['descFormation'],
                    ':level_down' => intval($arrUpdateFormation['levelFormation']),
                    ':date_in' => convert_date_FRinUS($arrUpdateFormation['dInFormation']),
                    ':date_out' => convert_date_FRinUS($arrUpdateFormation['dOutFormation']),
                    ':mode' => intval($arrUpdateFormation['modeFormation']),
                    ':id_formation' => $arrUpdateFormation['idFormation']
                    ));
                return true;
            } catch(PDOException $e) {
                //fonction erreur
                //echo '<p class="error">'.$e->getMessage().'</p>';
                return false;
            }
        }

        /**
         * Fonction de suppression SQL d'une formation
         *
         * @param Int $idFormation    - Identifiant de la formation à supprimer
         * @return Boolean                  - renvoi "true" si tout c'est bien passer
         */
        private function del_SQL_formation($idFormation){
            try{
                $stmt = $this->_db->query('DELETE from formations WHERE id_formation='. $idFormation);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                return false;
            }
        }

        /**
         * Fonction de suppression d'une formation
         *
         * @param Int $idFormation          - Identifiant de la formation à supprimer
         * @return Boolean                  - renvoi "true" si tout c'est bien passer
         */
        public function delete_formation_by_id($idFormation){
            if($this->get_once_by_id_formation($idFormation)){
                return $this->del_SQL_formation($idFormation);
            }else{
                return false;
            }
        }

        /**
         * Function qui met à jour les informations d'une formation en BDD
         *
         * @param Array $arrUpdateFormation         - Tableau des valeurs mis à jour
         *
         * @return boolean                          - true si tout c'est bien passer
         */
        private function update_by_id_formation($arrUpdateFormation){
<<<<<<< HEAD
            if($this->get_once_by_id_formation($arrUpdateFormation['idFormation'])){
=======
            //Vérifi l'existance de la formation à mettre à jour
            if($this->get_once_by_id_formation($arrUpdateFormation['id_formation'])){
>>>>>>> 2fcd882aa1116788f6645741627a9465d0e1ac74
                return $this->update_SQL_formation($arrUpdateFormation);
            }else{
                return false;
            }
        }

        /**
         * Function qui retourne le tableau des formations
         *
         * @return Array        -Tableau des formations
         */
    	public function get_arr_formation(){
    		return $this->get_list_formation();
    	}

        /**
         * Fonction d'ajout d'une formations
         *
         * @param Array $arrAddFormation    - Tableau contenant les valeurs a ajouter à la base de donnée
            * sNameFormation
            * lNameFormation
            * descFormation
            * levelFormation
            * dInFormation
            * dOutFormation
            * modeFormation
         * @return Array                  - renvoi un tableau des information et erreur en cas d'echec ou un message de succès dans l'autre cas
         */
        public function operating_formation($arrAddFormation, $operation){
            /**
            *   Traitement Nom court formation
            * Si il n'existe pas de variable post "sNameFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['sNameFormation']) || $arrAddFormation['sNameFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucun acronyme n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_sNameFormation'] = $arrAddFormation['sNameFormation'];
            }

            /**
            *   Traitement Nom long formation
            * Si il n'existe pas de variable post "lNameFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['lNameFormation']) || $arrAddFormation['lNameFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucun nom complet n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_lNameFormation'] = $arrAddFormation['lNameFormation'];
            }

            /**
            *   Traitement Description formation
            * Si il n'existe pas de variable post "descFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['descFormation']) || $arrAddFormation['descFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucune description n'a été saisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_descFormation'] = $arrAddFormation['descFormation'];
            }

            /**
            *   Traitement Niveau diplomant formation
            * Si il n'existe pas de variable post "levelFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['levelFormation']) || $arrAddFormation['levelFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Veuillez choisir un niveau diplomant !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['levelFormation_selected'] = $arrAddFormation['levelFormation'];
            }

            /**
            *   Traitement Date de début formation
            * Si il n'existe pas de variable post "dInFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['dInFormation']) || $arrAddFormation['dInFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucune date d'entrée n'a été saisie !");
            //Sinon
            }else{
                //Convertion date FR en US
                $inDateFormation = convert_date_FRinUS($arrAddFormation['dInFormation']);
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_dInFormation'] = $inDateFormation;
                //Convertion de date en timestamp pour futur vérification (Line:264)
                $inTimestamp = strtotime($inDateFormation);
            }

            /**
            *   Traitement Date de début formation
            * Si il n'existe pas de variable post "dOutFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['dOutFormation']) || $arrAddFormation['dOutFormation']==''){
                //On ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucune date de fin n'a été saisie !");
            //Sinon
            }else{
                //Convertion date FR en US
                $outDateFormation = convert_date_FRinUS($arrAddFormation['dOutFormation']);
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_dOutFormation'] = $outDateFormation;
                //Convertion de date en timestamp pour futur vérification (Line:264)
                $outTimestamp = strtotime($outDateFormation);
            }

            //Vérification des date in et out ** Si les timestamp existe
            if(isset($inTimestamp) && isset($outTimestamp)){
<<<<<<< HEAD
                //Si la date de début est plus récente que la date de fin alors on renvoi une erreur
=======
                //Si le timestamp d'entré n'est pas inférieur à celui de la sortie (Si la date d'entré en formation est plus récente que la date de fin de formation)
>>>>>>> 2fcd882aa1116788f6645741627a9465d0e1ac74
                if(!($inTimestamp < $outTimestamp)){
                    //On envoi une erreur
                    $noty[] = simply_notif('danger', "Date de début est supérieur à la date de fin !");
                }
            }

            /**
            *   Traitement Date de fin formation
            * Si il n'existe pas de variable post "modeFormation" ou si cette variable est égale à "" (rien)
            */
            if(!isset($arrAddFormation['modeFormation']) || $arrAddFormation['modeFormation']==''){
                //on ajoute une erreur au tableau "noty"
                $noty[] = simply_notif('danger', "Aucun mode de formation choisie !");
            //Sinon
            }else{
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_modeFormation'] = $arrAddFormation['modeFormation'];
            }

            if($operation=="update"){
                /**
                *   Traitement id formation
                * Si il n'existe pas de variable post "idFormation" ou si cette variable est égale à "" (rien)
                */
                if(!isset($arrAddFormation['idFormation']) || $arrAddFormation['idFormation']==''){
                    //on ajoute une erreur au tableau "noty"
                    $noty[] = simply_notif('danger', "Identifiant de formation invalide !");
                //Sinon
                }else{
                    //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                    $arrAddFormationEchec['isset_idFormation'] = $arrAddFormation['idFormation'];
                }
            }
            /**
            *   Envoie final à la classe pour insertion en BDD
            *
            * Si il n'existe pas d'erreurs et si la fonction d'ajout en base de donnée retourne true on assigne le message de succès
            */
            if(!isset($noty)){
                //Si l'opération est un ajout
                if($operation=="add"){
                    //Si la fonction d'ajout return true
                    if($this->add_SQL_formation($arrAddFormation)){
                        //On ajoute un message de succès à "$noty"
                        $noty[] = simply_notif('success', ADDFORMSUCCES, "center");
                        //Et on retourne '$noty'
                        return $noty;
                    }
                //sinon si l'opération est une mise à jour d'information
                }elseif($operation=="update"){
<<<<<<< HEAD
                    if($this->update_by_id_formation($arrAddFormation)){
=======
                    //Si la fonction de mise à jour return true
                    if($this->update_SQL_formation($arrAddFormation)){
                        //On ajoute un message de succès à "$noty"
>>>>>>> 2fcd882aa1116788f6645741627a9465d0e1ac74
                        $noty[] = simply_notif('success', UPDATEFORMSUCCES, "center");
                        //Et on retourne '$noty'
                        return $noty;
                    }
                }
            //Sinon il existe des erreurs
            }else{
                //On stock ces erreurs dans un tableau à la clef 'noty'
                $returnArray['noty'] = $noty;
                //On stock les bonnes valeurs à renvoyées
                $returnArray['arrAddFormation'] = $arrAddFormationEchec;
                //Et on retourne le tableau qui sera récupéré et traité
                return $returnArray;
            }
        }
    }