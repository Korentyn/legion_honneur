<?php

  // on se base sur le flux XML des infos parking de la ville de Nantes
    
  $doc = file_get_contents("http://data.nantes.fr/api/getDisponibiliteParkingsPublics/1.0/39W9VSNCSASEOGV");
  
  $xml = new SimpleXMLElement($doc);

  
?>

<html><body>


    
<?php

$groupesparking = $xml->answer->data->Groupes_Parking;

foreach ($groupesparking->Groupe_Parking as $parking){ 
      
	echo "<div>";
      
    echo "<h1>".$parking->Grp_nom."</h1>";
    echo "<h1>".$parking->Grp_disponible."</h1>";
   
	
	echo "</div>";
      
  }
 
?>


</body>
</html>