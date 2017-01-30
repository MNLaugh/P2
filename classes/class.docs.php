<?php

    Class Docs {
        /**
         * Function qui retourne un tableau des plugins
         *
         * @return Array 		-Tableau des plugins (HTML/CSS/JS)
         */
    	public function module_list(){
    		//La fonction "scandir()" retourne un tableau du contenu d'un dossier ici le dossier "plugins"
			$modulesList = scandir("./ressources/plugins/");
			//On supprime les deux première ligne du tableau la 0 contenant "." & la deuxième contenant ".."
			unset($modulesList[0]); unset($modulesList[1]);
			//On boucle sur le tableau
			foreach ($modulesList as $i => $val) {
				//Si dans la valeur du tableau à la ligne "$i", il existe les caractères ".php"
				if(substr_count($val, '.')>=1 || substr_count($val, '.php')==true && is_dir($val)==0){
					//On supprime la ligne
					unset($modulesList[$i+2]);
				}else{
					//Pour le reste on utilise la fonction "ucfirst()" qui permet mettre en majuscule le premier caractère de la chaine
					$modulesList[$i+2] = ucfirst($val);
				}
			}
			//Pour finir on retourne le tableau final
			return $modulesList;
    	}
    }
?>