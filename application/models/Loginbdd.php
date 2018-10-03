<?php
class Loginbdd extends CI_Model {




    public function recupererLogin($login, $password) {

        $this->load->database();


        $sql = "SELECT * FROM `users` WHERE login=? AND password=?";
        $query = $this->db->query($sql, array($login, $password));
        return $query->result_object();


    }



    public function creerLogin($login, $password)
    {
        $this->load->database();

        $query = $this->db->query("INSERT INTO `users` (`login`, `password`) 
        VALUES ('$login','$password')");

        return $query;
    }




    public function modifierLogin($id_user, $login, $password) {

        $this->load->database();

        $sql = "UPDATE `users` SET `login`=?, `password`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($login, $password));

        return $query;
    }




}
