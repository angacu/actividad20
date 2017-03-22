<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Filtrado</title>
  </head>
  <body>
<?php
//conexiones a la BBDD
  include "dbNBA.php";

  //comprobación de errores:
  //comprobación de $_POST

  if(isset($_POST["equipo_local"])&&(!empty($_POST["equipo_local"]))){
  echo "MENSAJE RECIBIDO";
  $nba=new dbNBA();
  $resultado=$nba->devolverEquiposLocal($_POST["local"],$_POST["visitante"],$_POST["temporada"]);
	while ($fila=$resultado->fetch_assoc()) {
		echo "Nombre del equipo local es: " . $fila["equipo_local"] . "<br>";
		echo "Los puntos del equipo local es: " . $fila["puntos_local"] . "<br>";
		echo "Nombre del equipo visitante es: " . $fila["equipo_visitante"] . "<br>";
		echo "Los puntos del equipo visitante es: " . $fila["puntos_visitante"] . "<br>";
		echo "La temporada es: " . $fila["temporada"] . "<br><br>";
	}
  }else{
  ?>
  <a href="index.php"> NO ME HAS ENVIADO NA  </a>
  <?php

}
  ?>
  </body>
</html>
