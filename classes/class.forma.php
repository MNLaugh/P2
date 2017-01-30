<?php

    Class Formations {

        private $db;
        public function __construct($db){
			$this->_db = $db;
		}

        /**
         * Function qui retourne un tableau des formation
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

    	public function get_arr_formation(){
    		return $this->get_list_formation();
    	}
    }