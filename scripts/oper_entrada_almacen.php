<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/entrada_de_almacen.php");
    
    $EA = new Entrada_de_Almacen();
    
    switch ($_GET[o]) {
        case 'ConsultaPedidos':
            $TextoBusqueda = $_GET["textobusqueda"];
            $Criterio = $_GET["criterio"];
            echo $EA->ConsultaPedidos($TextoBusqueda, $Criterio);
            break;
        case 'ObtenerDetallePedido':
            $IDPedido = $_GET["idpedido"];
            echo $EA->ObtenerDetallePedido($IDPedido);
            break;
        case 'ModificarDetallePedido':
            $IDPedido = $_GET["idpedido"];
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            $IDCABMS = $_GET["idcabms"];
            $IDPartida = $_GET["idpartida"];
            $IDTipoMovimiento = $_GET["idtipomovimiento"];
            $CantidadEntrada = $_GET["cantidadentrada"];
            $RemisionFactura = $_GET["remisionfactura"];
            echo $EA->ModificarDetallePedido($IDPedido, $IDUnidadAdministrativa, $IDCABMS, $IDPartida, $IDTipoMovimiento, $CantidadEntrada, $RemisionFactura);
            break;
    }
?>
