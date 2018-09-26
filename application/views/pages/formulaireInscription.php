<?php
/**
 * Created by PhpStorm.
 * User: c.frantz
 * Date: 18/09/2018
 * Time: 12:53
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8>
    <meta name="Content-Language" content="fr" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="Inscription" />
    <meta name="Subject" content="" />
    <meta name="Content-Type" content="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css" />
    <title>Neo-web.fr</title>
</head>

<body class="my_background">

<div class="container">

    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Nom">
            </div>
        </div>
        <div class="col-md-offset-1 col-md-3">
            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Prénom">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-7">
            <div class="form-group">
                <label for="Email">Email address</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
                <label for="Password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="col-md-offset-1 col-md-3">
            <div class="form-group">
                <label for="Vpassword">Vérification mot de passe</label>
                <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-3">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                <input type="text" class="form-control" placeholder="Téléphone" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-globe"></span>
                <input type="text" class="form-control" placeholder="Adresse" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-md-offset-5 col-md-1">
            <button type="button" class="btn btn-primary">Envoyer mes informations</button>
        </div>
    </div>

</div>
</body>
</html>
