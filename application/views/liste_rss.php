<?php
$racine = new SimpleXMLElement("<rss version=\"2.0\"></rss>");
$channel=$racine->addChild('channel');
$channel->addChild('title','Actualités de Haute-Garonne - ladepeche.fr');
$channel->addChild('link','https://www.ladepeche.fr/communes/haute-garonne,31.html');
$channel->addChild('description','Toute l\'actualité en temps réel');
$channel->addChild('copyright','ladepeche.fr');
$header=$channel->addChild('image');
$header->addChild('link','https://www.ladepeche.fr/communes/haute-garonne,31.html');
$header->addChild('url','https://www.ladepeche.fr/images/header/logo_ddm.png');
$channel->addChild('lastBuildDate','Wed, 25 Apr 2018 16:42:03 +0200');
$channel->addChild('pubDate','Wed, 25 Apr 2018 16:42:03 +0200');

foreach ($events as $event) {


    $item=$channel->addChild('item');
    $item->addChild('title', $event->groupe_principal);
    $item->addChild('link', $event->site_salle);
    $item->addChild('description', $event->adresse);
    $item->addChild('pubDate', $event->date_concert);

    /*
        $salle=$evenement->addChild('salle');
        $salle->addChild('nom', $item->nom_salle);
        $salle->addChild('adresse', $item->adresse);
        $salle->addChild('zipcode', $item->zipcode);
        $salle->addChild('telephone', $item->telephone);
        $salle->addChild('site');
        $artistes=$evenement->addChild('artistes');
        $groupe=$artistes->addChild('groupe');
        $groupe->addAttribute('ref', 'principal');
        $groupe->addChild('nom', $item->);
        $groupe->addChild('genre', $item->genre_principal);
        $groupe->addChild('image', $item->principal_img);
        $groupe->addChild('site', $item->principal_site);
        $groupe=$artistes->addChild('groupe');
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
    */
}

header('Content-type: text/xml');
echo $racine->asXML();
?>