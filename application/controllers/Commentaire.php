<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Commentaire extends REST_Controller {



    public function index()
    {
        echo ('hello');
    }
    public function Commentaire_post(){
        $text=$this->post('texte');
        $id_user=$this->post('id_user');
        $id_signalement=$this->post('id_signalement');


        if ($text != "" && $id_user != "" && $id_signalement!= "" ){
            $this->load->model('Commentairebdd');
            $this->Commentairebdd->creerCommentaire($text, $id_user, $id_signalement);
            $donnees_reponse = array("message"=>"Commentaire envoyé, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur creation du commentaire");
            $status=408;



        }
        $this->response($donnees_reponse,$status);
    }


    public function Commentaire_get(){
        $id_signalement=$this->get('id_signalement');

        $this->load->model('Commentairebdd');
        $donnees=$this->Commentairebdd->listerCommentaire($id_signalement);

        $this->response($donnees,200);

    }


    public function Commentaire_put(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $id=$this->put('id_commentaire');
        $id_user=$this->put('id_user');
        $texte=$this->put('text');

        if ($id != "" && $id_user != "" && $texte!= "" ){
            $this->load->model('Commentairebdd');
            $this->Commentairebdd->modifierCommentaire($id, $id_user, $texte);
            $donnees_reponse = array("message"=>"Commentaire modifie, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur de modification du commentaire");
            $status=408;



        }
        $this->response($donnees_reponse,$status);
    }



    public function supcommentaire_get(){
        //TODO : récupérer l'id_user depuis la session de l'utilisateur

        $id=$this->get('id_commentaire');
        $id_user=$this->get('id_user');

        if ($id != "" && $id_user != "" ){
            $this->load->model('Commentairebdd');
            $this->Commentairebdd->supprimerCommentaire($id_user, $id);
            $donnees_reponse = array("message"=>"Commentaire supprime, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur de suppression du commentaire");
            $status=408;



        }
        $this->response($donnees_reponse,$status);

    }


}
