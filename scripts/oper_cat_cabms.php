<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_Cabms.php");

     switch ($_GET[o])
          {
                    case '1':
                             $objFrm = new Cat_Cabms();
                             $frm = $objFrm->frm_add_cabms();
                             echo $frm;
                        break;
                    case '2':
                              $objValidator = new Cat_Cabms();
                              $Clave = $_POST[cboTipo];
                              $Clave .= $_POST[txtCabms];
                              $valor=$objValidator->validando_cambs($Clave);
                              echo $valor;
                        
                        break;
                    case '3';
                                 $info->Tipo=$_POST[cboTipo];
                                 $info->Cabms=$_POST[txtCabms];
                                 $info->Descripcion=$_POST[txtDes];
                                 $info->Unidad=$_POST[cboUnidad];
                                 $info->Presupuestal=$_POST[txtPPresupuestal];
                               
                                  $objAdd= new Cat_Cabms();
                                  $objAdd->nuevo_Cabms($info);
                                 
                        break;
                    case '4':
                               $objFrmBuscador = new Cat_Cabms();
                               $frm=$objFrmBuscador->fmr_buscar_cabms(); 
                               echo $frm;
                        break;
                    case '5';
                             
                              $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id,Id_CABMS,Id_UMedida,vDescripcionCABMS,cTipoAlmacen,ePartidaPresupuestal from sa_cabms  where Id_CABMS like '%$_POST[txtCabms]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_cambs($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'CABMS', name : 'CABMS', width :150, sortable :false, align: 'center'},
                                                            {display: 'Uni.Medida', name : 'Uni.Medida', width :70, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :370, sortable :false, align: 'center'},
                                                            {display: 'Tipo', name: 'Tipo', width :120, sortable :false, align: 'center'},
                                                            {display: 'P.Presupuestal', name : 'P.Presupuestal', width :100, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 960,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                        
                        break;
                        case '6':
                                  $objFromEditar = new Cat_Cabms();
                                  $frm = $objFromEditar ->frm_editar_cambs($_POST[IdCambs]);
                                  echo $frm;
                            break;
                        case '7':
                                 $info->Tipo=$_POST[Tipo];
                                 $info->Cabms=$_POST[txtCabms];
                                 $info->Descripcion=$_POST[txtDes];
                                 $info->Unidad=$_POST[cboUnidad];
                                 $info->Presupuestal=$_POST[txtPPresupuestal];
                                 $info->Id=$_POST[Id];
                                 
                                 $objEditar = new Cat_Cabms();
                                 $r=$objEditar->editar_Cabms($info);
                                 echo $r;
                            break;
                        case '8':
                                    $objFrmBuscarBorrar = new Cat_Cabms();
                                    $frm=$objFrmBuscarBorrar->fmr_buscar_eliminar_cabms(); 
                                    echo $frm;
                            
                            break;
                        case '9':
                                  $objbuscarBorrar = new Cat_Cabms();
                                   $frm=$objbuscarBorrar->buscar_borrar($_POST[txtCabms]);
                                   echo $frm;
                            break;
                        case '10':
                                   $objBorrar = new Cat_Cabms();
                                   $objBorrar->borrar_cambs($_POST[id]);
                                   
                            break;
                        case '11':
                                    $objFrmCosnultar = new Cat_Cabms();
                                    $frm=$objFrmCosnultar->frm_consultar_cabms();
                                    echo $frm;
                            
                            break;
                        
                        case '12':
                                    $objConsular = new Cat_Cabms();
                                    $frm=$objConsular->consultar($_POST[txtCabms]);
                                    echo $frm;
                            break;
                        case '13':
                                        $objunidad = new poolConnection();
                                        $con=$objunidad->Conexion();
                                        $objunidad->BaseDatos();
                                        $sql="SELECT * FROM sa_umedida order by Id_UMedida";
                                        $RSet=$objunidad->Query($sql);
                                        while($fila=  mysql_fetch_array($RSet))
                                        {
                                            $cboUnidad .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
                                        }
                                        mysql_free_result($RSet);
                                        $objunidad->Cerrar($con);
                                    echo $cboUnidad;
                            break;
          }
     
?>
