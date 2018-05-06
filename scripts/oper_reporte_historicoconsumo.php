<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_HistoricoConsumo.php");
    $obj = new Reporte_HistoricoConsumo();
     switch ($_GET[o]) {
        case '1':
                 $info->Patron=$_POST[txtPatron];
		 		 $info->Clave=$_POST[Clave];
		 		 $info->Descripcion=$_POST[Descripcion];
                 echo $obj ->buscar_cambs1($info);   
            break;
        
        case '3':
        	        $info ->fecha1 = $_POST[fecha1];
        	        $info ->fecha2 = $_POST[fecha2];
        	        $info ->Cambs = $_POST[Cambs];
                    echo $obj->Generar_Reporte($info);
            break;
            
     }   
?>