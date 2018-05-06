<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_UnidadMedida.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormUmedida = new Cat_UnidadMedida();
                          $frm=$objFormUmedida->frm_add_Umedidad();
                          echo $frm;
                   break;
               case '2':
                         $info->UMedida=$_POST[txtUmedida];
                         $objAdd= new Cat_UnidadMedida();
                         $objAdd->nuevo_Umedidad($info);
                   break;
               case '3':
                         $objFormMedidaBuscador = new Cat_UnidadMedida();
                         $frm=$objFormMedidaBuscador->fmr_buscar_Umedidad();
                         echo $frm;
                   break;
               case '4':
                          $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id_UMedida,vDescripcion from sa_umedida where vDescripcion like '%$_POST[txtUmedida]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_Umedidad($fila[Id_UMedida]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id U. Medida', name : 'Id U. Medida', width :90, sortable :false, align: 'center'},
                                                            {display: 'Unidada de Medida', name : 'Unidada de Medida', width :450, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 730,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                   break;
                   case '5':
                             $objFormEditar = new Cat_UnidadMedida();
                             $frm=$objFormEditar->frm_editar_Umedidad($_POST[IdUmedida]);
                             echo $frm;
                       break;
                   case '6':
                             $info->Umedida=$_POST[txtUmedida];
                              $info->Id=$_POST[id];
                              $objActualizarUmedida =  new Cat_UnidadMedida();
                              $objActualizarUmedida->editar_Umedidad($info);
                       
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_UnidadMedida();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;
                   case '8':
                            
                            $objBuscarBorrar = new Cat_UnidadMedida();
                            $frm=$objBuscarBorrar->buscar_borrar_Umedidad($_POST[txtGiro]);
                            echo $frm;
                       break;
                   case '9':
                             $objBorrar = new Cat_UnidadMedida();
                             $frm=$objBorrar->borrar_Umedidad($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_UnidadMedida();
                              $frm =$objFmrConsultar->frm_consultar_Umedidad();
                              echo $frm;
                       break;
                   
                   case '11':
                              $objConsultar = new Cat_UnidadMedida();
                              $frm=$objConsultar->consultar($_POST[txtUmedida]);
                              echo $frm;
                       break;
         
           }
           
?>