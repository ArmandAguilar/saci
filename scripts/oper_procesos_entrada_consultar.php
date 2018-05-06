<?php
ini_set('session.auto_start','on');
session_start();
include("../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Entradas.php");
$objEntrada = new Entradas();
    switch ($_GET[o])
    {
        case '1':
                   echo $objEntrada->frm_consultar();
            break;
        case '2':
                    $info->Patron = $_POST[Patron];
                    $info->Folio = $_POST[txtFolio];
                    $info->Descripcion = $_POST[txtDescripcion];
                    echo $objEntrada->buscar_consulta_modificar($info);
            break;
        case '3':
                    echo $objEntrada->datos_inv_2000_consultar($_POST[Id_ConsecutivoInv]);
            break;
        default :
            
            break;
    }
?>