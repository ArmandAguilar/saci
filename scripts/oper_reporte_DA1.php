<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/DA1.php");
    $obj = new DA1();
     switch ($_GET[o]) {
        case '1':
                $f1 = split('/',$_POST[FechaInicial]);
                $FechaCorrectainicial = "$f1[2]/$f1[1]/$f1[0]";
                 $info->FechaInicial=$FechaCorrectainicial;
                 $f2 = split('/',$_POST[FechaFinal]);
                 $FechaCorrectaFinal = "$f2[2]/$f2[1]/$f2[0]";
		 $info->FechaFinal= $FechaCorrectaFinal;
                 echo $obj ->Generar_Reporte($info);  
            break;
            
     }   
?>
