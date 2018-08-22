<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH.'/libraries/REST_Controller.php');


class User extends REST_Controller {

    
    //----------------------------------------------------
	public function user_put()
	{

        $id_user=$this->put('id_user');
        $nom=$this->put('nom');
        $mail=$this->put('mail');

        if ($id_user != "" && $nom != "" && $mail!= "" ){
            $this->load->model('Userbdd');
            $this->Userbdd->modifierUser($id_user, $nom, $mail);
            $donnees_reponse = array("message"=>"Profil modifie, Merci !");
            $status=201;
        }else{

            $donnees_reponse = array("message"=>"erreur de modification du profil");
            $status=408;



        }
        $this->response($donnees_reponse,$status);

		
	}
    
    
    //----------------------------------------------------
    public function user_get()
	{
// je récupère des data dans l'url (params) de la requete HTTP
        $id=$this->get('id');

        if ($id > 0){
            $this->load->model('Userbdd');
            $donnees=$this->Userbdd->listerUser($id);
        }else{

            $this->load->model('Userbdd');
            $donnees=$this->Userbdd->listerUserTous();


        }
        $this->response($donnees,200);


	}
    
    
    //----------------------------------------------------
    public function user_post()
	{

        // je récupère des data dans le body de la requete HTTP
        $nom=$this->post('nom');
        $mail=$this->post('mail');


        if ($nom!="" && $mail!="") {
            $this->load->model('Userbdd');
            $this->Userbdd->creerUser($nom,$mail);

            $donnees_reponse = array("message"=>"creation ".$nom." et ".$mail." ok !");
            $status=201;
        } else {
            $donnees_reponse = array("message"=>"erreur creation manque prenom");
            $status=408;
        }

        $this->response($donnees_reponse,$status);
        
        
        
       
	}
    
    
    
    public function supuser_get()
	{
        $id=$this->get('id_user');

       if ($id != ""){
           $this->load->model('Userbdd');
           $this->Userbdd->supprimerUser($id);
           $donnees_reponse = array("message"=>"Compte supprime, Merci !");
           $status=201;
       }
    else{

           $donnees_reponse = array("message"=>"erreur de suppression du commentaire");
           $status=408;

        }
        $this->response($donnees_reponse,$status);
	}
    
    
 
}
