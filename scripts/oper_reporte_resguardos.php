<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Resguardos.php");
    $obj = new Reporte_Resguardos();
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
	        	$info->Nombre=$_POST[Nombre];
                echo $obj->buscar_inv_empleado($info);     
            break;
        case '3':
		        	$info->txtCveCambs=$_POST[txtCveCambs];
		        	$info->txtDes=$_POST[txtDes];
		        	$info->txtResId=$_POST[txtResId];
		        	$info->txtNombre=$_POST[txtNombre];
		        	
                    echo $obj->Generar_Reporte($info);
                    
            break;
            
     }   
?>