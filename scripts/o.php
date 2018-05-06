<?php

 include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Logos.php");
    
     switch ($_GET[o])
          {
               case '1':
                           
               break;
           
              case '2':
                  
                       $info->tipo=$_POST[tipo];
                       $info->img=$_POST[img];
                       $objSave = new Logos();
                       $frm = $objSave->SaveImagen($info);
                       
                       echo $frm;
                  break;
          }
?>
