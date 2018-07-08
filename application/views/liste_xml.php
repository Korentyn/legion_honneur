<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$racine = new SimpleXMLElement("<!DOCTYPE concerts SYSTEM 'concerts.dtd'><concerts></concerts>");
foreach ($event as $item) {



    $evenement=$racine->addChild('evenement');
    $evenement->addChild('date', $item->date_concert);
    $evenement->addChild('ville');
    $salle=$evenement->addChild('salle');
    $salle->addChild('nom', $item->nom_salle);
    $salle->addChild('adresse', $item->adresse);
    $salle->addChild('zipcode', $item->zipcode);
    $salle->addChild('telephone', $item->telephone);
    $salle->addChild('site', $item->site_salle);
    $artistes=$evenement->addChild('artistes');
    $groupe=$artistes->addChild('Commentaire');
    $groupe->addAttribute('ref', 'principal');
    $groupe->addChild('nom', $item->groupe_principal);
    $groupe->addChild('genre', $item->genre_principal);
    $groupe->addChild('image', $item->principal_img);
    $groupe->addChild('site', $item->principal_site);
    $groupe=$artistes->addChild('Commentaire');
    $groupe->addAttribute('ref', 'premiere');
    $groupe->addChild('nom', $item->groupe_pp);
    $groupe->addChild('genre', $item->genre_principal);
    $groupe->addChild('image', $item->principal_img);
    $groupe->addChild('site', $item->principal_site);
    $horaires=$evenement->addChild('horaires');
    $horaires->addChild('odp', $item->horaire_odp);
    $horaires->addChild('debut', $item->horaire_debut);
    $horaires->addChild('fermeture', $item->horaire_fermeture);
    $tarifs=$evenement->addChild('tarifs');
    $tarifs->addChild('plein', $item->tarif_plein);
    $tarifs->addChild('adherent', $item->tarif_adh);
    $evenement->addChild('acheter', $item->acheter);
    $evenement->addChild('image', $item->image_even);

}

header('Content-type: text/xml');
echo $racine->asXML();



?>