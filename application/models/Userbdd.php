<?php
class Userbdd extends CI_Model {




    public function listerUserTous() {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `name`');

        return $query->result_object();


    }



    public function creerUser($nom, $prenom, $note)
    {
        $this->load->database();

        $query = $this->db->query("INSERT INTO `name` (`nom`, `prenom`, `note`) 
        VALUES ('$nom','$prenom','$note')");

        return $query;
    }




    public function modifierUser($id_user, $nom, $prenom, $note) {

        $this->load->database();

        $sql = "UPDATE `name` SET `nom`=?, `prenom`=?, `note`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $prenom, $note));

        return $query;
    }




}
