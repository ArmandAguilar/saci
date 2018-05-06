<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/generacion_de_notas_de_cargo.php");
    
    $RGNC = new Reporte_Generacion_Notas_Cargo();
    switch($_GET["o"]) {
        case 'ConsultaPedidos':
            $TextoBusqueda = $_GET["textobusqueda"];
            $Criterio = $_GET["criterio"];
            echo $RGNC->ConsultaPedidos($TextoBusqueda, $Criterio);
            break;
       case 'ObtenerReporteGeneracionNotasCargo':
           $FolioPeriodo = $_GET["folioperiodo"];
           $Desde = $_GET["desde"];
           $Hasta = $_GET["hasta"];
           $Estatus = $_GET["estatus"];
           echo json_encode($RGNC->ObtenerReporte($FolioPeriodo, $Desde, $Hasta, $Estatus));
           break;
    }

?>
