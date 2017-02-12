<?php

    Class Image {
    	private $db;
        public function __construct($db){
			$this->_db = $db;
		}

		private function add_SQL_image(){
            try{
                $stmt = $this->_db->prepare('INSERT INTO formations (file_name, thumbnail_name, alt_text) VALUES (:file_name, :thumbnail_name, :alt_text)');
                $stmt->execute(array(
                    ':file_name' => $arrAddFormation['file_name'],
                    ':thumbnail_name' => $arrAddFormation['thumbnail_name'],
                    ':alt_text' => $arrAddFormation['alt_text']
                    ));
                return true;
            } catch(PDOException $e) {
                //fonction erreur
                //echo '<p class="error">'.$e->getMessage().'</p>';
                return false;
            }
		}

		public function add_image(){
			
		}
    }

?>