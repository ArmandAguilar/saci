<?php
ini_set('session.auto_start','on');
session_start();
include("../sis.php");
include("$path/class/poolConnection.php");

$Validar="NO";
$pass=md5($_POST[pass]);
$obj = new poolConnection();
$con=$obj->Conexion();
$obj->BaseDatos($con);
$sql="Select Id,IdEmpleado,Nombres from sa_usuarios Where Usuario='$_POST[user]' And Password='$pass'";
$query=$obj->Query($con,$sql);
while ($row = mysqli_fetch_array($query))
    {
         $Validar="YES";
         $_SESSION["IdActivo"]=$row[Id];
         $_SESSION["Nombres"]=$row[Nombres];
         $_SESSION["IdEmpleado"]=$row[IdEmpleado];
    }
$obj->Cerrar($con,$query);
echo $Validar;

?>
