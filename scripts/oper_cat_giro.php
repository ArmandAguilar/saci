<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_Giro.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormGiro = new Cat_Giro();
                          $frm=$objFormGiro->frm_add_empleado();
                          echo $frm;
                   break;
               case '2':
                         $info->Giro=$_POST[txtGiro];
                         $objAdd= new Cat_Giro();
                         $objAdd->nuevo_giro($info);
                   break;
               case '3':
                         $objFormGiroBuscador = new Cat_Giro();
                         $frm=$objFormGiroBuscador->fmr_buscar_giro();
                         echo $frm;
                   break;
               case '4':
                          $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id_Giro,vDescripcionGR from sa_giro where vDescripcionGR like '%$_POST[txtBusqueda]%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Giro]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionGR]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_giro($fila[Id_Giro]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Giro', name : 'Id Giro', width :90, sortable :false, align: 'center'},
                                                            {display: 'Giro', name : 'Giro', width :450, sortable :false, align: 'center'},
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
                             $objFormEditar = new Cat_Giro();
                             $frm=$objFormEditar->frm_editar_giro($_POST[IdGiro]);
                             echo $frm;
                       break;
                   case '6':
                              $info->Giro=$_POST[txtGiro];
                              $info->Id=$_POST[id];
                              $objActualizarGrio =  new Cat_Giro();
                              $objActualizarGrio->editar_giro($info);
                       
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_Giro();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;
                   case '8':
                            
                            $objBuscarBorrar = new Cat_Giro();
                            $frm=$objBuscarBorrar->buscar_borrar_giro($_POST[txtGiro]);
                            echo $frm;
                       break;
                   case '9':
                             
                             $objBorrar = new Cat_Giro();
                             $frm=$objBorrar->borrar_giro($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_Giro();
                              $frm =$objFmrConsultar->frm_consultar_giro();
                              echo $frm;
                       break;
                   
                   case '11':
                              $objConsultar = new Cat_Giro();
                              $frm=$objConsultar->consultar($_POST[txtGiro]);
                              echo $frm;
                       break;
         
           }
           
?>
