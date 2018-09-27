<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
$opts = array(
    'http'=>array(
        'method'=>"GET",

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.css"/>

    <link rel="stylesheet" type="text/css" href="../asset/css/maTable.css">
</head>
<body>

<!----------------    MODAL ------------------>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Inscription</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------->

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
    <?php foreach ($json as $key=>$value){
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            responsive: true,

            } );

        });




</script>
</body>
</html>
