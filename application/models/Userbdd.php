<?php
class Userbdd extends CI_Model {




    public function listerUserTous() {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `user`');

        return $query->result_object();


    }

    public function listerUser($id) {



        $this->load->database();

        $query = $this->db->query('SELECT * FROM `user` WHERE id='.$id);

        return $query->row();


    }

    public function creerUser($nom, $mail, $xp=null)
    {
        $this->load->database();

        $query = $this->db->query("INSERT INTO `user` (`nom`, `mail`, `xp`) 
        VALUES ('$nom','$mail','$xp')");

        return $query;
    }



    public function supprimerUser($id) {

        $this->load->database();

        $query = $this->db->query('UPDATE `user` SET visible=0 WHERE id ='.$this->db->escape($id));

        return $query;


    }


    public function modifierUser($id_user, $nom, $mail) {

        $this->load->database();

        $sql = "UPDATE `user` SET `nom`=?, `mail`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $mail));

        return $query;
    }




}
