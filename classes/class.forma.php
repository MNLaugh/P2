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
         * @return Boolean                  - renvoi "true" si tout c'est bien passer
         */
        public function add_formation($arrAddFormation){
            return $this->add_SQL_formation($arrAddFormation);
        }
    }