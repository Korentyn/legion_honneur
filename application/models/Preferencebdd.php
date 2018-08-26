<?php
class Preferencebdd extends CI_Model {

    public function creerPreference($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user)
    {
        $this->load->database();

        $sql = "INSERT INTO `preferences` (`rayon`, `latitude_favoris`, `longitude_favoris`,`avatar`, `id_user`)  
        VALUES (?,?, ?, ?, ?)";

        $query = $this->db->query($sql, array($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user));
        return $query;
    }

    public function modifierPreference($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user)
    {
        $this->load->database();
        echo ($rayon);
        $sql = "UPDATE `preferences` SET `rayon`=?,`latitude_favoris`=?,`longitude_favoris`=?,`avatar`=? WHERE id_user = ?";

        $query = $this->db->query($sql, array($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user));
        return $query;
    }

    public function listerPreference($id_user){
        $this->load->database();
        $sql = "SELECT * FROM `preferences` WHERE id_user =?";
        $query = $this->db->query($sql, array($id_user));
        return $query->result_object();
    }
}