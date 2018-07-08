<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<!-----------------------------------  NAVBAR ------------------------------------------->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" >Site Support technique</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Creation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tableau.php">Consulter les concerts</a>
            </li>

        </ul>

    </div>
</nav>
<!-----------------------------------  ticket ------------------------------------------->
<div class="container2">
    <?php foreach ($event as $obj ) : ?>
        <div class="card">
            <h2 class="card-header"><?= $obj->groupe_principal ?></h2><strong>Date et heure de l'évènement :</strong><?= $obj->date_concert ?>
            <div class="card-body">
                <p class="card-title"><strong>Première partie : </strong><?= $obj->groupe_pp ?></p>
                <p class="card-text"><strong>Salle :</strong><?= $obj->nom_salle ?></p>
                <img src="<?= $obj->image_even ?>" alt="">
                <hr>
                <h5>Détails :</h5><br>
                <hr>
                <p class="card-text"><strong>Adresse :</strong><?= $obj->adresse ?>, <?= $obj->zipcode ?></p><br>
                <p class="card-text"><strong>Numéro :</strong><?= $obj->telephone ?></p><br>
                <p class="card-text"><strong>Début du concert :</strong><?= $obj->horaire_debut ?></p><br>
                <p class="card-text"><strong>Fin du concert :</strong><?= $obj->horaire_fermeture ?></p><br>
                <p class="card-text"><strong>Tarif plein / adhérent :</strong><?= $obj->tarif_plein ?> / <?= $obj->tarif_adh ?></p><br>
                <p class="card-text"><strong>Date :</strong><?= $obj->date_concert ?></p>
                <a target="_blank" href="<?= $obj->acheter ?>" >Acheter votre ticket </a>
            </div>
        </div>

    <?php endforeach; ?>






</div>
</body>
</html>