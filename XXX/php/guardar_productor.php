<?php
include("conexion.php");
$nombre=$_POST['txtnombre'];
$apellido=$_POST['txtapellido'];
$identidad=$_POST['txtidentidad'];
$area=$_POST['txtarea'];
$departamento=$_POST['txtdepartamento'];
$municipio=$_POST['txtmunicipio'];
$comunidad=$_POST['txtcomunidad'];
$organizacion=$_POST['txtorganizacion'];
//$telefono=$_POST['txtTelefono'];
$estado=$_POST['cboEstado'];
$zona=$_POST['cboZona'];
$query="INSERT INTO tbl_productor(codigo_estado,codigo_zona,nombre_productor,apellido_productor,numero_identidad,area,departamento,municipio,comunidad,organizacion)
 VALUES('$estado','$zona','$nombre','$apellido','$identidad','$area','$departamento','$municipio','$comunidad','$organizacion')";
$resultado=$conexion->query($query);

//$query2="INSERT INTO tbl_telefono(codigo_productor,numero_telefono) VALUES('$codigo_productor','$telefono')";
//$resultado1=$conexion->query($query1);

if($resultado){
  header("Location:lista_productores.php");
}else{
    echo"Error al insertar";

}

?>