<?php
include('class.user.php');

    Class Stagiaire extends User{
        
        private $db;
        
        function __construct($db){
            parent::__construct();
        
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
				$stmt = $this->_db->query('SELECT * FROM stagiaire');
				$listStagiaire = $stmt->fetchAll();
			 	return $listStagiaire;
			} catch(PDOException $e) {
			    echo '<p class="error">'.$e->getMessage().'</p>';
			}
    	}

    	public function get_arr_stagiaire(){
    		return $this->get_list_stagiaire();
    	}
    }
