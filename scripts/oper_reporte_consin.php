
<?php

include("../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Reporte_ConSin.php");
$obj = new Reporte_ConSin();
switch ($_GET[o]) {
	case '1':
	    $info->Fecha1 = $_POST[fecha1];
	    $info->Fecha2 = $_POST[fecha2];
		echo $obj->Generar_ReporteCon($info);
		break;
	case '2':
		$info->Fecha1 = $_POST[fecha1];
		$info->Fecha2 = $_POST[fecha2];
		echo $obj->Generar_ReporteSin($info);
		break;
}
?>

