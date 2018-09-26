<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
$opts = array(
    'http'=>array(
        'method'=>"GET",

    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://localhost/Bizness/legion_honneur/MyTab/index.php/Inscription/user', false, $context);
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

    <link rel="stylesheet" type="text/css" href="asset/css/maTable.css">
</head>
<body>
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
