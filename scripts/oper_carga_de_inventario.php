<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/carga_de_inventario.php");
    
    $CI = new Carga_Inventario();
    
    switch ($_GET[o]) {
        case 'ObtenerExistenciaConsumible':
            $IDCABMS = $_GET["idcabms"];
            echo json_encode($CI->ObtenerExistenciaConsumibles($IDCABMS));
            break;
        case 'InsertarExistenciaConsumible':
            $IDCABMS = $_GET["idcabms"];
            $Disponible = $_GET["disponible"];
            $Apartado = $_GET["apartado"];
            $Costo = $_GET["costo"];
            echo "{ Insertado: ".$CI->InsertarExistenciaConsumible($IDCABMS, $Disponible, $Apartado, $Costo)." }";
            break;
        case 'ModificarExistenciaConsumible':
            $ID = $_GET["id"];
            $Disponible = $_GET["disponible"];
            $Apartado = $_GET["apartado"];
            $Costo = $_GET["costo"];
            echo "{ Modificado: ".$CI->ModificarExistenciaConsumible($ID, $Disponible, $Apartado, $Costo)." }";
            break;
    }
?>
