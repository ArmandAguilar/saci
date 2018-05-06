<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_CapasidadAlmacen.php");
    $obj = new Reporte_CapasidadAlmacen();
     switch ($_GET[o]) {
        
        case '1':
                    $info->Tipo = $_POST[CBValor];
                    echo $obj->Generar_Reporte($info);
            break;
            
     }   
?>

