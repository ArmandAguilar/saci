<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/reporte_de_programas_de_entrega.php");
    
    $RPE = new Reporte_Programas_Entrega();
    switch($_GET["o"]) {
       case 'ObtenerReporteProgramaEntrega':
           $Mes = $_GET["mes"];           
           $Orden = $_GET["orden"];
           echo json_encode($RPE->ObtenerReporte($Mes, $Orden));
           break;
       case '1':
       			echo $RPE->generar($_POST[xMes], $_POST[xOrden]);
       	break;
    }

?>
