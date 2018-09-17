<?php
date_default_timezone_set('Europe/Paris');
class Commentairebdd extends CI_Model
{


    public function listerCommentaireTous()
    {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `commentaire` WHERE visible =1 ORDER BY date, heure ASC');

        return $query->result_object();


    }

    public function listerCommentaire($id_signalement)
    {


        $this->load->database();

        $sql = "SELECT * FROM `commentaire` WHERE id_signalement =? AND visible=1 ORDER BY date, heure ASC";
        $query = $this->db->query($sql, array($id_signalement));
        return $query->result_object();


    }

    public function creerCommentaire($text, $id_user, $id_signalement)
    {
        $today_date = date("Y-m-d");
        $today_heure = date("H:i:s");
        $this->load->database();

        $query = $this->db->query("INSERT INTO `commentaire` (`texte`, `date`, `heure`, `id_user`, `id_signalement`) 
        VALUES ('$text','$today_date','$today_heure','$id_user', '$id_signalement')");

        return $query;
    }


    public function supprimerCommentaire($id_user, $id_commentaire)
    {

        $this->load->database();

        $sql = "UPDATE `commentaire` SET `visible`=0 WHERE id=? AND id_user=?";
        $query = $this->db->query($sql, array($id_commentaire, $id_user));
        return $query;


    }

    public function modifierCommentaire($id, $id_user, $texte)
    {

        $this->load->database();

        $sql = "UPDATE `commentaire` SET `texte`=? WHERE id= ? and id_user=".$id_user;
        $query = $this->db->query($sql, array($texte, $id));
        return $query;


    }



}