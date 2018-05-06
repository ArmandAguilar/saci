<?php
    ini_set('session.auto_start','on');
    session_start();  
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Procesos_OtrosConceptos.php");

    $obj = new OtrosConceptos();
     switch ($_GET[o])
          {
               case '1':
                           $idsession=session_id();
                           echo $obj->frm_alta($idsession);
                   break;
               case '2':
                           $info->Patron=$_POST[txtPatron];
                           $info->Clave=$_POST[Clave];
                           $info->Descripcion=$_POST[Descripcion];
                           
                           echo $obj->buscarArt($info);
                   break;
               case '3':
                   
                          
                          $info->Id_CABMS=$_POST[Id_CABMS];
                          $info->Descripcion=$_POST[Descripcion];
                          $info->UnidadMedida=$_POST[UnidadMedida];
                          $info->RemFac=$_POST[RemFac];
                          $info->CostoPromedio=$_POST[CostoPromedio];
                          $info->Cantidad=$_POST[Cantidad];
                          $info->IdUMedida = $_POST[IdUMedida];
                          $info->Session=$_POST[Session];
                          echo  $obj->add_grid($info);
                   break;
               case '4':
                         $idsession=session_id();
                         echo $obj->grid($idsession);
                   break;
               case '5':
                          
                          $obj->borrar_elemento($_POST[id]);
                   break;
               case '6':
                   
                            #Preparamos ware
                            if($_POST[Clave]=="Si")
                            {
                                $where.="Id_UMedida like '%$_POST[txtPatron]%' or "; 
                            }

                            if($_POST[Descripcion]=="Si")
                            {
                                $where.="vDescripcion like '%$_POST[txtPatron]%' or "; 
                            }
                            $where = substr($where, 0, -3);
                            
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                   
                            $objBuscar = new poolConnection();
                            $con=$objBuscar->Conexion();
                            $objBuscar->BaseDatos();
                            $sql="Select Id_UMedida,vDescripcion from sa_umedida where $where";
                            $RSet=$objBuscar->Query($sql);
                            while($fila=  mysql_fetch_array($RSet))
                            {
                                $i++;
                                $FliexGrid.="
                                                  <tr>
                                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageUMedida$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageUMedida$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageUMedida$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"aceptar_unidad($fila[Id_UMedida],'$fila[vDescripcion]');\">&nbsp;</td>
                                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                  </tr>
                                              ";
                            }
                            mysql_free_result($RSet);
                            $objBuscar->Cerrar($con);
                            $FliexGrid.="       </tbody>
                                                                          </table><script>$('.flexme1').flexigrid({
                                              title: '',
                                              colModel : [
                                                              {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},
                                                              {display: 'Clave', name : 'Id U. Medida', width :90, sortable :false, align: 'center'},
                                                              {display: 'Descripcion', name : 'Unidada de Medida', width :450, sortable :false, align: 'center'}
                                                             

                                                          ],
                                              buttons : [
                                                              {name: '',onpress:saver_Order},
                                                              {separator: true}
                                                          ],
                                              width: 730,
                                              height: 200
                                              }

                                              );</script></form>";
                            echo $FliexGrid;
                   
                   break;
               
          }    
?>
