<?php

function con()
{
    $host="localhost:3306";
$user="root";
$pw="";
$db="mydb";
$conexion=new mysqli($host,$user,$pw,$db);
}


?>