<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH.'/libraries/REST_Controller.php');


class User extends REST_Controller {

    
    //----------------------------------------------------
	public function user_put()
	{



		
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
    
    
    //----------------------------------------------------
    public function user_delete()
	{
       //TODO

       
	}
    
    
 
}
