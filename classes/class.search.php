<?php
Class Search {
    private $db;
    public function __construct($db){
		$this->_db = $db;
	}

	private function autoComplete_search_sql($searched){
		try{
			$result = [];

			$stmt = $this->_db->prepare('SELECT DISTINCT name, first_name FROM users WHERE name LIKE :queryString OR first_name LIKE :queryString');
			if($stmt->execute(array(':queryString' => '%'.$searched.'%'))){
				$response = $stmt->fetchAll();
				foreach ($response as $i => $item) {
					$result[] = utf8_encode($item[0]);
					$result[] = utf8_encode($item[1]);
				}
			}

			$stmt = $this->_db->prepare('SELECT DISTINCT short_name, long_name FROM formations WHERE short_name LIKE :queryString');
			if($stmt->execute(array(':queryString' => '%'.$searched.'%'))){
				$response = $stmt->fetchAll();
				foreach ($response as $i => $item) {
					$result[] = utf8_encode($item[0]);
				}
			}
			return $result;
        } catch(PDOException $e) {
            return false;
        }
	}

	private function search_sql($searched){
		try{
			$result = [];

			$stmt = $this->_db->prepare('SELECT DISTINCT id_user, login, name, first_name, email, power FROM users WHERE name LIKE :queryString OR first_name LIKE :queryString');
			if($stmt->execute(array(':queryString' => '%'.$searched.'%'))){
				$response = $stmt->fetchAll();
				foreach ($response as $i => $item) {
					$userRes['id_user'] = $item['id_user'];
					$userRes['login'] = $item['login'];
					$userRes['name'] = utf8_encode($item['name']);
					$userRes['first_name'] = utf8_encode($item['first_name']);
					$userRes['email'] = $item['email'];
					//Si le power est '0' c'est un administrateur
					if($item['power']==0){
						$userRes['power'] = 'Administrateur';
					//Sinon le power est '1' c'est un gestionnaire
					}elseif($item['power']==1){
						$userRes['power'] = 'Gestionnaire';
					//Sinon c'est un stagiaire
					}else{
						$userRes['power'] = 'Stagiaire';
					}
					$result['user'][] = $userRes;
				}
			}
			
			$stmt = $this->_db->prepare('SELECT DISTINCT id_formation, short_name, long_name, mode, date_in, date_out FROM formations WHERE short_name LIKE :queryString OR long_name LIKE :queryString');
			if($stmt->execute(array(':queryString' => '%'.$searched.'%'))){
				$response = $stmt->fetchAll();
				foreach ($response as $i => $item){
					$result['formation'][] = format_search_formation($item);
				}
			}
			return $result;
        } catch(PDOException $e) {
            return false;
        }
	}

	public function autoComplete_searching($searched){
		if($this->autoComplete_search_sql($searched)!=false){
			return $this->autoComplete_search_sql($searched);
		}
	}

	public function searching($searched){
		if($this->search_sql($searched)){
			return $this->search_sql($searched);
		}
	}
}
?>