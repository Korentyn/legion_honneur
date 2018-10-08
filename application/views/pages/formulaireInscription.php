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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/maTable.css'); ?>">
</head>
<body>
<nav>
    <div class="nav-wrapper grey darken-4">
        <a href="<?php echo site_url(''); ?>" class="brand-logo center">Legion d'honneur</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="waves-effect waves-light btn modal-trigger" href="#modalConnexion">Connexion</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a class="waves-effect waves-light btn modal-trigger" href="#modalConnexion">Connexion</a></li>
</ul>




<div class="row">
    <form class="myFormInscription col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="pseudo" type="text" class="validate">
                <label for="pseudo">Pseudo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="password1" type="password" class="validate">
                <label for="password1">Mot de passe</label>
            </div>
            <div class="input-field col s6">
                <input id="password2" type="password" class="validate">
                <label for="password2">Vérification mot de passe</label>
            </div>
        </div>
        <div class="row">
            <div class="flex">
                <a href="#" id="sign" class="bttn">Enregistrer</a>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {


        $('#sign').click(function () {
            var $nom = $("#nom").val();
            var $prenom = $("#prenom").val();
            var $note = $("#note").val();
            //alert("Vous avez tapé : " + $nom );

            poster_event($nom, $prenom, $note);
        });

    });

    function poster_event(nom, prenom, note) {

        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Bizness/legion_honneur/MyTab/index.php/User/user',
                header: "Accept : application/json",
                data: {
                    nom: nom,
                    prenom: prenom,
                    note: note,

                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function (data) {
                    console.log(data);


                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                }
            });
    }
</script>
</body>
</html>
