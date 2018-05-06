<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_EstadoBien.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormTipo = new Cat_EstadoBien();
                          $frm=$objFormTipo->frm_add_tb();
                          echo $frm;
                   break;
               case '2':
                         $info->Clave = $_POST[txtClave];
                         $info->TBI=$_POST[txtTBI];
                         $objAdd= new Cat_EstadoBien();
                         $objAdd->nuevo_tb($info);
                   
                   break;
               case '3':
                         $objFormBuscador = new Cat_EstadoBien();
                         $frm=$objFormBuscador->fmr_buscar_tb();
                         echo $frm;
                   break;
               case '4':
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id,Id_EdoBien,vDescripcion from sa_estadobien where vDescripcion like '%$_POST[txtTBI]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_EdoBien]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_tbi($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Tipo Bien', name : 'Id Tipo Bien', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
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
                            
                             $objFormEditar = new Cat_EstadoBien();
                             $frm=$objFormEditar->frm_editar_tb($_POST[IdTBI]);
                             echo $frm;
                       break;
                   case '6':
                              $info->Clave = $_POST[txtClave];
                              $info->TBI=$_POST[txtTBI];
                              $info->id=$_POST[id];
                              $objActualizar =  new Cat_EstadoBien();
                              $objActualizar->editar_tb($info);
                       
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_EstadoBien();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;
                  case '8':
                            
                            $objBuscarBorrar = new Cat_EstadoBien();
                            $frm=$objBuscarBorrar->buscar_borrar_tb($_POST[txtTBI]);
                            echo $frm;
                       break;
                   case '9':
                             
                             $objBorrar = new Cat_EstadoBien();
                             $frm=$objBorrar->borrar_tb($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_EstadoBien();
                              $frm =$objFmrConsultar->frm_consultar_tb();
                              echo $frm;
                       break;
                   
                   case '11':
                              $objConsultar = new Cat_EstadoBien();
                              $frm=$objConsultar->consultar($_POST[txtTBI]);
                             // echo $frm;
                       break;
                 
          }
?>