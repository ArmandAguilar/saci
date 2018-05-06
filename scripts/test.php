<?php

include("../sis.php");
include("$path/class/poolConnection.php");
echo "Go<br>";
$obj = new poolConnection();
$con=$obj->Conexion();
$obj->BaseDatos($con);
$sql="Select Id,IdEmpleado,Nombres from sa_usuarios";
$query=$obj->Query($con,$sql);
while ($row = mysqli_fetch_array($query))
    {
         echo $row["Nombres"];
    }
$obj->Cerrar($con,$query);
echo "end<br>";


$link = mysqli_connect("localhost", "root", "root");

mysqli_select_db($link, "saci");

$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

$result = mysqli_query($link, "Select Id,IdEmpleado,Nombres from sa_usuarios");

mysqli_data_seek ($result, 0);

$extraido= mysqli_fetch_array($result);

echo "- Nombre: ".$extraido['Nombres']."<br/>";


mysqli_free_result($result);

mysqli_close($link);
 ?>
