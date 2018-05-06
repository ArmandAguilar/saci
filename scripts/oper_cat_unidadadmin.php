<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_UnidadAdmin.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objForm = new Cat_UnidadAdmin();
                          $frm=$objForm->frm_add_ua();
                          echo $frm;
                   break;
              case '2':
                            
                            $info->txtCodigo=$_POST[txtCodigo];
                            $info->txtUA=$_POST[txtUA];
                            $info->cboEmpleado=$_POST[cboEmpleado];
                            $info->cboZona=$_POST[cboZona];
                            $info->txtCalle=$_POST[txtCalle];
                            $info->txtNumero=$_POST[txtNumero];
                            $info->txtColonia=$_POST[txtColonia];
                            $info->txtPoblacion=$_POST[txtPoblacion];
                            $info->txtCP=$_POST[txtCP];
                            $info->txtTelefono1=$_POST[txtTelefono1];
                            $info->txtFax=$_POST[txtFax];
                            $info->txtPrioridad=$_POST[txtPrioridad];
                            $info->chkAreaActiva=$_POST[chkAreaActiva];
                            $info->txtNoFolio=$_POST[txtNoFolio];
                            $info->txtUEjecutora=$_POST[txtUEjecutora];
                            $info->txtEmpleados=$_POST[txtEmpleados];
                            $objAdd= new Cat_UnidadAdmin();
                            $r=$objAdd->nuevo_ua($info);
                            echo $r;
                   break;
               case '3':
                           $objFormBuscador = new Cat_UnidadAdmin();
                           $frm=$objFormBuscador->fmr_buscar_ua();
                           echo $frm;
                   break;
               case '4':
                                 $FliexGrid = "<br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="SELECT Id,Id_Unidad,Id_ResponsableArea,Id_Zonas,vDescripcion From sa_unidadadmva where vDescripcion like  '%$_POST[txt]%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila = mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ResponsableArea]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Zonas]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar($fila[Id]);\">&nbsp;</td>    
                                                    
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            
                                                            
                                                            {display: 'Codigo', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :150, sortable :false, align: 'center'},
                                                            {display: 'Zona', name : 'Colonia', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcions', name : 'Poblacion', width :300, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 840,
                                            height: 350
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                   break;
                  case '5':
                        $objFormEditar = new Cat_UnidadAdmin();
                        $frm=$objFormEditar->frm_editar_ua($_POST[Id]);
                       echo $frm;
                  break; 
                   case '6':
                             $info->txtCodigo=$_POST[txtCodigo];
                            $info->txtUA=$_POST[txtUA];
                            $info->cboEmpleado=$_POST[cboEmpleado];
                            $info->cboZona=$_POST[cboZona];
                            $info->txtCalle=$_POST[txtCalle];
                            $info->txtNumero=$_POST[txtNumero];
                            $info->txtColonia=$_POST[txtColonia];
                            $info->txtPoblacion=$_POST[txtPoblacion];
                            $info->txtCP=$_POST[txtCP];
                            $info->txtTelefono1=$_POST[txtTelefono1];
                            $info->txtFax=$_POST[txtFax];
                            $info->txtPrioridad=$_POST[txtPrioridad];
                            $info->chkAreaActiva=$_POST[chkAreaActiva];
                            $info->txtNoFolio=$_POST[txtNoFolio];
                            $info->txtUEjecutora=$_POST[txtUEjecutora];
                            $info->txtEmpleados=$_POST[txtEmpleados]; 
                            $info->Id=$_POST[id];
                            $objActualizarProveedor =  new Cat_UnidadAdmin();
                             $r=$objActualizarProveedor->editar_ua($info);
                        echo $r;
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_UnidadAdmin();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                 break;
                  case '8':
                            
                            $objBuscarBorrar = new Cat_UnidadAdmin();
                            $frm=$objBuscarBorrar->buscar_borrar_ua($_POST[txt]);
                            echo $frm;
                       break;
                   case '9':
                             $objBorrar = new Cat_UnidadAdmin();
                             $frm=$objBorrar->borrar_ua($_POST[id]);
                             echo $frm;
                  break;
              case '10':
                              $objFmrConsultar = new Cat_UnidadAdmin();
                              $frm =$objFmrConsultar->frm_consultar_ua();
                              echo $frm;
                       break;
             case '11':
                              $objConsultar = new Cat_UnidadAdmin();
                              $frm=$objConsultar->consultar($_POST[txt]);
                              echo $frm;
                       break;
          }     
?>
