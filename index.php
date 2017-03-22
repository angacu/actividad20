<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mvcNBA</title>
  </head>
  <body>
    <form class="" action="filtrado.php" method="post">
      <hr> <br> Locales:
      <?php
      include 'dbNBA.php';
      $nba=new dbNBA();
      $local=$nba->devolverEquipoLocal();
             echo "<select name='local'>";
             echo "<option> Introduce un equipo </option>";
      while ($fila = $local->fetch_assoc()) {
      echo "<option value='".$fila[ 'Nombre']."'>".$fila[ 'Nombre']."</option>";
      }
      echo "</select>"; echo "<br>"; echo "<br>";
       ?>

      <?php
      $local=$nba->devolverEquipoVisitante();
             echo "Equipo Visitante: ";
             echo "<select name='visitante'>";
             echo "<option> Introduce un equipo </option>";
      while ($fila = $local->fetch_assoc()) {
      echo "<option value='".$fila[ 'Nombre']."'>".$fila[ 'Nombre']."</option>";
      }
      echo "</select>"; echo "<br>"; echo "<br>";
       ?>

       <?php
       $nbaTemp=new dbNBA();
       $temporada=$nbaTemp->devolverTemporada();
       echo "Temporada:";
       echo "<select name='temporada'>";
       echo "<option> Introduce una temporada </option>";
       while ($fila = $temporada->fetch_assoc()) {
       echo "<option value='".$fila[ 'temporada']."'>".$fila[ 'temporada']."</option>";
      }
      echo "</select>";
      echo "<br>";
      echo "<br>";
        ?>

      <input type="submit" name="" value="Filtrar">
      <input type="reset" name="" value="Borrar">
      <br> <br>
      <hr>
    </form>
  </body>
</html>
