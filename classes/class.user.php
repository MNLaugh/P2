<?php
include('class.password.php');
if(PASSWORD_SCRYPT==null){
	define('PASSWORD_SCRYPT', pack('H*', strrev("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3")));
}
if(PASSWORD_MODE==null){
	define('PASSWORD_MODE', MCRYPT_MODE_OFB);
}
class User extends Password{
    private $db;
	function __construct($db){
		parent::__construct();
		$this->_db = $db;
	}

    /**
     * Function de récupération de la liste de tout les utilisateur
     * @param String $name          - Nom de l'utilisateur
     * @param String $first_name   	- Prénom de l'utilisateur
     *
     * @return String $id_user      - Identifiant utilisateur
     */
	private function list_user(){
		try{
			$stmt = $this->_db->query('SELECT id_user, login, name, first_name, email, power FROM users');
			$list = $stmt->fetchAll();
			return $list;
    	} catch(PDOException $e){
    		//Si la requête à rencontrer une erreur on r'envoi false
    	    return false;
    	}
	}

    /**
     * Function de création d'un identifiant utilisateur
     * @param String $name          - Nom de l'utilisateur
     * @param String $first_name   	- Prénom de l'utilisateur
     *
     * @return String $id_user      - Identifiant utilisateur
     */
	private function create_id_user($name, $first_name){
		//On compte le nombre de caractères dans le nom
		$name_len = strlen($name);
		//On récupère la première lettre du nom en passant la chaine en minuscule
		$name_substr = mb_strtolower(substr($name, $name_len*-1, 1));
		//On compte le nombre de caractères dans le prénom
		$first_len = strlen($first_name);
		//On récupère la première lettre du prénom en passant la chaine en minuscule
		$first_name_substr = mb_strtolower(substr($first_name, $first_len*-1, 1));
		//On concatène la première lettre du nom et du prénom ensemble
		$toFirstCharName = $name_substr.$first_name_substr;
		//Et on concatène nos deux lettres avec une chaine random de 4 caractère sans caractères spéciaux
		$id_user = $toFirstCharName.$this->rand_string(4, false);
    	try{
    		//Préparation SQL pour tester s'il existe déjà l'id générer
			$stmt = $this->_db->query('SELECT COUNT(id_user) FROM users WHERE id_user = '. $this->_db->quote($id_user, PDO::PARAM_STR));
			//Execution de la requête
			$nbID = $stmt->fetch();
			//On récupère la valeur  dans "nbID"
			$nbID = intval($nbID[0]);
			//Si la requête a renvoyer 1 ou plus
	    	if($nbID >= 1){
	    		//On retourne false
	    		return false;
	    	//Sinon si la requête a renvoyer 0
	    	}elseif($nbID == 0){
	    		//On retourne notre identifiant d'utilisateur
				return $id_user;
	    	}
    	} catch(PDOException $e){
    		//Si la requête à rencontrer une erreur on r'envoi false
    	    return false;
    	}
	}

    /**
     * Function qui retourne le login a partir du nom et prénom
     * @param String $name          - Nom de l'utilisateur
     * @param String $firstnale     - Prénom de l'utilisateur
     *
     * @return String               -login
     */
    function create_login($name, $first_name){
		//On passe la chaine de caractère en minuscule
		$name = mb_strtolower($name);
		//On compte le nombre de caractères dans le prénom
		$first_len = strlen($first_name);
		//On récupère la première lettre du prénom en passant la chaine en minuscule
		$first_name_substr = mb_strtolower(substr($first_name, $first_len*-1, 1));
		//Et on retourne la première lettre du prénom concaténé au nom
		return $first_name_substr.$name;
	}

   	/**
   	 * Function qui créer un utilisateur en BDD
   	 *
   	 * @param Array $arrAddUser         - Tableau cotenant les valeur a ajouter en base de donnée
   	 *
   	 * @return bolean                   - true si tout c'est bien passer
   	 */
   	public function add_SQL_user($arrAddUser){
       	try{
            $i=false;
            //Tant que "$i" est égale à false on boucle
            while($i==false){
            	//Déclaration de la variable 'id-user' du tableau utilisateur SQL
                $arrAddUser['id_user'] = $this->create_id_user($arrAddUser['name'], $arrAddUser['firstname']);
                //Si la fonction de création de l'id à renvoyer true
                if($arrAddUser['id_user'] != false){
                	// "$i" passe en 'true' pour continuer le raitement
                	$i = true;
                }
            }
            //Création du login à partir du nom et prénom de l'utilisateur
			$arrAddUser['login'] = trim($this->create_login($arrAddUser['name'], $arrAddUser['firstname']));
			//Création du mot de passe utilisateur à 8 caractères
			$arrAddUser['password'] = $this->myEncrypt(PASSWORD_SCRYPT, $this->rand_string(8), PASSWORD_MODE);
			//Préparation SQL
			$stmt = $this->_db->query('SET NAMES utf8');
			$stmt = $this->_db->prepare('INSERT INTO users (id_user, login, password, name, first_name, email, power) VALUES (:id_user, :login, :password, :name, :first_name, :email, :power)');
			//Execution SQL avec les éléments à ajouter
			$stmt->execute(array(
				':id_user' => $arrAddUser['id_user'],
			    ':login' => $arrAddUser['login'],
			    ':password' => $arrAddUser['password'],
			    ':name' => $arrAddUser['name'],
			    ':first_name' => $arrAddUser['firstname'],
			    ':email' => $arrAddUser['email'],
			    ':power' => intval($arrAddUser['power'])
			    ));
			//Si tout c'est bien passer on renvoi true
			return true;
       	} catch(PDOException $e) {
       		//Sinon en cas d'erreur on renvoi false
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
		    //Erreur SQL on retourne "false"
		    return false;
		}
	}

	/**
	 * Mise suppression d'un utlisateur
	 *
	 * @param Int $user_id 			- Identifiant utilisateur
	 *
	 * @return Bolean 				- Renvoi true si tous c'est bien passer sinon false (erreur sql)
	**/
	private function del_user($user_id){
        try{
        	$userInfos = $this->get_user_by_id($user_id);
        	if($userInfos['id_image']!=null){
        		$stmt = $this->_db->query('DELETE from image WHERE id_image='. $userInfos['id_image']);
            	$stmt->execute();
        	}
            $stmt = $this->_db->query('DELETE from users WHERE id_user='. $this->_db->quote($user_id, PDO::PARAM_STR));
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
	}

	public function del_user_by_id($user_id){
		return $this->del_user($user_id);
	}
	/**
	 * Vérifie le mot de passe utilisateur
	 *
	 * @param String $password 		- Mot de passe envoyer avec le formulaire de connexion
	 *
	 * @return Bolean 				- Renvoi vrai ou faux
	**/
	private function password_verify($login,$password){	
		try {
			$stmt = $this->_db->query('SELECT password FROM users WHERE login = '. $this->_db->quote($login, PDO::PARAM_STR));
			$row = $stmt->fetch();
			$pass = $this->myDecrypt(PASSWORD_SCRYPT, $row['password'], PASSWORD_MODE);
			if($pass==$password){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e) {
		    return false;
		}
	}

	/**
	 * Get user by id
	 *
	 * @param Int $id_user 				- Identifiant utilisateur
	 *
	 * @return Array $row 				- Renvoi un tableau des informations utilisateur
	**/
	public function get_user_by_id($id_user){
		try {
			$stmt = $this->_db->query('SET NAMES utf8');
			$stmt = $this->_db->query('SELECT id_user, login, password, name, first_name, email, date_naissance, adresse_1, adresse_2, adresse_3, code_postal, ville, telephone, level_diplom, id_formation, id_image, full_profile, power FROM users WHERE id_user = '. $this->_db->quote($id_user, PDO::PARAM_STR));
			$row = $stmt->fetch();
			$row['password'] = $this->myDecrypt(PASSWORD_SCRYPT, $row['password'], PASSWORD_MODE);
			return $row;
		} catch(PDOException $e) {
		    return false;
		}
	}

	/**
	 * Get info by nom d'utlisateur
	 *
	 * @param String $login 			- Nom d'utilisateur
	 *
	 * @return Array $row 				- Renvoi un tableau des information utilisateur (id_user, login, email, power)
	**/
	private function get_user_info($login){
		try {
			$stmt = $this->_db->query('SELECT id_user, login, name, first_name, email, power FROM users WHERE login = '. $this->_db->quote($login, PDO::PARAM_STR));
			$row = $stmt->fetch();
			return $row;
		} catch(PDOException $e) {
		    return false;
		}
	}

	/**
	 * Fonction de connexion
	 *
	 * @param String $login 			- Nom d'utilisateur
	 * @param String $password 			- Mot de passe
	 *
	 * @return Bolean 					- Renvoi true
	**/
	public function login($login,$password){
		//Récupération des informations utilisateur
		$info = $this->get_user_info($login);
		//Si la vérification du mot de passe renvoi true
		if($this->password_verify($login,$password)){
			//On initialise la session
		    $_SESSION['loggedin'] = true;
		    $_SESSION['user_id'] = $info['id_user'];
		    $_SESSION['user_login'] = $info['login'];
		    $_SESSION['user_email'] = $info['email'];
		    $_SESSION['user_name'] = $info['name'];
		    $_SESSION['user_first_name'] = $info['first_name'];
		    $_SESSION['user_power'] = $info['power'];
		    //Et on retourn true
		    return true;
		}		
	}

	/**
	 * Fonction de contrôle de session
	 *
	 * @return Bolean 					- Renvoi true ou false si connecter
	**/
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	/**
	 * Fonction de déconnexion
	 *
	 * @return Redirection 					- Ferme la session et renvoi à la page d'acceuil
	**/
	public function logout(){
		$_SESSION = [];
		session_destroy();
		header('Location: ./');
	}

	/**
	 * Converti le power nombre en texte
	 *
	 * @param int $power 		- Pouvoir de l'utilisateur
	 *
	 * @return string 			- Retourne la valeur textuel du power
	**/
	public function textuel_power($power){
		//Si le power est '0' c'est un administrateur
		if($power==0){
			return 'Administrateur';
		//Sinon le power est '1' c'est un gestionnaire
		}elseif($power==1){
			return 'Gestionnaire';
		//Sinon c'est un stagiaire
		}else{
			return 'Stagiaire';
		}
	}

	public function get_user_list(){
		if($this->list_user()){
			return $this->list_user();
		}
	}
}


?>