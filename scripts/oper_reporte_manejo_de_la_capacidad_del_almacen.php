<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/manejo_de_la_capacidad_del_almacen.php");
    
    $RMA = new Reporte_Manejo_Almacen();
    switch($_GET["o"]) {
       case 'ObtenerReporteManejoAlmacen':   
           $Valor = $_GET["valor"];
           echo json_encode($RMA->ObtenerReporte($Valor));
           break;
    }

?>
