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
	 * @param String $name 			- Nom de l'utilisateur
	 * @param String $first_name 	- Prénom de l'utilisateur
	 *
	 * @return String 				- Renvoi le la première lettre du prénom en minuscule concaténer à son nom (Exemple : pour Coco Lasticot, la fonction renvoi "clasticot")
	**/
	private function get_login_by_name($name, $first_name){
		$name = mb_strtolower($name);
		$first_len = strlen($first_name);
		$first_name_substr = mb_strtolower(substr($first_name, $first_len*-1, 1));
		return $first_name_substr.$name;
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
	private function add_user($name, $first_name, $password, $email, $user_power){
		try {
			//Retourne un nom d'utilisateur pour la connexion au site (login)
			$user_name = get_login_by_name($name, $first_name);
			$password = 
			//Ajout d'un utilisateur avec une requête préparer
			$stmt = $this->_db->prepare('INSERT INTO users (login, password, email, power) VALUES (:login, :password, :email, :power)') ;
			$stmt->execute(array(
				':login' => $user_name,
				':password' => $password,
				':email' => $email,
				':power' => $user_power
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
				$stmt = $this->_db->prepare('UPDATE users SET login = :login, password = :password, email = :email WHERE id_user = :id_user') ;
				$stmt->execute(array(
					':login' => $user_name,
					':password' => $password,
					':email' => $email,
					':id_user' => $user_id
				));
			}else{
				//update database
				$stmt = $this->_db->prepare('UPDATE users SET login = :login, email = :email WHERE id_user = :id_user') ;
				$stmt->execute(array(
					':login' => $user_name,
					':email' => $email,
					':id_user' => $user_id
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
			$stmt = $this->_db->prepare('SELECT password FROM users WHERE login = :login');
			$stmt->execute(array('login' => $user_name));
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
	 * @return Array $row 				- Renvoi un tableau des information utilisateur (id_user, login, email, power)
	**/
	private function get_user_info($user_name){
		try {

			$stmt = $this->_db->prepare('SELECT id_user, login, email, power FROM users WHERE login = :login');
			$stmt->execute(array('login' => $user_name));
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
		    $_SESSION['user_id'] = $info['id_user'];
		    $_SESSION['user_name'] = $info['login'];
		    $_SESSION['user_email'] = $info['email'];
		    $_SESSION['user_power'] = $info['power'];
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