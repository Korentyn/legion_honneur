<html>
<head>
    <meta charset="UTF-8">


    <!--NAVBAR BOOTSTRAP 4.1-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>
<body>

<!--     NAVBAR BOOTSTRAP     -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo site_url(''); ?>">Carte</a>
            <a class="nav-item nav-link" href="#">Préférences</a>
            <a class="nav-item nav-link" href="#">Connexion</a>
            <a class="nav-item nav-link" href="<?php echo site_url('Inscription/index'); ?>">Page création</a>
            <button type="button" class="btn btn-success">Success</button>
        </div>
    </div>
</nav>
<!--////////// LIBRAIRIES BOOTSTRAP 4.1 ////////////////-->
</body>
</html>
