<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Procesos_MovimientoBienes.php");
    $Movimiento =  new MovimientoBienes();
    switch ($_GET[o]) 
    {
    	case 1:
    			   echo $Movimiento->frm_load();
    		break;
    	case 2:
		    		$info->Patron=$_POST[txtPatron];
		    		$info->Clave=$_POST[Clave];
		    		$info->Descripcion=$_POST[Descripcion];
		    		echo $Movimiento->buscar_inv($info);
    		break;
         case 3:
    			echo $Movimiento->loadCboMovimientos($_POST[idEdoBien],$_POST[idMovimeinto],$_POST[idConsecutivo]);
    			break;
         case 4:
		         	$info->Patron=$_POST[txtPatron];
		         	$info->Clave=$_POST[Clave];
		         	$info->Nombre=$_POST[Nombre];
         	         echo $Movimiento->buscar_inv_empleado($info);
         	break;
         case 5:
		         	$info->Patron=$_POST[txtPatron];
		         	$info->Clave=$_POST[Clave];
		         	$info->Descripcion=$_POST[Descripcion];
		         	echo $Movimiento->buscar_inv_ua($info);
         	break;
         case 6:
				 /*guadamos movientos */
         	$info->Id_CABMS=$_POST[Id_CABMS];
         	$info->Id_ConsecutivoInv=$_POST[Id_ConsecutivoInv];
         	$info->Resguardante1=$_POST[Resguardante1];
         	$info->Resguardante2=$_POST[Resguardante2];
         	$info->Resguardante3=$_POST[Resguardante3];
         	$info->Id_TipoMovimiento=$_POST[Id_TipoMovimiento];
         	$info->Id_Unidad=$_POST[Id_Unidad];
         	$info->eNumFolio=$_POST[eNumFolio];
         	$info->dFechaResguardo=$_POST[dFechaResguardo];
         	$info->Id_EdoBien=$_POST[Id_EdoBien];
         	$D=date(d);
         	$M=date(m);
         	$Y=date(Y);
         	$Fecha = "$Y/$M/$D";
         	$info->dFechaMovRegistro=$Fecha;
         	$info->vDoctoOficial=$_POST[vDoctoOficial];
         	echo $Movimiento->guardar_mov($info);
         	break;
         case '7':
					echo $Movimiento->historial_movimientos($_POST[id]);
         	break;
    }		
    
?>