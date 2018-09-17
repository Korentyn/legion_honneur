<html>
<head>

    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXVO8Xx64rn_SxicqI5tcKPkLnsPK7Mig"></script>

    <!-- Menu -->
    <link rel="stylesheet" type="text/css" href="asset/css/menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="asset/css/perso.css">

</head>
<body>


<!--////////////////////// MENU  /////////////////////////-->


<div class="container">
    <div class="picture" id="carte"></div>

    <div class="navigation">
        <div class="nav_btns">
            <i class=" icon-home" aria-hidden="true"></i>
            <i class="nav_btn icon-magnifier" aria-hidden="true"></i>
            <i class="nav_btn_r icon-bell" aria-hidden="true"></i>
            <i class="nav_btn icon-user" aria-hidden="true"></i>
        </div>
        <div id="plusButton" class="plus">
            <div class="plusHor"></div>
            <div class="plusVer "></div>
        </div>
    </div>
    <div class="options">
        <i id="embouteillage_event" class="fa fa-car" aria-hidden="true"></i>
        <i id="accident_event" class="fa fa-car-crash" aria-hidden="true"></i>
        <i id="police_event" class="icon-shield" aria-hidden="true"></i>
        <i id="incendit_event" class="icon-fire" aria-hidden="true"></i>
        <i id="radar_event" class="icon-feed" aria-hidden="true"></i>
    </div>
</div>

<div class=""></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    var carte; // servira a stocker l'objet GMap
    var markers = []; // contient l'ensemble des infos des stations velib'
    var pop_up = [];
    var count = 0;
    var latitude_event;
    var longitude_event;
    var premier_passage = true;


    ///////////////// GENERATEUR MAP //////////////////////////////////////
    function affichercarte() {

        var latlng = new google.maps.LatLng(43.597074846780274, 1.452605307400692);
        //objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
        //de définir des options d'affichage de notre carte
        var options = {
            center: latlng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        //constructeur de la carte qui prend en paramêtre le conteneur HTML
        //dans lequel la carte doit s'afficher et les options
        carte = new google.maps.Map(		document.getElementById("carte"), options);





    }

    function contenu_pop_up(titre){

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">'+ titre+'</h3>'+
            '<div id="bodyContent">'+
            '<ul style="list-style-type: none;">'+
            '<li></li>'+
            '<li></li>'+
            '</ul>'+
            '</div>'+
            '</div>';




        return contentString;
    }

    function hideAllInfoWindows(map) {
        markers.forEach(function(marker) {
            marker.infowindow.close(map, marker);
        });
    }

    //////////////////////////FONCTION POUR AJOUTER LES MARKERS/////////////////////////////////////

    function ajouter_point(lat, long, icon, titre){

        var marker;
        var infowindow = new google.maps.InfoWindow({});

        marker = new google.maps.Marker(
            {
                position: new google.maps.LatLng(lat, long),
                icon : icon,
                infowindow : infowindow

            });
        marker.setMap(carte);
        marker.content=contenu_pop_up(titre);

        marker.addListener('click', function() {
            hideAllInfoWindows(carte);
            infowindow.setContent(this.content); // Le contenu de l'infowindow est défini au niveau du marker
            infowindow.open(carte, this); // this fait référence au marker associé à l'infowindow
        });

        return marker;

    }

    /////////////////////////////////\ RECUP DATA JCDECAUX \////////////////////////////////

    function callback_ok_recup(data){
        var icone;
        var title;

        for (i=0; i< data.length; i++){

            if(data[i].id_evenement == 1){
                // Icone accident
                title = 'Accident';
                icone = 'http://localhost/ISTEF/Waze/Waze-app/icones/accident.svg';

            }else if (data[i].id_evenement == 2){
                // Icone ralentissement
                title = 'Ralentissement';
                icone = 'http://localhost/ISTEF/Waze/Waze-app/icones/ralentissement.svg';

            }else if (data[i].id_evenement == 3){
                // Icone Police
                title = 'Police';
                icone = 'http://localhost/ISTEF/Waze/Waze-app/icones/policeman.svg';

            }else if (data[i].id_evenement == 4){
                // Icone Radar
                title = 'Radar';
                icone = 'http://maps.google.com/mapfiles/ms/icons/radar.svg';

            }else if (data[i].id_evenement == 5){
                // Icone Incendit
                title = 'Incendit';
                icone = 'http://maps.google.com/mapfiles/ms/icons/fire.svg';
            }

            var icon = {
                url : icone,
                scaledSize: new google.maps.Size(33, 33)
            }



            if (premier_passage) {
                // on cree le marqueur

                var lat = data[i].latitude;
                var long = data[i].longitude;
                //var address = data[i].address;
                //var available_bike = data[i].available_bikes;
                //var status = data[i].status;


                //console.log(lat, long);

                markers[i] = ajouter_point(lat, long, icon, title);



            } else {

                // on maj le marqueur
                //markers[i].setIcon(couleur);
                //markers[i].content=ajouter_pop_up(address, available_bikes, status);


            }

        }
        //console.log(markers);

        premier_passage = false;
    }


    //////////////////////////    FONCTION POUR RECUPERER LES EVENT AUTOUR DE SOIT    ////////////////////////////
    function recup(){
        $.ajax(
            {
                type: 'GET',
                url: 'http://localhost/ISTEF/Waze/Waze-app/index.php/Signalement/signalement',
                header: "Accept : application/json",
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function(data) {
                    console.log(data);
                    callback_ok_recup(data);







                    //$("#next").html(data.result.schedules[0]['message']);


                    //setInterval(recup, 10000);

                    // marker.setIcon pour modifier la couleur du marker
                },
                error: function(errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                }
            });
    }
    function menu() {

//Inspiration from Eddie Lobanovskiy  https://dribbble.com/shots/3208361-Plus-expanded
//Thanks Eddie for this amazing concept.


//Jquery used only for toggling classes.

        $('#plusButton').click(function(){
            $('.plusVer').toggleClass('plusVer_active');
            $('.picture').toggleClass('picture_up');
            $('.options').toggle();
            $('.options').toggleClass('options_show');
            $('.nav_btns').toggleClass('nav_btns_hide');
        });
//on Hover
        /*$("#plusButton").hover(function(){
             $('.plusVer').addClass('plusVer_active');
              $('.picture').addClass('picture_up');
              $('.options').show();
              $('.options').addClass('options_show');
            }, function(){
                $('.plusVer').removeClass('plusVer_active');
              $('.picture').removeClass('picture_up');
              $('.options').hide();
              $('.options').removeClass('options_show');
        });*/
    }
    ///////////////////////////// CREER MARKEUR DU USER ///////////////////////////////////
    function marker_user(lat, long){

        var marker;
        var icon = {
            url : 'http://localhost/ISTEF/Waze/Waze-app/icones/zombie.svg',
            scaledSize: new google.maps.Size(40, 40)
        }

        marker = new google.maps.Marker(
            {
                position: new google.maps.LatLng(lat, long),
                icon: icon,


            });
        marker.setMap(carte);






    }

    ////////////////////////// GEOLOCALISER L'UTILISATEUR ////////////////////////////////////////

    function callback_geo_ok(objet) {
        var latitude = objet.coords.latitude;
        var longitude = objet.coords.longitude;

        marker_user(latitude, longitude);
    }

    function callback_geo_error(objet) {
        console.log(objet.message+" / "+objet.code);
    }

    function geo() {
        if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(
// La fonction .getCurrentPosition récupère la position via le navigateur, une fois cela effectué, elle exectute
// 'callback_geo_ok' si ca s'est bien passé, et geo_error sinon.

                callback_geo_ok,
                callback_geo_error,
                { enableHighAccuracy:true, maximumAge:5000, timeout:5000}
            );


        } else {
            console.log('Erreur : pas de support de la géolocalisation dans votre navigateur');
        }
    }



    ///////////////////////////////////////// FONCTION AJOUTER EVENT A LA POSITION DU USER ////////////////////////


    function recup_position() {
        if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(
// La fonction .getCurrentPosition récupère la position via le navigateur, une fois cela effectué, elle exectute
// 'callback_geo_ok' si ca s'est bien passé, et geo_error sinon.

                callback_poster_ok,
                callback_poster_error,
                { enableHighAccuracy:true, maximumAge:5000, timeout:5000}
            );


        } else {
            console.log('Erreur : pas de support de la géolocalisation dans votre navigateur');
        }
    }
    function callback_poster_ok(objet) {
        latitude_event = objet.coords.latitude;
        longitude_event = objet.coords.longitude;

        console.log(latitude_event, longitude_event);
    }

    function callback_poster_error(objet) {
        console.log(objet.message+" / "+objet.code);
    }

    ///////////////////////////////// FONCTIONS POUR ENVOYER LES EVENTS ////////////////////////////

    function poster_event(event) {
        console.log( "event = " + event)


        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/ISTEF/Waze/Waze-app/index.php/Signalement/signalement',
                header: "Accept : application/json",
                data: {
                    latitude: latitude_event,
                    longitude: longitude_event,
                    id_evenement: event,

                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function(data) {
                    console.log(data);
                    callback_ok_recup(data);







                    //$("#next").html(data.result.schedules[0]['message']);


                    //setInterval(recup, 10000);

                    // marker.setIcon pour modifier la couleur du marker
                },
                error: function(errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                }
            });
    }




</script>
<script>



    $(document).ready ( function(){

        //console.log("ready");

        affichercarte();
        geo();
        menu();
        recup();
        //setInterval(recup, 10000);

        // Clic sur le bouton "+"
        $("#plusButton").click(function() {
            recup_position();
        })

        // Clic sur le bouton embouteillage
        $("#embouteillage_event").click(function() {
            poster_event('2');
        })

        // Clic sur le bouton accident
        $("#accident_event").click(function() {
            poster_event('1');
        })

        // Clic sur le bouton police
        $("#police_event").click(function() {
            poster_event('3');
        })

        // Clic sur le bouton radar
        $("#radar_event").click(function() {
            poster_event('4');
        })

        // Clic sur le bouton incendit
        $("#incendit_event").click(function() {
            poster_event('5');
        })
    })

</script>

</body>
</html>