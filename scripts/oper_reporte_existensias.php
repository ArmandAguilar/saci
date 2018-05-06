<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Existencias.php");
    $obj = new Reporte_Existencias();
     switch ($_GET[o]) {
        case '1':
		        	$info->Patron=$_POST[txtPatron];
		        	$info->Clave=$_POST[Clave];
		        	$info->Nombre=$_POST[Nombre];
		        	$info->Sel=$_POST[Sel];
                    echo $obj->buscar_empleado($info);     
            break;
        case '2':
		        	$info->Patron=$_POST[txtPatron];
		        	$info->Clave=$_POST[Clave];
		        	$info->Nombre=$_POST[Nombre];
		        	$info->Sel=$_POST[Sel];
		        	echo $obj->buscar_tipomovimiento($info);
        	break;
        case '3':
                   /* buscar invetario */
		        	$info->Patron=$_POST[txtPatron];
		        	$info->Sel=$_POST[Sel];
		        	echo $obj->buscar_inventario($info);
        break;
        case '4':
	        		/* buscar area */
	        		$info->Patron=$_POST[txtPatron];
	        		$info->Clave=$_POST[Clave];
	        		$info->Nombre=$_POST[Nombre];
	        		$info->Sel=$_POST[Sel];
	        		echo $obj->buscar_area($info);
        	break;
        case '5':
		        		$info->Patron=$_POST[txtPatron];
		        		$info->Sel=$_POST[Sel];
		        		echo $obj->buscar_marca_mueble($info);
        		break;
         case '6':
        			$info->Patron=$_POST[txtPatron];
        			$info->Sel=$_POST[Sel];
        			echo $obj->buscar_modelo_mueble($info);
        			
          break;
        case '7':
        				$info->Patron=$_POST[txtPatron];
        				$info->Sel=$_POST[Sel];
        				echo $obj->buscar_tipo_mueble($info);
        	break;
       /* Para TapInformatico */
        case '8':
		        	$info->Patron=$_POST[txtPatron];
		        	$info->Sel=$_POST[Sel];
		        	echo $obj->buscar_marcabien_informatico($info);
        	break;
        case '9':
		        	$info->Patron=$_POST[txtPatron];
		        	$info->Sel=$_POST[Sel];
		        	echo $obj->buscar_marcamouse_informatico($info);
        	break;
       case '10':
        		$info->Patron=$_POST[txtPatron];
        		$info->Sel=$_POST[Sel];
        		echo $obj->buscar_marcateclado_informatico($info);
        	break;
       case '11':
        			$info->Patron=$_POST[txtPatron];
        			$info->Sel=$_POST[Sel];
        			echo $obj->buscar_marcaprocesador_informatico($info);
        	break;
       case '12':
        		$info->Patron=$_POST[txtPatron];
        		$info->Sel=$_POST[Sel];
        		echo $obj->buscar_marca_informatico($info);
         break;
         case '13':
         	$info->Patron=$_POST[txtPatron];
         	$info->Sel=$_POST[Sel];
         	echo $obj->buscar_ram_informatico($info);
         	break;
        case '14':
         		$info->Patron=$_POST[txtPatron];
         		$info->Sel=$_POST[Sel];
         		echo $obj->buscar_dd_informatico($info);
         break;
        /* tap vehiculo */
         case '15':
         	$info->Patron=$_POST[txtPatron];
         	$info->Sel=$_POST[Sel];
         	echo $obj->buscar_marca_vehiculo($info);
         	break;
        case '16':
         		$info->Patron=$_POST[txtPatron];
         		$info->Sel=$_POST[Sel];
         		echo $obj->buscar_modelo_vehiculo($info);
         break;
       case '17':
         	$info->Patron=$_POST[txtPatron];
         	$info->Sel=$_POST[Sel];
         	echo $obj->buscar_tipo_vehiculo($info);
         break;
         /*acervo cultural*/
       case '18':
			       	$info->Patron=$_POST[txtPatron];
			       	$info->Sel=$_POST[Sel];
			       	echo $obj->buscar_autor_acervo($info);
       	break;
       	case '19':
       		$info->Patron=$_POST[txtPatron];
       		$info->Sel=$_POST[Sel];
       		echo $obj->buscar_titulo_acervo($info);
       		break;
       		case '20':
       			$info->Patron=$_POST[txtPatron];
       			$info->Sel=$_POST[Sel];
       			echo $obj->buscar_ubicacion_acervo($info);
       			//echo "Ubicacion";
       			break;
       		case '21':
		       			$info->txtIdEmpleadoInicial=$_POST[txtIdEmpleadoInicial];
		       			$info->txtIdEmpleadoFinal=$_POST[txtIdEmpleadoFinal];
		       			$info->txtAreaInicial=$_POST[txtAreaInicial];
		       			$info->txtAreaFinal=$_POST[txtAreaFinal];
		       			$info->txtInventarioInicial=$_POST[txtInventarioInicial];
		       			$info->txtInventarioFinal=$_POST[txtInventarioFinal];
		       			$info->txtFechaInicial=$_POST[txtFechaInicial];
		       			$info->txtFechaFinal=$_POST[txtFechaFinal];
		       			$info->txtMarcaMuebleInicio=$_POST[txtMarcaMuebleInicio];
		       			$info->txtMarcaMuebleFinal=$_POST[txtMarcaMuebleFinal];
		       			$info->txtMuebleTipoInicial=$_POST[txtMuebleTipoInicial];
		       			$info->txtMuebleTipoFinal=$_POST[txtMuebleTipoFinal];
		       			$info->txtMuebleModeloInicial=$_POST[txtMuebleModeloInicial];
		       			$info->txtMuebleModeloFinal=$_POST[txtMuebleModeloFinal];
		       			$info->chkMueblePedestal=$_POST[chkMueblePedestal];
		       			$info->chkMuebleFija=$_POST[chkMuebleFija];
		       			$info->chkMuebleGiratoria=$_POST[chkMuebleGiratoria];
		       			$info->chkMuebleRodajas=$_POST[chkMuebleRodajas];
		       			$info->chkMueblePlegable=$_POST[chkMueblePlegable];
		       			$info->chkMuebleCajones=$_POST[chkMuebleCajones];
		       			$info->chkMuebleGavetas=$_POST[chkMuebleGavetas];
		       			$info->chkMuebleEntrepano=$_POST[chkMuebleEntrepano];
		       			$info->chkMuebleSerie=$_POST[chkMuebleSerie];
       			       echo $obj->generar_reporte_muebles($info);
       			       
       			break;
       		case '22':
       			
       			$info->txtIdEmpleadoInicial=$_POST[txtIdEmpleadoInicial];
       			$info->txtIdEmpleadoFinal=$_POST[txtIdEmpleadoFinal];
       			$info->txtAreaInicial=$_POST[txtAreaInicial];
       			$info->txtAreaFinal=$_POST[txtAreaFinal];
       			$info->txtInventarioInicial=$_POST[txtInventarioInicial];
       			$info->txtInventarioFinal=$_POST[txtInventarioFinal];
       			$info->txtFechaInicial=$_POST[txtFechaInicial];
       			$info->txtFechaFinal=$_POST[txtFechaFinal];
       			$info->txtMovimientoInicial = $_POST[txtMovimientoInicial];
       			$info->txtMovimientoFinal = $_POST[txtMovimientoFinal];
       			$info->txtMarcaBienInfomaticoInicio=$_POST[txtMarcaBienInfomaticoInicio];
       			$info->txtMarcaBienInfomaticoFinal=$_POST[txtMarcaBienInfomaticoFinal];
       			$info->txtMarcaMouseInformaticoInicio=$_POST[txtMarcaMouseInformaticoInicio];
       			$info->txtMarcaMouseInformaticoFinal=$_POST[txtMarcaMouseInformaticoFinal];
       			$info->txtMarcaTecladoInformaticoInicio=$_POST[txtMarcaTecladoInformaticoInicio];
       			$info->txtMarcaTecladoInformaticoFinal=$_POST[txtMarcaTecladoInformaticoFinal];
       			$info->txtMarcaProcesadorInformaticoInicio=$_POST[txtMarcaProcesadorInformaticoInicio];
       			$info->txtMarcaProcesadorInformaticoFinal=$_POST[txtMarcaProcesadorInformaticoFinal];
       			$info->txtMarcaMarcaInformaticoInicio=$_POST[txtMarcaMarcaInformaticoInicio];
       			$info->txtMarcaMarcaInformaticoFinal=$_POST[txtMarcaMarcaInformaticoFinal];
       			$info->txtMarcaRamInformaticoInicio=$_POST[txtMarcaRamInformaticoInicio];
       			$info->txtMarcaRamInformaticoFinal=$_POST[txtMarcaRamInformaticoFinal];
       			$info->txtMarcaDdInformaticoInicio=$_POST[txtMarcaDdInformaticoInicio];
       			$info->txtMarcaDdInformaticoFinal=$_POST[txtMarcaDdInformaticoFinal];
       			echo $obj->generar_reporte_informatico($info);
       			break;
       		case '23':

       			$info->txtIdEmpleadoInicial=$_POST[txtIdEmpleadoInicial];
       			$info->txtIdEmpleadoFinal=$_POST[txtIdEmpleadoFinal];
       			$info->txtAreaInicial=$_POST[txtAreaInicial];
       			$info->txtAreaFinal=$_POST[txtAreaFinal];
       			$info->txtInventarioInicial=$_POST[txtInventarioInicial];
       			$info->txtInventarioFinal=$_POST[txtInventarioFinal];
       			$info->txtFechaInicial=$_POST[txtFechaInicial];
       			$info->txtFechaFinal=$_POST[txtFechaFinal];
       			$info->txtMovimientoInicial = $_POST[txtMovimientoInicial];
       			$info->txtMovimientoFinal = $_POST[txtMovimientoFinal];
       			$info->chkBVehiculoManual=$_POST[chkBVehiculoManual];
       			$info->chkVehiculoHidraulica=$_POST[chkVehiculoHidraulica];
       			$info->chkVehiculoAmbas=$_POST[chkVehiculoAmbas];
       			$info->chkVehiculoDireccionStandar=$_POST[chkVehiculoDireccionStandar];
       			$info->chkVehiculoDireccionAutomatica=$_POST[chkVehiculoDireccionAutomatica];
       			$info->chkVehiculoDireccionAmbas=$_POST[chkVehiculoDireccionAmbas];
       			$info->txtMarcaVehiculoInicio=$_POST[txtMarcaVehiculoInicio];
       			$info->txtMarcaVehiculoFinal=$_POST[txtMarcaVehiculoFinal];
       			$info->txtTipoVehiculoInicio=$_POST[txtMarcaVehiculoFinal];
       			$info->txtTipoVehiculoFinal=$_POST[txtTipoVehiculoFinal];
       			$info->txtModeloVehiculoInicio=$_POST[txtModeloVehiculoInicio];
       			$info->txtModeloVehiculoFinal=$_POST[txtModeloVehiculoFinal];
       			echo $obj->generar_reporte_vehiculo($info);
       			
       			break;
       		case '24':
       			$info->txtIdEmpleadoInicial=$_POST[txtIdEmpleadoInicial];
       			$info->txtIdEmpleadoFinal=$_POST[txtIdEmpleadoFinal];
       			$info->txtAreaInicial=$_POST[txtAreaInicial];
       			$info->txtAreaFinal=$_POST[txtAreaFinal];
       			$info->txtInventarioInicial=$_POST[txtInventarioInicial];
       			$info->txtInventarioFinal=$_POST[txtInventarioFinal];
       			$info->txtFechaInicial=$_POST[txtFechaInicial];
       			$info->txtFechaFinal=$_POST[txtFechaFinal];
       			$info->txtMovimientoInicial = $_POST[txtMovimientoInicial];
       			$info->txtMovimientoFinal = $_POST[txtMovimientoFinal];
       			$info->txtAutorAcervoInicio=$_POST[txtAutorAcervoInicio];
       			$info->txtAutorAcervoFinal=$_POST[txtAutorAcervoFinal];
       			$info->txtTituloAcervoInicio=$_POST[txtTituloAcervoInicio];
       			$info->txtTituloAcervoFinal=$_POST[txtTituloAcervoFinal];
       			$info->txtUbicacionAcervoInicio=$_POST[txtUbicacionAcervoInicio];
       			$info->txtUbicacionAcervoFinal=$_POST[txtUbicacionAcervoFinal];
       			echo $obj->generar_reporte_acervo($info);
       			break;
       		case '25':
   						$info->txtSqlMuebles=$_POST[txtSqlMuebles];
   						echo $obj->print_muebles_pdf($info);
       			break;
     }   
?>