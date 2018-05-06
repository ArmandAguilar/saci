<?php
     include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/ConsumoPromedio.php");
    $obj = new ConsumoPromedio();
     switch ($_GET[o])
          {
               case '1':
                         $m=date(m);
                         $d=date(d);
                         $y=date(y);
                         $FechaIncial = "$y/01/01";
                         $FechaFinal = "$y/$m/$d";
                         $info->FechaInicial=$FechaIncial;
                         $info->FechaFinal=$FechaFinal;
                         echo $obj->CPromedio($info);    
               break;
          }
?>
