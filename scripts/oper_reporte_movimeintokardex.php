<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_MovimientoKardex.php");
    $obj = new Reporte_MovimientoKardex();
     switch ($_GET[o]) {
        case '1':
                 $info->Patron=$_POST[txtPatron];
		 $info->Clave=$_POST[Clave];
		 $info->Descripcion=$_POST[Descripcion];
                 echo $obj ->buscar_cambs1($info);   
            break;
        case '2':
                    $info->Patron=$_POST[txtPatron];
		    $info->Clave=$_POST[Clave];
		    $info->Descripcion=$_POST[Descripcion];
                 echo $obj->buscar_cambs2($info); 
            break;
        case '3':
        			$info->Cambs=$_POST[txtCambsInicio];
        			$info->FehcaInicial=$_POST[txtFechaInicio];
        			$info->FechaFinal=$_POST[txtFechaFinal];
                    echo $obj->Generar_Reporte($info);
            break;
            
     }   
?>
