<!DOCTYPE html>
<html>
<head>
    <title>Flat Sign Up Form Responsive Widget Template| Home :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link href="<?= base_url('asset/css/style.css') ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?= base_url('asset/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" media="all">
    <!-- //css files -->
    <!-- online-fonts -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url('asset/js/jquery.js')?>"></script>

</head>
<body>
<!--header-->
<div class="header-w3l">
    <h1>SUPPRESSION ARTISTE</h1>
</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
    <h2 class="sub-head">Formulaire</h2>
    <div class="sub-main">
        <form method="POST" action="http://localhost/ISTEF/PHP_mvc/my-app/index.php/groupe/supprimerid">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Liste des artistes</label>
                <select name="id_artiste" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach ($artistes as $artiste ) : ?>
                        <option value="<?= $artiste->id ?>"><?= $artiste->nom_groupe ?></option>
                    <?php endforeach; ?>

                </select>
            </div>



            <input type="submit" value="supprimer">
        </form>
    </div>
    <div class="clear"></div>
</div>
<!--//main-->

<!--footer-->
<div class="footer-w3">
    <p>&copy; 2016 Made By ElKokozorus Company</a></p>
</div>
<!--//footer-->

</body>
</html>