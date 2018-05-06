<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_Parametro.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormTipo = new Cat_Parametro();
                          $frm=$objFormTipo->frm_add_parametro();
                          echo $frm;
                   break;
               case '2':
                         $info->Clave = $_POST[txtClave];
                         $info->Parametro=$_POST[txtParametro];
                         $info->Valor=$_POST[txtValor];
                         $objAdd= new Cat_Parametro();
                         $objAdd->nuevo_parametro($info);
                   
                   break;
               case '3':
                         $objFormBuscador = new Cat_Parametro();
                         $frm=$objFormBuscador->fmr_buscar_parametro();
                         echo $frm;
                   break;
               case '4':
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_Parametro,sDescripcion,sValor from sa_parametro where sDescripcion like '%$_POST[txtParametro]%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Parametro]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sValor]</td>    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_parametro($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Parametro', name : 'Id Tipo Bien', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Valor', name : 'Valor', width :200, sortable :false, align: 'center'},
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
                            
                             $objFormEditar = new Cat_Parametro();
                             $frm=$objFormEditar->frm_editar_parametro($_POST[id]);
                             echo $frm;
                       break;
                   case '6':
                              $info->Clave = $_POST[txtClave];  
                              $info->Descripcion=$_POST[txtParametro];
                              $info->Valor=$_POST[txtValor];
                              $info->id=$_POST[id];
                              $objActualizar =  new Cat_Parametro();
                              $objActualizar->editar_parametro($info);
                       
                       break;
                    case '7':
                             $objFrmBuscarBorrar = new Cat_Parametro();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;
                  case '8':
                            
                            $objBuscarBorrar = new Cat_Parametro();
                            $frm=$objBuscarBorrar->buscar_borrar_parametro($_POST[txtParametro]);
                            echo $frm;
                       break;
                   case '9':
                             
                             $objBorrar = new Cat_Parametro();
                             $frm=$objBorrar->borrar_parametro($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_Parametro();
                              $frm =$objFmrConsultar->frm_consultar_parametro();
                              echo $frm;
                       break;
                   
                   case '11':
                              $objConsultar = new Cat_Parametro();
                              $frm=$objConsultar->consultar($_POST[txtParametro]);
                              echo $frm;
                       break;
          }   
?>
