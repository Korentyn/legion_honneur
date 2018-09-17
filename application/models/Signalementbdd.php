<?php
date_default_timezone_set('Europe/Paris');
class Signalementbdd extends CI_Model {

	
	public function insererSignalement($latitude, $longitude, $id_user, $id_evenement) {
        $rayon = 0.1; // Rayon = 100 mètres
        $today_date = date("Y-m-d");
        $today_heure = date("H:i:s");
        $this->load->database();
        $queryverif = $this->db->query("SELECT *,             
    (6366*acos(cos(radians($latitude))*cos(radians(latitude))*cos(radians(longitude) -radians($longitude))+sin(radians($latitude))*sin(radians(latitude)))) AS distance 
    FROM `signalement` 
    HAVING distance<=$rayon ");

        // Si il existe déjà dans la bdd le même id_evenement dans les 100 mètres, on rentre dans la boucle, sinon on insère dans la bdd
        if(count($queryverif->result_object())>0){
                $erreur = "EAE";
                return $erreur;
        }else{
            $query = $this->db->query("INSERT INTO `signalement` (latitude, longitude, date, heure, id_user, id_evenement) 
                VALUES (".$this->db->escape($latitude).", ".$this->db->escape($longitude).", ".$this->db->escape($today_date)."
                , ".$this->db->escape($today_heure).", ".$this->db->escape($id_user).", ".$this->db->escape($id_evenement).")");
            return $query;
    }

	}
    
    public function listerSignalementTous()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM `signalement` WHERE visible=1');
        return $query->result_object();
    }


    public function listerSignalementRayon($rayon, $latitude_ref, $longitude_ref){
// récupère les signalement avec rayon et emplacement personnalisé

            $this->load->database();

        $query = $this->db->query("SELECT *,             
    (6366*acos(cos(radians($latitude_ref))*cos(radians(latitude))*cos(radians(longitude) -radians($longitude_ref))+sin(radians($latitude_ref))*sin(radians(latitude)))) AS distance 
    FROM `signalement` WHERE visible=1
    HAVING distance<=$rayon ORDER by distance ASC");
        return $query->result_object();
        }




    public function listerSignalement($id) {
// récupère le signalement qui a pour id '$id'


        $this->load->database();

        $query = $this->db->query('SELECT * FROM `signalement` WHERE visible=1 AND id='.$id);

        return $query->row();


    }
    
        
    public function supprimerSignalement($id) {

        $this->load->database();
        $sql = "UPDATE `signalement` SET visible=0 WHERE id=?";
        $query = $this->db->query($sql, array($id));

        return $query;
    }

    public function upvoteSignalement($id_signalement, $id_user)
    {
        $today_date = date("Y-m-d");
        $today_heure = date("H:i:s");
        $this->load->database();
        $down = 1;
        $sqlverif = "SELECT * FROM `vote` WHERE id_signalement = ? AND id_user = ?";
        $queryverif = $this->db->query($sqlverif, array($id_signalement, $id_user));

        if (count($queryverif->result_object())>0){
            $sqldelete = "DELETE FROM `vote` WHERE id_user = ? AND id_signalement= ?";
            $this->db->query($sqldelete, array($id_user, $id_signalement));

            $sql = "INSERT INTO `vote` (id_user, id_signalement, valeur, date, heure) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->query($sql, array($id_user, $id_signalement, $down, $today_date, $today_heure));
        }else{
            $sql = "INSERT INTO `vote` (id_user, id_signalement, valeur, date, heure) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->query($sql, array($id_user, $id_signalement, $down, $today_date, $today_heure));
        }


        return $query;


    }

    public function downvoteSignalement($id_signalement, $id_user)
    {
        $today_date = date("Y-m-d");
        $today_heure = date("H:i:s");
        $this->load->database();
        $up = -1;
        $sqlverif = "SELECT * FROM `vote` WHERE id_signalement = ? AND id_user = ?";
        $queryverif = $this->db->query($sqlverif, array($id_signalement, $id_user));

        if (count($queryverif->result_object())>0){
            $sqldelete = "DELETE FROM `vote` WHERE id_user = ? AND id_signalement= ?";
            $this->db->query($sqldelete, array($id_user, $id_signalement));

            $sql = "INSERT INTO `vote` (id_user, id_signalement, valeur, date, heure) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->query($sql, array($id_user, $id_signalement, $up, $today_date, $today_heure));
        }else{
            $sql = "INSERT INTO `vote` (id_user, id_signalement, valeur, date, heure) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->query($sql, array($id_user, $id_signalement, $up, $today_date, $today_heure));
        }

        return $query;


    }
    
   
}
