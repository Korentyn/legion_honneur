<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Preferences extends REST_Controller {

    public function Preference_post(){
        $rayon=$this->post('rayon');
        $id_user=$this->post('id_user');
        $latitude_favoris=$this->post('latitude_favoris');
        $longitude_favoris=$this->post('longitude_favoris');
        $avatar=$this->post('avatar');


        if ($id_user != ""){
            $this->load->model('Preferencebdd');
            $this->Preferencebdd->creerPreference($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user);
            $donnees_reponse = array("message"=>"Preference envoyé, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur creation du Preference");
            $status=408;



        }
        $this->response($donnees_reponse,$status);
    }


    public function Preference_get(){
        $id_user=$this->get('id_user');

        $this->load->model('Preferencebdd');
        $donnees=$this->Preferencebdd->listerPreference($id_user);

        $this->response($donnees,200);

    }


    public function Preference_put(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $rayon=$this->put('rayon');
        $id_user=$this->put('id_user');
        $latitude_favoris=$this->put('latitude_favoris');
        $longitude_favoris=$this->put('longitude_favoris');
        $avatar=$this->put('avatar');

        if ($id_user != "" && $id_user != null){
            $this->load->model('Preferencebdd');
            $this->Preferencebdd->modifierPreference($rayon, $latitude_favoris, $longitude_favoris, $avatar, $id_user);
            $donnees_reponse = array("message"=>"Preference modifie, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur de modification du Preference");
            $status=408;



        }
        $this->response($donnees_reponse,$status);
    }



    public function suppreference_get(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $id=$this->get('id_commentaire');
        $id_user=$this->get('id_user');

        if ($id != "" && $id_user != "" ){
            $this->load->model('Preferencebdd');
            $this->Preferencebdd->supprimerPreference($id_user, $id);
            $donnees_reponse = array("message"=>"Preference supprime, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur de suppression du Preference");
            $status=408;



        }
        $this->response($donnees_reponse,$status);

    }



}
