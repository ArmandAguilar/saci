<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_FactorPronostico.php");

     switch ($_GET[o])
          {
               case '1':
                              $objFrm = new Cat_FactorPronostico();
                              $frm =  $objFrm->frm_add_fp();
                              echo $frm;
                   break;
               case '2':
                         $info->cboAnio=$_POST[cboAnio];
                         $info->cboMes=$_POST[cboMes];
                         $info->txtFactor=$_POST[txtFactor];
                         $objAdd= new Cat_FactorPronostico();
                         $objAdd->nuevo_ua($info);
                   break;
               case '3':
                             
                             $objBorrar = new Cat_FactorPronostico();
                             $frm=$objBorrar->borrar_ua($_POST[id]);
                             echo $frm;
                       break;
          }
?>
