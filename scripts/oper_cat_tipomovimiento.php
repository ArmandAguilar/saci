<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_TipoMovimiento.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormTipo = new Cat_TipoMovimiento();
                          $frm=$objFormTipo->frm_add_tmov();
                          echo $frm;
                   break;
              case '2':
                  
                          $info->txtCodigo=$_POST[txtCodigo];
                          $info->txtdescripcion=$_POST[txtdescripcion];
                          $info->chkEntrada=$_POST[chkEntrada];
                          $info->chkBaja=$_POST[chkBaja];
                          $info->chkSalida=$_POST[chkSalida];
                          $info->cboTipo=$_POST[cboTipo];
                          $info->chkActivo=$_POST[chkActivo];
                          $objAdd= new Cat_TipoMovimiento();
                          $objAdd->nuevo_tmov($info);
                  break;
              case '3':
                         $objFormBuscador = new Cat_TipoMovimiento();
                         $frm=$objFormBuscador->fmr_buscar_tmov();
                         echo $frm;
                  break;
              case '4':
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="SELECT Id,Id_TipoMovimiento,vDescripcion,bEntrada,bBaja,cTipoAlmacen,bSalida,bEstadoMov FROM sa_tipomovimiento WHERE vDescripcion like  '%$_POST[Parametro]%' ";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoMovimiento]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEntrada]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bBaja]</td>      
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bSalida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEstadoMov]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_tmov($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Tipo Movimiento', name : 'Id Tipo Movimiento', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Entrada', name : 'Valor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Baja', name : 'Baja', width :200, sortable :false, align: 'center'},
                                                            {display: 'Salida', name : 'Salida', width :200, sortable :false, align: 'center'},
                                                            {display: 'Estado  de Movimiento', name : 'Estado  de Movimiento', width :200, sortable :false, align: 'center'},
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
                             $objFormEditar = new Cat_TipoMovimiento();
                             $frm=$objFormEditar->frm_editar_tmov($_POST[id]);
                             echo $frm;
                       break; 
               case '6':
                              $info->id=$_POST[id];
                              $info->txtCodigo=$_POST[txtCodigo];
                                $info->txtdescripcion=$_POST[txtdescripcion];
                                $info->chkEntrada=$_POST[chkEntrada];
                                $info->chkBaja=$_POST[chkBaja];
                                $info->chkSalida=$_POST[chkSalida];
                                $info->cboTipo=$_POST[cboTipo];
                                $info->chkActivo=$_POST[chkActivo];
                              $objActualizar =  new Cat_TipoMovimiento();
                              $r=$objActualizar->editar_tmov($info);
                              echo $r;
                              
                   break;
               case '7':
                              $objFrmBuscarBorrar =  new Cat_TipoMovimiento();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                   break;
               case '8':
                           $objBuscarBorrar = new Cat_TipoMovimiento();
                            $frm=$objBuscarBorrar->buscar_borrar_tmov($_POST[txtParametro]);
                            echo $frm;
                   
                   break;
               case '9':
                             
                             $objBorrar = new Cat_TipoMovimiento();
                             $frm=$objBorrar->borrar_tmov($_POST[id]);
                             echo $frm;
                       break;
               case '10':
                              $objFmrConsultar = new Cat_TipoMovimiento();
                              $frm =$objFmrConsultar->frm_consultar_tmov();
                              echo $frm;
                       break;
                   
                case '11':
                           $objConsultar = new Cat_TipoMovimiento();
                           $frm=$objConsultar->consultar($_POST[txtParametro]);
                           echo $frm;
                    break;    
          }   
?>
