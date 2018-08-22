<?php
date_default_timezone_set('Europe/Paris');
class Commentairebdd extends CI_Model
{


    public function listerCommentaireTous()
    {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `commentaire` ORDER BY date ASC');

        return $query->result_object();


    }

    public function listerCommentaire($id_signalement)
    {


        $this->load->database();

        $sql = "SELECT * FROM `commentaire` WHERE id_signalement =? ORDER BY date ASC";
        $query = $this->db->query($sql, array($id_signalement));
        return $query->result_object();


    }

    public function creerCommentaire($text, $id_user, $id_signalement)
    {
        $today = date("Y-m-d H:i:s");

        $this->load->database();

        $query = $this->db->query("INSERT INTO `commentaire` (`texte`, `date`, `id_user`, `id_signalement`) 
        VALUES ('$text','$today','$id_user', '$id_signalement')");

        return $query;
    }


    public function supprimerCommentaire($id_user, $id_commentaire)
    {

        $this->load->database();

        $sql = "DELETE FROM `commentaire` WHERE id=? AND id_user=?";
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