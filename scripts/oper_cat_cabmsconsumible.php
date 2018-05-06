<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_CabmsConsumibles.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormCabmsC = new Cat_CabmsConsumibles();
                          $frm=$objFormCabmsC->frm_add_cabmsconsumibles();
                          echo $frm;
                   break;
               case '2':
                        $info->Id_CveInternaAC=$_POST[txtICveInternaAC];
                        $info->Id_CveARTCABMS=$_POST[txtCveARTCABMS];
                        $info->vDescripcion=$_POST[txtvDescripcion];
                        $info->Id_CABMS=$_POST[cboCabms];
                        $info->Id_UMedida=$_POST[cboMedida];
                        $info->ePartidaPresupuestal=$_POST[txtPPresupuestal];
                         
                         $objAdd= new Cat_CabmsConsumibles();
                         $objAdd->nuevo_cabmsconsumibles($info);
                   break;
               case '3':
                         $objFormGiroBuscador = new Cat_CabmsConsumibles();
                         $frm=$objFormGiroBuscador->fmr_buscar_cabmsconsumibles();
                         echo $frm;
                   break;
               case '4':
                          $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id,Id_CveInternaAC,Id_CveARTCABMS,vDescripcion,Id_CABMS,Id_UMedida,ePartidaPresupuestal from sa_cabmsconsumible where vDescripcion like '%$_POST[txtCabmsC]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveInternaAC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveARTCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_cabmsconsumible($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Clave Interna', name : 'Clave Interna', width :90, sortable :false, align: 'center'},
                                                            {display: 'Clave Art. Cambms', name : 'Clave Art. Cambms', width :90, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :300, sortable :false, align: 'center'},
                                                            {display: 'CABMS', name : 'CABMS', width :300, sortable :false, align: 'center'},
                                                            {display: 'Medida', name : 'Medida', width :250, sortable :false, align: 'center'},
                                                            {display: 'P. Presupuestal', name : 'Presu`uestal', width :150, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 830,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                     break;
                  case '5':
                            
                             $objFormEditar = new Cat_CabmsConsumibles();
                             $frm=$objFormEditar->frm_editar_cabmsconsumibles($_POST[id]);
                             echo $frm;
                       break;
                   case '6':
                             
                                $info->id=$_POST[id];
                               $info->txtICveInternaAC=$_POST[txtICveInternaAC];
                               $info->txtCveARTCABMS=$_POST[txtCveARTCABMS];
                               $info->txtvDescripcion=$_POST[txtvDescripcion];
                               $info->cboCabms=$_POST[cboCabms];
                               $info->cboMedida=$_POST[cboMedida];
                               $info->txtPPresupuestal=$_POST[txtPPresupuestal];
                              $objActualizar =  new Cat_CabmsConsumibles();
                              $objActualizar->editar_cabmsconsumibles($info);
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_CabmsConsumibles();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;   
                  case '8':
                            
                            $objBuscarBorrar = new Cat_CabmsConsumibles();
                            $frm=$objBuscarBorrar->buscar_borrar_cabmsconsumibles($_POST[txtCabmsC]);
                            echo $frm;
                       break;
                   case '9':
                             
                             $objBorrar = new Cat_CabmsConsumibles();
                             $frm=$objBorrar->borrar_cabmsconsumibles($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_CabmsConsumibles();
                              $frm =$objFmrConsultar->frm_consultar_cabmsconsumibles();
                              echo $frm;
                       break;
                   case '11':
                              $objConsultar = new Cat_CabmsConsumibles();
                              $frm=$objConsultar->consultar($_POST[txtCabmsC]);
                              echo $frm;
                       break;
         
               
          }     
?>
