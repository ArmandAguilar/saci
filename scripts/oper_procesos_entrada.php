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
	     		        echo $objEntrada->load_form();
	     		    break;
	     	case '2':
	     			     $info->Patron = $_POST[Patron];
	     			     $info->Folio = $_POST[txtFolio];
	     			     $info->Descripcion = $_POST[txtDescipcion];
	     			    echo $objEntrada->buscar_pedido($info);
	     			  
	     	        break;
	     	case '3':
	     		     $info->id=$_POST[id];
	     		     echo $objEntrada->detalle_pedido($info);    
	     	         break;
	     	 case '4':
	     	 	        echo $objEntrada->Detalles();
	     	         break;
	     	 case '5':
				echo $objEntrada->add_tipobien_inventario($_POST[IdInvetario],$_POST[cboTipoBien], $_POST[IdCambs],$_SESSION[IdActivo]);
	     	      break;
	     	 case '6':
	     	 			switch ($_POST[IdTipoBien])
	     	 			 {
	     	 				case '1':
	     	 					     echo $objEntrada->bien_mueble_frm($_POST[IdCambs]);
	     	 					break;
	     	 				case '2':
	     	 						echo $objEntrada->bien_informatico_frm($_POST[IdCambs]);
	     	 					break;
	     	 				case '3':
	     	 						echo $objEntrada->bien_vehiculo_frm();
	     	 					break;
	     	 				case '4':
	     	 						echo $objEntrada->bien_acervo_frm();
	     	 					break;	
	     	 				
	     	 				default:
	     	 					 echo "default mode";
	     	 					break;
	     	 			}
	     	 		break;
	     	case '7':
	     		   echo $objEntrada->buscar_resguardante($_POST[txtPatronDResguardante1],$_POST[cve],$_POST[nombre]);
	     		break; 
                case '8':
	     		   echo $objEntrada->buscar_resguardante2($_POST[txtPatronDResguardante1],$_POST[cve],$_POST[nombre]);
	     		break; 
                case '9':
	     		   echo $objEntrada->buscar_resguardante3($_POST[txtPatronDResguardante1],$_POST[cve],$_POST[nombre]);
	     		break;
                case '10':
                            echo $objEntrada->UAdministrativa($_POST[cve],$_POST[nombre],$_POST[txtPatron]);
                    break;
                case '11':
                    //$info,$infoacervo
                                   
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
                            $infoacervo->txtAutor = $_POST[txtAutor];
                            $infoacervo->txtTitulo = $_POST[txtTitulo];
                            $infoacervo->txtUbicacion = $_POST[txtUbicacion];
                            
                            echo $objEntrada->guardar_registro_acervo($info, $infoacervo);
                    break;
              case '12':
                        echo $objEntrada->tipomoviemento($_POST[cboTipoInventario]);
                  break;
             case '13':
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
                            
                            $infovehiculo->txtMarcaVehiculo = $_POST[txtMarcaVehiculo];
                            $infovehiculo->txtTipoVehiculo = $_POST[txtTipoVehiculo];
                            $infovehiculo->txtModeloVehiculo = $_POST[txtModeloVehiculo];
                            $infovehiculo->txtSNVehiculo = $_POST[txtSNVehiculo];
                            $infovehiculo->txtSNMotorVehiculo = $_POST[txtSNMotorVehiculo];
                            $infovehiculo->txtPlacasVehiculo = $_POST[txtPlacasVehiculo];
                            $infovehiculo->txtDireccion = $_POST[txtDireccion];
                            $infovehiculo->txtTransmision = $_POST[txtTransmision];
                            
                            echo $objEntrada->guardar_registro_vehiculo($info, $infovehiculo);
                 break;
            case '14':
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
                            
                            $infoinformatico->txtSerieInfomatico=$_POST[txtSerieInfomatico];
                            $infoinformatico->txtMarcaInfomatico=$_POST[txtMarcaInfomatico];
                            $infoinformatico->txtModeloInfomatico=$_POST[txtModeloInfomatico];
                            $infoinformatico->txtDicosDuroInfomatico=$_POST[txtDicosDuroInfomatico];
                            $infoinformatico->txtRamInfomatico=$_POST[txtRamInfomatico];
                            $infoinformatico->txtProcesadorInfomatico=$_POST[txtProcesadorInfomatico];
                            $infoinformatico->txtPaginasMinutoInfomatico=$_POST[txtPaginasMinutoInfomatico];
                            $infoinformatico->txtFuentePoderInfomatico=$_POST[txtFuentePoderInfomatico];
                            $infoinformatico->txtMonitorSerieInfomatico=$_POST[txtMonitorSerieInfomatico];
                            $infoinformatico->txtMonitorMarcaInfomatico=$_POST[txtMonitorMarcaInfomatico];
                            $infoinformatico->txtTecladoSerialInfomatico=$_POST[txtTecladoSerialInfomatico];
                            $infoinformatico->txtTecladoMarcaInfomatico=$_POST[txtTecladoMarcaInfomatico];
                            $infoinformatico->txtMouseSerieInfomatico=$_POST[txtMouseSerieInfomatico];
                            $infoinformatico->txtMouseMarcaInfomatico=$_POST[txtMouseMarcaInfomatico];
                            
                            
                            echo $objEntrada->guardar_registro_informatico($info, $infoinformatico);
                break;
          case '15':
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
                            
                            
                            echo $objEntrada->guardar_registro_mueble($info, $infomueble);
              break;
            case '16':
                        $info->Patron = $_POST[Patron];
                        $info->Folio = $_POST[txtFolio];
	     		$info->Descripcion = $_POST[txtDescipcion];
                        echo $objEntrada->buscar_Cambs_2000($info);
                
                break;
            case '17':
                        $info->Patron = $_POST[Patron];
                        $info->Folio = $_POST[txtFolio];
	     		$info->Descripcion = $_POST[txtDescripcion];
                        echo $objEntrada->buscar_Inv_2000($info);
                break;
        case '18':
                    
                    echo $objEntrada->datos_inv_2000($_POST[Id_ConsecutivoInv]);
            break;
        case '19':
                    $info->Resguardante1=$_POST[Resguardante1];
                    $info->Resguardante2=$_POST[Resguardante2];
                    $info->Resguardante3=$_POST[Resguardante3];
                    $info->Id_Unidad=$_POST[IdAreaAdquisicion];
                    echo $objEntrada->dato_inv_DResguardo($info);
            break;
        case '20':
                    $info->Id_ConsecutivoInv=$_POST[Id_ConsecutivoInv];
                    $info->Id_TipoBien=$_POST[Id_TipoBien];
                    $info->IdCambs=$_POST[IdCambs];
                    echo $objEntrada->dato_inv_DCaracteristicas($info); 
                    //echo $_POST[Id_TipoBien];
            break;
        case '21':
                    //$info,$infoacervo
                                   
                            $info->TBNoDocumento = $_POST[TBNoDocumento];
                            $info->vNumPedido = $_POST[TBIDPedidoArticulo]; 
                            $info->mCosto = $_POST[TBPrecioUnitario];
                            $info->vNoFactura = $_POST[TBFactura];
                            $info->dFechaFactura = $_POST[TBFechaFactura];
                            $info->Id_CABMS = $_POST[txtCAMBSS];
                            $info->TBIDPedidoSInv = $_POST[TBIDPedidoSInv];
                            //$info->Id_Localizacion;
                            $info->dFechaRegistro = $_POST[dFechaRegistro];
                            $info->TBCaracteristicas = $_POST[TBCaracteristicas];
                            $info->CboEstado = $_POST[CboEstado];
                            $info->txtResguardante1 = $_POST[txtResguardante1];
                            $info->txtResguardante2 = $_POST[txtResguardante2];
                            $info->txtResguardante3 = $_POST[txtResguardante3];
                            $info->txtUIAdministrativa = $_POST[txtUIAdministrativa];
                            $info->txtCBTiposMovimiento = $_POST[txtCBTiposMovimiento];
                            $infoacervo->txtAutor = $_POST[txtAutor];
                            $infoacervo->txtTitulo = $_POST[txtTitulo];
                            $infoacervo->txtUbicacion = $_POST[txtUbicacion];
                           echo $objEntrada->update_acervo_2000($info,$infoacervo);
                            
                break;
        case '22':
                    //$info,$infovehiculo
                    
                            $info->TBNoDocumento = $_POST[TBNoDocumento];
                            $info->vNumPedido = $_POST[TBIDPedidoArticulo]; 
                            $info->mCosto = $_POST[TBPrecioUnitario];
                            $info->vNoFactura = $_POST[TBFactura];
                            $info->dFechaFactura = $_POST[TBFechaFactura];
                            $info->Id_CABMS = $_POST[txtCAMBSS];
                            $info->TBIDPedidoSInv = $_POST[TBIDPedidoSInv];
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
                            
                            $infovehiculo->txtMarcaVehiculo = $_POST[txtMarcaVehiculo];
                            $infovehiculo->txtTipoVehiculo = $_POST[txtTipoVehiculo];
                            $infovehiculo->txtModeloVehiculo = $_POST[txtModeloVehiculo];
                            $infovehiculo->txtSNVehiculo = $_POST[txtSNVehiculo];
                            $infovehiculo->txtSNMotorVehiculo = $_POST[txtSNMotorVehiculo];
                            $infovehiculo->txtPlacasVehiculo = $_POST[txtPlacasVehiculo];
                            $infovehiculo->txtDireccion = $_POST[txtDireccion];
                            $infovehiculo->txtTransmision = $_POST[txtTransmision];
                            echo $objEntrada->update_vehiculo2000($info, $infovehiculo);
                            
            break;
            case '23':
                        //$info,$infomatico
                        $info->TBNoDocumento = $_POST[TBNoDocumento];
                            $info->vNumPedido = $_POST[TBIDPedidoArticulo]; 
                            $info->mCosto = $_POST[TBPrecioUnitario];
                            $info->vNoFactura = $_POST[TBFactura];
                            $info->dFechaFactura = $_POST[TBFechaFactura];
                            $info->Id_CABMS = $_POST[txtCAMBSS];
                            $info->TBIDPedidoSInv = $_POST[TBIDPedidoSInv];
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
                            
                            $infoinformatico->txtSerieInfomatico=$_POST[txtSerieInfomatico];
                            $infoinformatico->txtMarcaInfomatico=$_POST[txtMarcaInfomatico];
                            $infoinformatico->txtModeloInfomatico=$_POST[txtModeloInfomatico];
                            $infoinformatico->txtDicosDuroInfomatico=$_POST[txtDicosDuroInfomatico];
                            $infoinformatico->txtRamInfomatico=$_POST[txtRamInfomatico];
                            $infoinformatico->txtProcesadorInfomatico=$_POST[txtProcesadorInfomatico];
                            $infoinformatico->txtPaginasMinutoInfomatico=$_POST[txtPaginasMinutoInfomatico];
                            $infoinformatico->txtFuentePoderInfomatico=$_POST[txtFuentePoderInfomatico];
                            $infoinformatico->txtMonitorSerieInfomatico=$_POST[txtMonitorSerieInfomatico];
                            $infoinformatico->txtMonitorMarcaInfomatico=$_POST[txtMonitorMarcaInfomatico];
                            $infoinformatico->txtTecladoSerialInfomatico=$_POST[txtTecladoSerialInfomatico];
                            $infoinformatico->txtTecladoMarcaInfomatico=$_POST[txtTecladoMarcaInfomatico];
                            $infoinformatico->txtMouseSerieInfomatico=$_POST[txtMouseSerieInfomatico];
                            $infoinformatico->txtMouseMarcaInfomatico=$_POST[txtMouseMarcaInfomatico];
                            echo $objEntrada->update_informatico_2000($info,$infoinformatico);
                break;
           case '24':
                            $info->TBNoDocumento = $_POST[TBNoDocumento];
                            $info->vNumPedido = $_POST[TBIDPedidoArticulo]; 
                            $info->mCosto = $_POST[TBPrecioUnitario];
                            $info->vNoFactura = $_POST[TBFactura];
                            $info->dFechaFactura = $_POST[TBFechaFactura];
                            $info->Id_CABMS = $_POST[txtCAMBSS];
                            $info->txtIdTipoBien = $_POST[txtIdTipoBien];
                            $info->TBIDPedidoSInv = $_POST[TBIDPedidoSInv];
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
                            
                            
                            echo $objEntrada->update_mueble_2000($info, $infomueble);
               
               break;
           /*Consultar*/
            case '25':
                        echo $objEntrada->frm_consultar();
                  break;
            case '26':
                       $info->Patron = $_POST[Patron];
                       $info->Folio = $_POST[txtFolio];
                       $info->Descripcion = $_POST[txtDescripcion];
                       echo $objEntrada->buscar_consulta_2000($info);
                 break;
           case '27':
                        echo $objEntrada->datos_inv_2000_consultar($_POST[Id_ConsecutivoInv]);
                break;
            /*modifcar */
        case '28':
                  echo $objEntrada->frm_modifcar();
            break;
        case '29':
                    echo $objEntrada->guardar_modificar();
            break;
            
     }
?>