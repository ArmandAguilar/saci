<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_TipoBienInventariable.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormTipo = new Cat_TipoBienInventariable();
                          $frm=$objFormTipo->frm_add_tipobieninventarible();
                          echo $frm;
                   break;
               case '2':
                         $info->Clave=$_POST[txtClave];
                         $info->TBI=$_POST[txtTBI];
                         $objAdd= new Cat_TipoBienInventariable();
                         $objAdd->nuevo_tbi($info);
                   
                   break;
               case '3':
                         $objFormBuscador = new Cat_TipoBienInventariable();
                         $frm=$objFormBuscador->fmr_buscar_tbi();
                         echo $frm;
                   break;
               case '4':
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_TipoBien,vDescripcion from sa_tipobieninventariable where vDescripcion like '%$_POST[txtTBI]%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoBien]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_tbi($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
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
                            
                             $objFormEditar = new Cat_TipoBienInventariable();
                             $frm=$objFormEditar->frm_editar_tbi($_POST[IdTBI]);
                             echo $frm;
                       break;
                   case '6':
                              $info->Clave=$_POST[txtClave];
                              $info->TBI=$_POST[txtTBI];
                              $info->id=$_POST[id];
                              $objActualizar =  new Cat_TipoBienInventariable();
                              $objActualizar->editar_tbi($info);
                       
                       break;
                   case '7':
                             $objFrmBuscarBorrar = new Cat_TipoBienInventariable();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                       break;
                  case '8':
                            
                            $objBuscarBorrar = new Cat_TipoBienInventariable();
                            $frm=$objBuscarBorrar->buscar_borrar_tbi($_POST[txtTBI]);
                            echo $frm;
                       break;
                   case '9':
                             
                             $objBorrar = new Cat_TipoBienInventariable();
                             $frm=$objBorrar->borrar_tbi($_POST[id]);
                             echo $frm;
                       break;
                   case '10':
                              $objFmrConsultar = new Cat_TipoBienInventariable();
                              $frm =$objFmrConsultar->frm_consultar_tbi();
                              echo $frm;
                       break;
                   
                   case '11':
                              $objConsultar = new Cat_TipoBienInventariable();
                              $frm=$objConsultar->consultar($_POST[txtTBI]);
                              echo $frm;
                       break;
                 
          }
?>
