<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH.'/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;


// on appelle le service 
// GET/POST/PUT/DELETE www.monapp.com/index.php/Service
// GET www.monapp.com/index.php/Service/3
// POST www.monapp.com/index.php/Service
// DELETE www.monapp.com/index.php/Service/3
// GET www.monapp.com/index.php/Service/liste


class Service extends REST_Controller {

	function index_get()
    {
        // je récupère des data dans l'url (params) de la requete HTTP
        $id=$this->get('id');
        
        // je fais les requetes en BDD
        // ...
    
        // je renvoi une reponse HTTP
        // par défaut en JSON ou sinon en fonction du Accept !!
        $donnees_reponse = array("id"=>3,"nom"=>"toto","prenom"=>"tutu");
        $this->response($donnees_reponse,200);
    }
     
    
    
    function index_post()
    {
        // je récupère des data dans le body de la requete HTTP
        $nom=$this->post('nom');



        if ($nom!="") {
            $donnees_reponse = array("message"=>"creation ".nom." ok !");
            $status=201;
        } else {
            $donnees_reponse = array("message"=>"erreur creation manque prenom");
            $status=408; 
        }
        
        $this->response($donnees_reponse,$status);
    }
    
    
    
    
    function index_delete()
    {
        $id=$this->delete('id');
    }
    
    
    
    
    function index_put()
    {
        $nom=$this->put('nom');
        
        $donnees_reponse = array("message"=>"modif ok !");
        $this->response($donnees_reponse,201);
    }
    
    
    
    function liste_get()
    {
       
        
        $donnees_reponse = array("message"=>"ca marche");
        $this->response($donnees_reponse,200);
    }
    
    
}





