<?php
Class Image {
	private $db;
    public function __construct($db){
		$this->_db = $db;
	}
    
    private function thumbnail_generator($n_width=50, $n_height=50, $file, $add){
        $tabName = explode(".", $file['userfile']['name']);
        $file['userfile']['name'] = $tabName[0].'_thumb.'.$tabName[1];

        $tsrc=TARGET_UPLOAD_THUMBS.$file['userfile']['name'];
        if (!($file['userfile']['type'] =="image/jpeg" OR $file['userfile']['type']=="image/png")){
            return simply_notif('danger', "Une erreur inconnu c'est produite, contacter un administrateur !");
        }else{
            if($file['userfile']['type']=="image/png"){
                $im=ImageCreateFromPNG($add); 
                $width=ImageSx($im);
                $height=ImageSy($im);
                $n_height=($n_width/$width) * $height;
                $newimage=imagecreatetruecolor($n_width,$n_height);                 
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                ImagePng($newimage,$tsrc);
                chmod("$tsrc",0777);
            }elseif($file['userfile']['type']=="image/jpeg"){
                $im=ImageCreateFromJPEG($add); 
                $width=ImageSx($im);
                $height=ImageSy($im);
                $n_height=($n_width/$width) * $height;
                $newimage=imagecreatetruecolor($n_width,$n_height);                 
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                ImageJpeg($newimage,$tsrc);
                chmod("$tsrc",0777);
            }
            return $file['userfile']['name'];
        }
    }
	private function add_SQL_image($file_name, $thumbnail_name){
        try{
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->_db->prepare('INSERT INTO image (file_name, thumbnail_name) VALUES (:file_name, :thumbnail_name)');
            $stmt->execute(array(
                ':file_name' => $file_name,
                ':thumbnail_name' => $thumbnail_name
                ));
            return true;
        } catch(PDOException $e) {
            return false;
        }
	}

    private function get_img_infos_by_name($img_name){
        try{
            $stmt = $this->_db->query('SELECT id_image, file_name, thumbnail_name FROM image WHERE file_name = ' . $this->_db->quote($img_name, PDO::PARAM_STR));
            $img_infos = $stmt->fetch();
            return $img_infos;
        } catch(PDOException $e) {
            return false;
        }
    }

    private function get_SQL_infos_img_by_id($id_image){
        try{
            $stmt = $this->_db->query('SELECT file_name, thumbnail_name FROM image WHERE id_image = ' . $id_image);
            $img_infos = $stmt->fetch();
            return $img_infos;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function get_image_name_by_file_name($img_name){
        if($this->get_img_infos_by_name($img_name)!=false){
            return $this->get_img_infos_by_name($img_name);
        }else{
            return false;
        }
    }

    public function get_infos_img_by_id($id_img){
        if($this->get_SQL_infos_img_by_id($id_img)!=false){
            return $this->get_SQL_infos_img_by_id($id_img);
        }
    }

	public function add_image($files){
        $files['userfile']['name'] = valideChaine($files['userfile']['name']);
        $add=TARGET_UPLOAD.$files['userfile']['name'];
        $tabName = explode(".", $files['userfile']['name']);
        $ext = $tabName[1];
        $validExt = array('JPG','jpg','png','jpeg');    // Extensions autorisees
        if(in_array($ext, $validExt)){
            if(move_uploaded_file($files['userfile']['tmp_name'],$add)){
                chmod("$add",0777);
            }
            if(!is_array($this->thumbnail_generator(50, 50, $files, $add))){
                $name_thumbnail = $this->thumbnail_generator(50, 50, $files, $add);
            }else{
                return $this->thumbnail_generator(50, 50, $files, $add);
            }
            if($this->add_SQL_image($files['userfile']['name'], $name_thumbnail)){
                return $files['userfile']['name'];
            }else{
                return simply_notif('danger', "Une erreur inconnu c'est produite, contacter un administrateur !", "center");
            }
        }else{
            return simply_notif('danger', "Cette extension de fichier n'est pas prise en charge !", "center");
        }
	}
}
?>