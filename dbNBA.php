<?php
// actividad 20
class dbNBA
{
  // datos de la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  // creamos el objeto de conexion
  private $conexion;

  // control de errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  // comprobacion de si hay errores
  function hayError(){
    return $this->error;
  }

  // funciones para la devolucion de resultados
  // utilizaremos el select distinct para no repetir datos
  public function devolverEquipoLocal(){
    if($this->error==false){
      $local = $this->conexion->query("SELECT DISTINCT Nombre FROM equipos");
      return $local;
    }else{
      return null;
    }
  }
  public function devolverEquipoVisitante(){
    if($this->error==false){
      $visitante = $this->conexion->query("SELECT DISTINCT Nombre FROM equipos");
      return $visitante;
    }else{
      return null;
    }
  }
  public function devolverTemporada(){
    if($this->error==false){
      $temporada = $this->conexion->query("SELECT DISTINCT temporada FROM partidos");
      return $temporada;
    }else{
      return null;
    }
  }

  public function devolverEquiposLocal($local,$visitante,$temporada){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT DISTINCT equipo_local, puntos_local, equipo_visitante, puntos_visitante, temporada FROM partidos WHERE equipo_local= '".$local."' AND equipo_visitante='".$visitante."' AND temporada='".$temporada."'");
      return $resultado;
    }else{
      return null;
    }
  }
}


 ?>
