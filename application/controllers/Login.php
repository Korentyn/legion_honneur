<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

//CLASS GESTION DES ENREGISTREMENTS TABLEAU

class Login extends REST_Controller
{


    //----------------------------------------------------
    public function login_put()
    {

        $id_user = $this->put('id_user');
        $login = $this->put('login');
        $password = $this->put('password');

        if ($id_user != "" && $login != "" && $password != "") {
            $this->load->model('Loginbdd');
            $this->Loginbdd->modifierLogin($id_user, $login, $password);
            $donnees_reponse = array("message" => "Profil modifie, Merci !");
            $status = 201;
        } else {

            $donnees_reponse = array("message" => "erreur de modification du profil");
            $status = 408;


        }
        $this->response($donnees_reponse, $status);


    }


    //----------------------------------------------------
    public function login_get()
    {
// je récupère des data dans l'url (params) de la requete HTTP
        $login = $this->get('login');
        $password = $this->get('password');

        $this->load->model('Loginbdd');
        $donnees = $this->Loginbdd->recupererLogin($login, $password);


        $this->response($donnees, 200);


    }


    //----------------------------------------------------
    public function login_post()
    {

        // je récupère des data dans le body de la requete HTTP
        $login = $this->post('login');
        $password = $this->post('password');

        if ($login != "" && $password != "") {
            $this->load->model('Loginbdd');
            $this->Loginbdd->creerLogin($login, $password);

            $donnees_reponse = array("message" => "creation " . $login . " ok !");
            $status = 201;
        } else {
            $donnees_reponse = array("message" => "erreur creation utilisateur");
            $status = 408;
        }

        $this->response($donnees_reponse, $status);


    }


    public function suplogin_get()
    {
        $id = $this->get('id_user');

        if ($id != "") {
            $this->load->model('Loginbdd');
            $this->Loginbdd->supprimerUser($id);
            $donnees_reponse = array("message" => "Compte supprime, Merci !");
            $status = 201;
        } else {

            $donnees_reponse = array("message" => "erreur de suppression du commentaire");
            $status = 408;

        }
        $this->response($donnees_reponse, $status);
    }


}
