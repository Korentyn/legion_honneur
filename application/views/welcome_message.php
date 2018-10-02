<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$opts = array(
    'http' => array(
        'method' => "GET",

    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://localhost/Bizness/legion_honneur/MyTab/index.php/User/user', false, $context);
$json = json_decode($file);

//var_dump($json);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Legion d'Honneur</title>

    <!--    CSS DATATABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/maTable.css">
    <link rel="stylesheet" type="text/css" href="asset/css/menu.css">
</head>
<body>

<div id="modalInscription" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="row">
            <form class="col s12">
                <div class="row">

                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Prénom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate">
                        <label for="name">Nom</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="textarea2" class="materialize-textarea" data-length="100"></textarea>
                        <label for="textarea2">Note</label>
                    </div>
                </div>


            </form>
        </div>

    </div>

        <div class="flex">
            <a href="#" id="sign" class="bttn">Enregistrer</a>
        </div>

</div>

<div class="wrapper">
    <table id="myTable" class="display">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($json as $key => $value) {
            echo "<tr>
        <td>$value->prenom</td>
        <td>$value->nom</td>
        <td>$value->note</td>
    </tr>";
        }

        ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>


    $(document).ready(function () {
        elem = $('#modalInscription').modal();
        $instance = M.Modal.getInstance(elem);

        $('#myTable').DataTable({
            responsive: true,
        });

        $('.sidenav').sidenav();

        $('input#input_text, textarea#textarea2').characterCounter();

        $('#sign').click(function ()
        {

            var $nom = $("#name").val();
            var $prenom = $("#last_name").val();
            var $note = $("#textarea2").val();
            console.log("Vous avez tapé : " + $note );

            poster_event($nom, $prenom, $note);

        });



    });

    function poster_event(nom, prenom, note) {
            console.log(nom);

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
                    window.location.reload();

                    $instance.close();

                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);

                    $instance.close();
                }
            });
    }


</script>
</body>
</html>
