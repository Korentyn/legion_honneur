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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
        </div>
        <div class="col-md-offset-1 col-md-3">
            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Note</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-offset-5 col-sm-1">
            <button type="submit" id="sign" class="btn btn-primary">Envoyer mes informations</button>
        </div>
    </div>

</div>

<script>

    $(document).ready ( function(){

        $('#sign').click(function() {
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
                success: function(data) {
                    console.log(data);



                },
                error: function(errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                }
            });
    }
</script>
</body>
</html>
