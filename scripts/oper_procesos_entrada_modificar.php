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
                    echo $objEntrada->frm_modifcar();
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
        case '4':
                            $info->TBNoDocumento = $_POST[TBNoDocumento];
                            $info->vNumPedido = $_POST[TBIDPedidoArticulo]; 
                            $info->mCosto = $_POST[TBPrecioUnitario];
                            $info->vNoFactura = $_POST[TBFactura];
                            $info->dFechaFactura = $_POST[TBFechaFactura];
                            $info->Id_CABMS = $_POST[txtCAMBSS];
                            $info->txtIdTipoBien = $_POST[txtIdTipoBien];
                            //$info->Id_Localizacion;
                            $info->dFechaRegistro = $_POST[txtFechaRegistro];
                            $info->CveUsuario=$_SESSION[IdEmpleado];
                            $info->TBCaracteristicas = $_POST[TBCaracteristicas];
                            $info->CboEstado = $_POST[CboEstado];
                            $info->txtResguardante1 = $_POST[txtResguardante1];
                            $info->txtResguardante2 = $_POST[txtResguardante2];
                            $info->txtResguardante3 = $_POST[txtResguardante3];
                            $info->txtUIAdministrativa = $_POST[txtUIAdministrativa];
                            $info->txtCBTiposMovimiento = $_POST[txtCBTiposMovimiento]; 
                            
                            #muebele
                            $infomueble->txtMarcaMueble=$_POST[txtMarcaMueble];
                            $infomueble->txtMuebleTipo=$_POST[txtMuebleTipo];
                            $infomueble->txtMuebleModelo=$_POST[txtMuebleModelo];
                            $infomueble->txtMuebleModeloSerie=$_POST[txtMuebleModeloSerie];
                            $infomueble->chkMueblePedestal=$_POST[chkMueblePedestal];
                            $infomueble->chkMuebleFija=$_POST[chkMuebleFija];
                            $infomueble->chkMuebleGiratoria=$_POST[chkMuebleGiratoria];
                            $infomueble->chkMuebleRodajas=$_POST[chkMuebleRodajas];

                            $infomueble->chkMueblePlegable=$_POST[chkMueblePlegable];
                            $infomueble->chkMuebleCajones=$_POST[chkMuebleCajones];
                            $infomueble->chkMuebleGavetas=$_POST[chkMuebleGavetas];
                            $infomueble->chkMuebleEntrepano=$_POST[chkMuebleEntrepano];
                            echo $objEntrada->update_mueble_2000($info,$infomueble);
            break;
    }
  ?>
