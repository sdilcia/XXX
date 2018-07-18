<?php
include("conexion.php");
$id=$_REQUEST['id_llamada'];
$fecha=$_POST['txtfechallamada'];
$Nllamadas=$_POST['txtNllamadas'];
$observacion=$_POST['Observacion'];
$productor=$_POST['cboProductor'];
$control=$_POST['cboControl'];
$usuario=$_POST['cboTipoUsuario'];
$query="UPDATE tbl_llamadas SET fecha_llamada='$fecha',numero_llamadas='$Nllamadas',
observacion='$observacion',codigo_productor='$productor',codigo_control_llamada='$control',
codigo_usuario='$usuario' WHERE codigo_llamada=$id";
$resultado=$conexion->query($query);
if($resultado){
  header("Location:historial_llamadas.php");
}else{
    echo"Error al Modificar";

}

?>