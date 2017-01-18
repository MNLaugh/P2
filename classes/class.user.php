<?php

include('class.password.php');

class User extends Password{

    private $db;
	
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db;
	}

	/**
	 * Ajouter un utlisateur
	 *
	 * @param String $user_name 	- Nom d'utilisateur
	 * @param String $password 		- Mot de passe utilisateur
	 * @param String $email 		- Adresse mail utilisateur
	 * @param String $user_power 	- Niveau de permission
	 *
	 * @return Bolean 				- Renvoi true si tous c'est bien passer sinon false (erreur sql)
	**/
	private function add_user($user_name, $password, $email, $user_power){
		try {
			//Ajout d'un utilisateur avec une requête préparer
			$stmt = $this->_db->prepare('INSERT INTO users (NOUSER,PAUSER,AMUSER,POUSER) VALUES (:NOUSER, :PAUSER, :AMUSER, :POUSER)') ;
			$stmt->execute(array(
				':NOUSER' => $user_name,
				':PAUSER' => $password,
				':AMUSER' => $email,
				':POUSER' => $user_power
			));
			//Tous c'est bien passer on retourne "true"
			return true;
		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		    //Erreur SQL on retourne "false"
		    return false;
		}
	}

	/**
	 * Mise à jour des informations utlisateur
	 *
	 * @param Int $user_id 			- Identifiant utilisateur
	 * @param String $user_name 	- Nom d'utilisateur
	 * @param String $password 		- Mot de passe utilisateur
	 * @param String $email 		- Adresse mail utilisateur
	 * @param Int $user_power 		- Niveau de permission
	 *
	 * @return Bolean 				- Renvoi true si tous c'est bien passer sinon false (erreur sql)
	**/
	private function update_user($user_id, $user_name, $password, $email, $user_power){
		try {
			if($password==NULL){
				$password = $this->password_hash($password, PASSWORD_BCRYPT);
				//update database
				$stmt = $this->_db->prepare('UPDATE users SET NOUSER = :NOUSER, PAUSER = :PAUSER, AMUSER = :AMUSER WHERE IDUSER = :IDUSER') ;
				$stmt->execute(array(
					':NOUSER' => $user_name,
					':PAUSER' => $password,
					':AMUSER' => $email,
					':IDUSER' => $user_id
				));
			}else{
				//update database
				$stmt = $this->_db->prepare('UPDATE users SET NOUSER = :NOUSER, AMUSER = :AMUSER WHERE IDUSER = :IDUSER') ;
				$stmt->execute(array(
					':NOUSER' => $user_name,
					':AMUSER' => $email,
					':IDUSER' => $user_id
				));
			}
		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		    //Erreur SQL on retourne "false"
		    return false;
		}
	}

	/**
	 * Get password by nom d'utlisateur
	 *
	 * @param String $user_name 		- Nom d'utilisateur
	 *
	 * @return String $row['password'] - Renvoi le mot de passe utilisateur
	**/
	private function get_user_hash($user_name){	
		try {
			$stmt = $this->_db->prepare('SELECT password FROM users WHERE NOUSER = :NOUSER');
			$stmt->execute(array('NOUSER' => $user_name));
			$row = $stmt->fetch();
			return $row['password'];
		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	/**
	 * Get info by nom d'utlisateur
	 *
	 * @param String $user_name 		- Nom d'utilisateur
	 *
	 * @return Array $row 				- Renvoi un tableau des information utilisateur (IDUSER, NOUSER, AMUSER, POUSER)
	**/
	private function get_user_info($user_name){
		try {

			$stmt = $this->_db->prepare('SELECT IDUSER, NOUSER, AMUSER, POUSER FROM users WHERE NOUSER = :NOUSER');
			$stmt->execute(array('NOUSER' => $user_name));
			$row = $stmt->fetch();
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function login($user_name,$password){	

		$hashed = $this->get_user_hash($user_name);
		$info = $this->get_user_info($user_name);
		
		if($this->password_verify($password,$hashed) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['user_id'] = $info['IDUSER'];
		    $_SESSION['user_name'] = $info['NOUSER'];
		    $_SESSION['user_email'] = $info['AMUSER'];
		    $_SESSION['user_power'] = $info['POUSER'];
		    return true;
		}		
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
		
	public function logout(){
		session_destroy();
	}
	
}


?>