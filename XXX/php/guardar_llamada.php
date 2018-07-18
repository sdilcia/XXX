<?php
include("conexion.php");
$fecha=$_POST['txtfechallamada'];
$Nllamadas=$_POST['txtNllamadas'];
$observacion=$_POST['Observacion'];
$productor=$_POST['cboProductor'];
$control=$_POST['cboControl'];
$usuario=$_POST['cboTipoUsuario'];
$query="INSERT INTO tbl_llamadas(codigo_productor,codigo_control_llamada,codigo_usuario,fecha_llamada,numero_llamadas,observacion) 
VALUES('$productor','$control','$usuario','$fecha','$Nllamadas','$observacion')";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:historial_llamadas.php");
}else{
    echo"Error al insertar";

}

?>