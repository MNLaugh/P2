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
				$stmt = $this->_db->query('SELECT * FROM formation');
				$listFormations = $stmt->fetchAll();
			 	return $listFormations;
			} catch(PDOException $e) {
			    echo '<p class="error">'.$e->getMessage().'</p>';
			}
    	}

        /**
         * Function qui retourne le tableau des formations
         *
         * @return Array        -Tableau des formations
         */
        private function get_once_by_id_formation($idFormation){
            try {
                $stmt = $this->_db->query('SET NAMES utf8');
                $stmt = $this->_db->query('SELECT * FROM formation WHERE IDFORM = '. $idFormation);
                $listFormations = $stmt->fetch();
                return $listFormations;
            } catch(PDOException $e) {
                return false;
                //echo '<p class="error">'.$e->getMessage().'</p>';
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
                $stmt = $this->_db->prepare('INSERT INTO formation (NSFORM, NLFORM, DEFORM, NIFORM, DATEIN, DATOUT, MOFORM) VALUES (:NSFORM, :NLFORM, :DEFORM, :NIFORM, :DATEIN, :DATOUT, :MOFORM)');
                $stmt->execute(array(
                    ':NSFORM' => $arrAddFormation['sNameFormation'],
                    ':NLFORM' => $arrAddFormation['lNameFormation'],
                    ':DEFORM' => $arrAddFormation['descFormation'],
                    ':NIFORM' => $arrAddFormation['levelFormation'],
                    ':DATEIN' => $arrAddFormation['dInFormation'],
                    ':DATOUT' => $arrAddFormation['dOutFormation'],
                    ':MOFORM' => $arrAddFormation['modeFormation']
                    ));
                return true;
            } catch(PDOException $e) {
                //fonction erreur
                //echo '<p class="error">'.$e->getMessage().'</p>';
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
            try{
                $stmt = $this->_db->prepare('UPDATE formation SET NSFORM=?, NLFORM=?,DEFORM=?, NIFORM=?, DATEIN=?, DATOUT=?, MOFORM=? WHERE IDFORM=?');
                $stmt->execute(array(
                    ':NSFORM' => $arrAddFormation['sNameFormation'],
                    ':NLFORM' => $arrAddFormation['lNameFormation'],
                    ':DEFORM' => $arrAddFormation['descFormation'],
                    ':NIFORM' => $arrAddFormation['levelFormation'],
                    ':DATEIN' => $arrAddFormation['dInFormation'],
                    ':DATOUT' => $arrAddFormation['dOutFormation'],
                    ':MOFORM' => $arrAddFormation['modeFormation'],
                    ':IDFORM' => $arrAddFormation['idFormation']
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
                $stmt = $this->_db->query('DELETE from formation WHERE IDFORM='. $idFormation);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                //fonction erreur
                //echo '<p class="error">'.$e->getMessage().'</p>';
                return false;
            }
        }

        /**
         * Fonction de suppression d'une formation
         *
         * @param Int $idFormation    - Identifiant de la formation à supprimer
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
         * Function qui met à jour les information d'une formation en BDD
         *
         * @param Array $arrUpdateFormation        - Tableau des valeurs mis à jour
         *
         * @return boolean       - true si tout c'est bien passer
         */
        private function update_by_id_formation($arrUpdateFormation){
            if($this->get_once_by_id_formation($arrUpdateFormation['idFormation'])){
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
        sNameFormation
        lNameFormation
        descFormation
        levelFormation
        dInFormation
        dOutFormation
        modeFormation
         * @return Boolean                  - renvoi "true" si tout c'est bien passer
         */
        public function add_formation($arrAddFormation){
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
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_dInFormation'] = convert_date_USinFR($arrAddFormation['dInFormation']);
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
                //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
                $arrAddFormationEchec['isset_dOutFormation'] = convert_date_USinFR($arrAddFormation['dOutFormation']);
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

            /**
            *   Envoie final à la classe pour insertion en BDD
            * Si il n'existe pas d'erreurs et si la fonction d'ajout en base de donnée retourne true on assigne le message de succès
            * Sinon message d'erreur "Une erreur est survenu"
            */
            if(!isset($noty)){
                //if($this->add_SQL_formation($arrAddFormation)){
                    $noty[] = simply_notif('success', "Formation ajouté avec succès !", "center");
                    return $noty;
                //}
            }else{
                $returnArray['noty'] = $noty;
                $returnArray['arrAddFormation'] = $arrAddFormationEchec;
                return $returnArray;
            }
        }
    }