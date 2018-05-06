<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_Empleado.php");
    
     switch ($_GET[o])
          {
                case '1':
                             $objFrm = new cat_empleado();
                             $frm = $objFrm->frm_add_empleado();
                             echo $frm;
                        break;
               case '2':
                        $info->Empleado=$_POST[txtEmpleado];
                        $info->Rfc=$_POST[txtRFC];
                        $info->ZonaPago=$_POST[txtZona];
                        $info->Cargo=$_POST[txtCargo];
                        $info->Adscripcion=$_POST[txtadscripcion];
                        $info->Ubicacion=$_POST[txtUbicacion];
                        $info->Domicilio=$_POST[txtDomicilio];
                        
                        
                        $objAdd = new cat_empleado();
                        $objAdd->nuevo_empleado($info);
                   
                   break;
               case '3':
                         $objFrmModificar = new cat_empleado();
                         $frm=$objFrmModificar ->fmr_buscar_empleado();
                         echo $frm;
                   break;
               case '4':
       
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id_NumEmpleado,vNombre,vRFC,eZonaPago,vCargo from sa_empleado  where vNombre like '%$_POST[txtBusqueda]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eZonaPago]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCargo]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_empleado($fila[Id_NumEmpleado]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :190, sortable :false, align: 'center'},
                                                            {display: 'Zona de pago', name : 'Zona de pago', width :160, sortable :false, align: 'center'},
                                                            {display: 'Cargo', name : 'Cargo', width :160, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 930,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                   break;
                   case '5':
                              $objFrmEditar = new cat_empleado();
                              $frm=$objFrmEditar->frm_editar_empleado($_POST[IdEmpleado]);
                              echo $frm;
                      break;
                  case '6':
                             $objActualizar = new cat_empleado();
                                $info->Empleado=$_POST[txtEmpleado];
                                $info->Rfc=$_POST[txtRFC];
                                $info->ZonaPago=$_POST[txtZona];
                                $info->Cargo=$_POST[txtCargo];
                                $info->Adscripcion=$_POST[txtadscripcion];
                                $info->Ubicacion=$_POST[txtUbicacion];
                                $info->Domicilio=$_POST[txtDomicilio];
                                $info->Id=$_POST[id];
                             $objActualizar->editar_empleado($info);
                             

                      break;
                  case '7':
                             $objBuscadorBorrar = new cat_empleado();
                            $frm= $objBuscadorBorrar->frm_buscador_borrar();
                            echo $frm;
                      break;
                  case '8':
                      
                            $objBuqueda = new cat_empleado();
                             $frm=$objBuqueda->buscar_borrar($_POST[txtEmpleado]);
                             echo $frm;
                      break;
                  case '9':
                             $objBorrar = new cat_empleado();
                             $objBorrar->borrar_empleado($_POST[id]);
                      break;
                  case '10':
                             $objBusqueda = new cat_empleado();
                             $frm=$objBusqueda->frm_consultar_empleado($_POST[txtEmpleado]);
                             echo $frm;
                      break;
                  case '11':
                             $objConsultar = new cat_empleado();
                             $frm=$objConsultar->consultar($_POST[txtEmpleado]);
                             echo $frm;
                      break;
                  
          }         
?>
