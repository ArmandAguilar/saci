<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/entrada_inventariables.php");
    
    $EI = new Entrada_Inventariables();
    
    switch ($_GET[o]) {
        case 'ConsultaPedidos':
            $TextoBusqueda = $_GET["textobusqueda"];
            $Criterio = $_GET["criterio"];
            echo $EI->ConsultaPedidos($TextoBusqueda, $Criterio);
            break;
        case 'ConsultaEmpleados':
            $TextoBusqueda = $_GET["textobusqueda"];
            $Criterio = $_GET["criterio"];
            echo $EI->ConsultaEmpleados($TextoBusqueda, $Criterio);
            break;
        case 'ObtenerDetallePedido':
            $IDPedido = $_GET["idpedido"];
            echo $EI->ObtenerDetallePedido($IDPedido);
            break;
        case 'ObtenerEstdosBien':
            echo json_encode($EI->ObtenerEstdosBien());
            break;
    }
?>
