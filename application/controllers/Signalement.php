<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Signalement extends REST_Controller {

    /*public function index()
    {
        $this->load->view('vuelistertous');
    }*/



    public function signalement_post(){
        $latitude=$this->post('latitude');
        $longitude=$this->post('longitude');
        $date=$this->post('date');
        $id_etat=$this->post('id_etat');
        $id_user=$this->post('id_user');
        $id_evenement=$this->post('id_evenement');
        //var_dump($latitude , $longitude, $date, $id_etat, $id_user, $id_evenement);

        if ($latitude != "" && $longitude != "" && $date!= "" && $id_etat!="" && $id_user != "" && $id_evenement != ""){
            $this->load->model('Signalementbdd');
            $this->Signalementbdd->insererSignalement($latitude, $longitude, $date, $id_etat, $id_user, $id_evenement);
            $donnees_reponse = array("message"=>"Signalement cree, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur creation manque des infos");
            $status=408;



        }
        $this->response($donnees_reponse,$status);



    }











    public function supsignalement_get()
    {
       //Pour récup data from url : $idproduit=$this->uri->segment(3);

        $id=$this->get('id');

        if ($id != ""){
            $this->load->model('Signalementbdd');
            $this->Signalementbdd->supprimerSignalement($id);

            $donnees_reponse = array("message"=>"Signalement supprime, Merci !");
            $status=201;
        }else{
            $donnees_reponse = array("message"=>"erreur suppression manque l'id");
            $status=408;
        }

        $this->response($donnees_reponse,$status);
    }







    public function signalement_get()
    {


// je récupère des data dans l'url (params) de la requete HTTP
        $id=$this->get('id');
        $rayon=$this->get('rayon');
        $latitude_ref =$this->get('latitude');
        $longitude_ref =$this->get('longitude');

        if ($id > 0 ){
            $this->load->model('Signalementbdd');
            $donnees=$this->Signalementbdd->listerSignalement($id);

        }elseif ($rayon > 0 && $latitude_ref != "" && $longitude_ref != ""){
            $this->load->model('Signalementbdd');
            $donnees=$this->Signalementbdd->listerSignalementRayon($rayon, $latitude_ref, $longitude_ref);


        }else{
            $this->load->model('Signalementbdd');
            $donnees=$this->Signalementbdd->listerSignalementTous();
        }

        $this->response($donnees,200);
    }






    public function signalement_put()
    {
        //TODO
        // 1- récupérer les parametres / données de la requete HTTP, et faire les vérifications nécessaires (session etc.)
        // 2- faire éventuellement appel à la couche Base de données (requetes SQL)
        // 3- transmettre les données à la vue pour génération de la réponse HTTP

        /*
        on récupère les data en POST ou GET par
        // variables will be false if not post data exists
         $var_1 = $this->input->post('ma_donnee');
         $var_2 = $this->input->get('ma_donnee2');
        */

    }

    public function Signalementdownvote_put(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $id=$this->put('id_signalement');
        $id_user=$this->put('id_user');


        if ($id != "" && $id_user != "" ){
            $this->load->model('Signalementbdd');
            $this->Signalementbdd->downvoteSignalement($id, $id_user);
            $donnees_reponse = array("message"=>"Downvote envoye, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur Downvote annule");
            $status=408;

        }
        $this->response($donnees_reponse,$status);
    }


    public function Signalementupvote_put(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $id=$this->put('id_signalement');
        $id_user=$this->put('id_user');


        if ($id != "" && $id_user != "" ){
            $this->load->model('Signalementbdd');
            $this->Signalementbdd->upvoteSignalement($id, $id_user);
            $donnees_reponse = array("message"=>"Upvote envoye, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur Upvote annule");
            $status=408;

        }
        $this->response($donnees_reponse,$status);
    }

}
