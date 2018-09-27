<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Inscription extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userbdd');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('layout/header');
        $this->load->view('pages/formulaireInscription');
        $this->load->view('layout/footer');
    }
/*
    public function view($page){

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('layout/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('layout/footer', $data);
    }
*/

    public function user_put()
    {

        $id_user=$this->put('id_user');
        $nom=$this->put('nom');
        $mail=$this->put('mail');

        if ($id_user != "" && $nom != "" && $mail!= "" ){

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




        $donnees=$this->Userbdd->listerUserTous();



        $this->response($donnees,200);


    }


    //----------------------------------------------------
    public function user_post()
    {

        // je récupère des data dans le body de la requete HTTP
        $nom=$this->post('nom');
        $prenom=$this->post('prenom');
        $note=$this->post('note');

        if ($nom!="" && $prenom!="") {
            $this->Userbdd->creerUser($nom,$prenom, $note);

            $donnees_reponse = array("message"=>"creation ".$nom." et ".$prenom." ok !");
            $status=201;
        } else {
            $donnees_reponse = array("message"=>"erreur creation manque prenom");
            $status=408;
        }

        $this->response($donnees_reponse,$status);




    }

}