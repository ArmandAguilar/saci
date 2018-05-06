<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Inventario.php");
    
    $I = new Inventario();
    
    switch ($_GET[o]) {
        /*
        case 'ObtenerDescripcionArticuloCABMS':
            echo $I->ObtenerDescripcionArticulosCABMS();
            break;
         * 
         */
        case 'ObtenerDescripcionArticuloCABMS':
            $IDCABMSConsumible = $_GET["idcabmsconsumible"];
            echo $I->ObtenerDescripcionArticuloCABMS($IDCABMSConsumible);
            break;
        case 'ObtenerDescripcionLocalizacion':
            $IDLocalizacion= $_GET["idlocalizacion"];
            echo $I->ObtenerDescripcionLocalizacion($IDLocalizacion);
            break;
        case 'RegistrarTransferencia':
            $IDCABMS = $_GET["idcabms"];
            $ClaveAC = $_GET["claveac"];
            $ClaveInternaAC = $_GET["claveinternaac"];
            $IDLocalizacionOrigen = $_GET["idlocalizacionorigen"];
            $IDLocalizacionTraspaso = $_GET["idlocalizaciontraspaso"];
            $Cantidad = $_GET["cantidad"];
            echo $I->RegistrarTransferencia($IDCABMS, $ClaveAC, $ClaveInternaAC, $IDLocalizacionOrigen, $IDLocalizacionTraspaso, $Cantidad);
            break;
    }
?>
