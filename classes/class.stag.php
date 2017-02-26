<?php
Class Stagiaire extends User{
    
    private $db;
    public function __construct($db){
        $this->_db = $db;
    }

    /**
     * Function qui retourne le nombre de stagiaire
     *
     * @return int        -Nombre de stagiaire
     */
    public function get_number_stagiaire(){
        try {
            //Préparation SQL pour tester s'il existe déjà l'id générer
            $stmt = $this->_db->query('SELECT COUNT(id_user) FROM users WHERE power = 2');
            //Execution de la requête
            $nbStagiaire = $stmt->fetch();
            //On récupère la valeur  dans "nbStagiaire"
            $nbStagiaire = intval($nbStagiaire[0]);
            return $nbStagiaire;
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Function qui retourne le nombre de stagiaire
     * @param int $id_formation     - Identifiant de dormation
     *
     * @return int        -Nombre de stagiaire
     */
    public function get_number_stagiaire_in_formation($id_formation){
        try {
            //Préparation SQL
            $stmt = $this->_db->query('SELECT COUNT(id_user) FROM users WHERE id_formation = '. $id_formation);
            //Execution de la requête
            $nbStagiaire = $stmt->fetch();
            //On récupère la valeur  dans "nbStagiaire"
            $nbStagiaire = intval($nbStagiaire[0]);
            return $nbStagiaire;
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Function qui retourne un tableau des formation
     *
     * @return Array 		-Tableau des plugins (HTML/CSS/JS)
     */
	private function get_list_stagiaire(){
        try {
            //$stmt = $this->_db->query('SET NAMES utf8');
            $stmt = $this->_db->query('SELECT id_user, login, name, first_name, email, code_postal, ville, level_diplom, id_formation, id_image, full_profile FROM users WHERE power = 2');
            $listStagiaire = $stmt->fetchAll();
            foreach ($listStagiaire as $i => $val) {

                if($val['id_image']==null){
                    $listStagiaire[$i]['file_image'] = DEFAULT_AVATAR;
                    $listStagiaire[$i]['alt_image'] = "Default avatar";
                }else{
                    $stmt = $this->_db->query('SELECT file_name, thumbnail_name FROM image WHERE id_image = ' . $val['id_image']);
                    $img_infos = $stmt->fetch();
                    $listStagiaire[$i]['file_image'] = TARGET_UPLOAD_THUMBS.$img_infos['thumbnail_name'];
                    $listStagiaire[$i]['alt_image'] = "avatar de ". $val['login'];
                }
                unset($listStagiaire[$i]['id_image']); //Supprime la ligne du tableau
                $stmt = $this->_db->query('SELECT level_name FROM level_diplome WHERE id_level = '. $val['level_diplom']);
                $levelTab = $stmt->fetch();
                $listStagiaire[$i]['level_name'] = ($levelTab['level_name']!=null)? $levelTab['level_name'] : "A remplir";
                unset($listStagiaire[$i]['level_diplom']); //Supprime la ligne du tableau
                //traitement code postal
                if($val['code_postal']==0){
                    $listStagiaire[$i]['code_postal'] = 'A remplir';
                }
                //traitement ville
                if($val['ville']==null){
                    $listStagiaire[$i]['ville'] = 'A remplir';
                }
            }
		 	return $listStagiaire;
        } catch(PDOException $e) {
            return false;
        }
	}

    /**
     * Function qui retourne la liste des utilisateur de type stagiaire (power == '2')
     *
     * @return array                   - tableau des stagiaires
     */
	public function get_arr_stagiaire(){
		return $this->get_list_stagiaire();
	}

    /**
     * Function de traitement avant création de l'utilisateur en BDD
     *
     * @param Array $arrAddUser         - Tableau cotenant les valeur a ajouter en base de donnée
     *
     * @return Array                  - renvoi un tableau des information et erreur en cas d'echec ou un message de succès dans l'autre cas
     */
    public function add_new_user($arrAddUser){
        /**
        *   Traitement Nom de l'utilisateur
        * Si il n'existe pas de variable post "name" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrAddUser['name']) || $arrAddUser['name']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucun nom n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrAddUserEchec['isset_name'] = $arrAddUser['name'];
        }

        /**
        *   Traitement Prénom de l'utilisateur
        * Si il n'existe pas de variable post "firstname" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrAddUser['firstname']) || $arrAddUser['firstname']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucun prénom n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrAddUserEchec['isset_firstname'] = $arrAddUser['firstname'];
        }

        /**
        *   Traitement Email de l'utilisateur
        * Si il n'existe pas de variable post "email" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrAddUser['email']) || $arrAddUser['email']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune adresse mail n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrAddUserEchec['isset_email'] = $arrAddUser['email'];
        }

        /**
        *   Traitement Email de l'utilisateur
        * Si il n'existe pas de variable post "power" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrAddUser['power']) || $arrAddUser['power']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune permission n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrAddUserEchec['isset_power'] = $arrAddUser['power'];
        }

        /**
        *   Envoie final à la classe pour insertion en BDD
        *
        * Si il n'existe pas d'erreurs et si la fonction d'ajout en base de donnée retourne true on assigne le message de succès
        */
        if(!isset($noty)){
            //Si la fonction d'ajout return true
            if($this->add_SQL_user($arrAddUser)){
                //On ajoute un message de succès à "$noty"
                $noty[] = simply_notif('success', ADDUSERSUCCES, "center");
                //Et on retourne '$noty'
                return $noty;
            }
        //Sinon il existe des erreurs
        }else{
            //On stock ces erreurs dans un tableau à la clef 'noty'
            $returnArray['noty'] = $noty;
            //On stock les bonnes valeurs à renvoyées
            $returnArray['arrAddUser'] = $arrAddUserEchec;
            //Et on retourne le tableau qui sera récupéré et traité
            return $returnArray;
        }
    }
    /**
     * Function de modification d'un stagiaire en base de donnée
     *
     * @param Array $arrEditUser         - Tableau cotenant les valeur a ajouter en base de donnée
     *
     * @return Bolean                    - renvoi true si réussi
     */
    private function update_SQL_user($arrEditUser){
        try {
            $stmt = $this->_db->query('SELECT full_profile FROM users WHERE id_user = '. $this->_db->quote($arrEditUser['idStagiaire'], PDO::PARAM_STR));
            $profil_status = $stmt->fetch();
            if($profil_status['full_profile'] == 0){
                $arrEditUser['fullProfile'] = 1;
            }
            $stmt = $this->_db->prepare('UPDATE users SET date_naissance = :date_naissance, adresse_1 = :adresse_1, adresse_2 = :adresse_2, adresse_3 = :adresse_3, code_postal = :code_postal, ville = :ville, telephone = :telephone, level_diplom = :level_diplom, id_formation = :id_formation, id_image = :id_image, full_profile = :full_profile WHERE id_user = :id_user') ;
            $stmt->execute(array(
                ':date_naissance' => convert_date_FRinUS($arrEditUser['dateBirth']),
                ':adresse_1' => $arrEditUser['adresse1'],
                ':adresse_2' => $arrEditUser['adresse2'],
                ':adresse_3' => $arrEditUser['adresse3'],
                ':code_postal' => $arrEditUser['codePostal'],
                ':ville' => $arrEditUser['ville'],
                ':telephone' => $arrEditUser['phone'],
                ':level_diplom' => $arrEditUser['level'],
                ':id_formation' => $arrEditUser['formation'],
                ':id_image' => $arrEditUser['id_image'],
                ':full_profile' => $arrEditUser['fullProfile'],
                ':id_user' => $arrEditUser['idStagiaire']
            ));
            return true;
        } catch(PDOException $e) {
            //Erreur SQL on retourne "false"
            return false;
        }
    }

    /**
     * Function de traitement de modification d'un stagiaire
     *
     * @param Array $arrEditUser         - Tableau cotenant les valeur a ajouter en base de donnée
     *
     * @return Array                  - renvoi un tableau des information et erreur en cas d'echec ou un message de succès dans l'autre cas
     */
    public function edit_stagiaire($arrEditUser){
        /**
        *   Traitement adresse 1 (optionnel)
        * Si il n'existe pas de variable post "adresse1" ou si cette variable est égale à "" (rien)
        */
        if(isset($arrEditUser['adresse1']) || $arrEditUser['adresse1']!=''){
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_adresse1'] = $arrEditUser['adresse1'];
        }

        /**
        *   Traitement adresse 2 (obligatoire)
        * Si il n'existe pas de variable post "adresse1" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['adresse2']) || $arrEditUser['adresse2']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune adresse n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_adresse2'] = $arrEditUser['adresse2'];
        }

        /**
        *   Traitement adresse 3 (optionnel)
        * Si il n'existe pas de variable post "adresse1" ou si cette variable est égale à "" (rien)
        */
        if(isset($arrEditUser['adresse3']) || $arrEditUser['adresse3']!=''){
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_adresse3'] = $arrEditUser['adresse3'];
        }

        /**
        *   Traitement code postal
        * Si il n'existe pas de variable post "codePostal" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['codePostal']) || $arrEditUser['codePostal']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucun code postal n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_codePostal'] = $arrEditUser['codePostal'];
        }

        /**
        *   Traitement ville
        * Si il n'existe pas de variable post "ville" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['ville']) || $arrEditUser['ville']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune ville n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_ville'] = $arrEditUser['ville'];
        }

        /**
        *   Traitement date de naissance
        * Si il n'existe pas de variable post "dateBirth" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['dateBirth']) || $arrEditUser['dateBirth']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune date de naissance n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_dateBirth'] = $arrEditUser['dateBirth'];
        }

        /**
        *   Traitement téléphone
        * Si il n'existe pas de variable post "phone" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['phone']) || $arrEditUser['phone']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucun numéro de téléphone n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['isset_phone'] = $arrEditUser['phone'];
        }

        /**
        *   Traitement niveau d'étude
        * Si il n'existe pas de variable post "level" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['level']) || $arrEditUser['level']==''){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucun niveau de diplome n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['levelStagiaire_selected'] = $arrEditUser['level'];
        }

        /**
        *   Traitement formation
        * Si il n'existe pas de variable post "formation" ou si cette variable est égale à "" (rien)
        */
        if(!isset($arrEditUser['formation']) || $arrEditUser['formation']=='' || $arrEditUser['formation']=='default'){
            //on ajoute une erreur au tableau "noty"
            $noty[] = simply_notif('danger', "Aucune formation n'a été saisie !");
        //Sinon
        }else{
            //On assign une valeur au tableau de retour de données en cas d'erreur du formulaire
            $arrEditUserEchec['formation_selected'] = $arrEditUser['formation'];
        }

        /**
        *   Envoie final à la classe pour insertion en BDD
        *
        * Si il n'existe pas d'erreurs et si la fonction d'ajout en base de donnée retourne true on assigne le message de succès
        */
        if(!isset($noty)){
            //Si la fonction d'ajout return true
            if($this->update_SQL_user($arrEditUser)){
                //On ajoute un message de succès à "$noty"
                $noty[] = simply_notif('success', EDITUSERSUCCES, "center");
                //Et on retourne '$noty'
                return $noty;
            }
        //Sinon il existe des erreurs
        }else{
            //On stock ces erreurs dans un tableau à la clef 'noty'
            $returnArray['noty'] = $noty;
            //On stock les bonnes valeurs à renvoyées
            $returnArray['arrEditUser'] = $arrEditUserEchec;
            //Et on retourne le tableau qui sera récupéré et traité
            return $returnArray;
        }
    }

    /**
     * Function de qui retourne les informations d'un utilisateur via son identifiant
     *
     * @param Int $id_user            - Identifiant utilisateur
     *
     * @return Array                  - renvoi un tableau des informations de l'utilisateur
     */
    public function public_get_user_by_id($id_user){
        if($this->get_user_by_id($id_user)){
            $arrStagiaire = $this->get_user_by_id($id_user);
            return $arrStagiaire;
        }else{
            return false;
        }
    }

    public function get_password_by_login($login){
        try {
            $stmt = $this->_db->prepare('SELECT password FROM users WHERE login = :login');
            $stmt->execute(array('login' => $login));
            $password = $stmt->fetch();
            return $password;
        } catch(PDOException $e) {
            return false;
        }
    }
}
?>