<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_EntradaYSalida.php");
    $objReporte = new Reporte_EntradaYSalida();
     switch ($_GET[o]) 
     {
        case '1':
        	    $info -> fecha1 = $_POST[fecha1];
        	    $info -> fecha2 = $_POST[fecha2];
        	    $info -> cbo = $_POST[unidad];
        	    echo $objReporte->Generar_Reporte($info);
                   
            break;
     }
?>