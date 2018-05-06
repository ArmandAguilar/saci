<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Usuarios.php");
     switch ($_GET[o])
          {
                case '1':
                             $objUser = new Usuarios();
                             $info -> IdEmpleado =$_POST[idempleado];
                             $info -> Nombres = $_POST[nombres];
                             $info -> Usuario = $_POST[usuario];
                             $info -> Password = $_POST[password]; 
                             $info -> Squema=$table_schema;
                             $R=$objUser->add_usuario($info);
                             echo $R;
                        break;
                case '2':
                           
                            $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                                $objGrid = new poolConnection;
                                $con=$objGrid->Conexion();
                                $objGrid->BaseDatos($con);
                                $sql="Select * from sa_usuarios where Usuario!='Root' order by Id asc";
                                $RSet=$objGrid->Query($con,$sql);
                                $i=0;
                                while($row=mysqli_fetch_array($RSet))
                                {
                                    $i++;

                                    $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblidempleado$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblidempleado$i').hide();\$('#idemp$i').show();\">$row[IdEmpleado]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"idemp$i\" name=\"idemp[$i]\" value=\"$row[IdEmpleado]\"><input type=\"hidden\" name=\"txtid[$i]\" value=\"$row[Id]\"></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblnombres$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblnombres$i').hide();\$('#nom$i').show();\">$row[Nombres]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"nom$i\" name=\"nom[$i]\" value=\"$row[Nombres]\"></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblusuario$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblusuario$i').hide();\$('#usuario$i').show();\">$row[Usuario]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"usuario$i\" name=\"usuario[$i]\" value=\"$row[Usuario]\"></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblpassword$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblpassword$i').hide();\$('#pass$i').show();\">*********</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"pass$i\" name=\"pass[$i]\" value=\"\"></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/borrar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/borrar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"del_user($row[Id]);\"> &nbsp;</td>
                                                </tr>
                                            ";
                                }
                                $objGrid->Cerrar($con,$RSet);
                                $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'IdEmpleado', name : 'IdEmpleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Nombre', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                            {display: 'Usuario', name : 'Usuario', width :190, sortable :false, align: 'center'},
                                                            {display: 'Contraseña', name : 'Contraseña', width :160, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 900,
                                            height: 100
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                                echo $FliexGrid;
                    
                    
                       break;
                    case '3';
                        
                              $sql="Delete from sa_usuarios where Id='$_POST[id]'";
                              $objDel = new poolConnection();
                              $con=$objDel->Conexion();
                              $objDel->BaseDatos($con);
                              $R=$objDel->Query($con,$sql);
                              $objDel->Cerrar($con,$R);
                              echo $sql;
                        break;
                    case '4':
                              $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                                $objGrid = new poolConnection;
                                $con=$objGrid->Conexion();
                                $objGrid->BaseDatos($con);
                                $sql="Select * from sa_usuarios where Usuario!='Root' order by Id asc";
                                $RSet=$objGrid->Query($con,$sql);
                                $i=0;
                                while($row=mysqli_fetch_array($RSet))
                                {
                                    $i++;
                                    if ($row[Habilitado]=="YES")
                                      {
                                        $chk="checked";
                                      }
                                        
                                    $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblidempleado$i' >$row[IdEmpleado]</span><input type=\"hidden\" name=\"txtid[$i]\" value=\"$row[Id]\"></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblnombres$i'>$row[Nombres]</span></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblusuario$i'>$row[Usuario]</span></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='OnOff[$i]' id='OnOff[$i]' value='YES' $chk/></td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;
                                                       
                                                       
                                                       &nbsp;&nbsp;<img src=\"../../../interfaz/catalogos.png\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\"  style=\"cursor:pointer\" onclick=\"showCatalogo_menu($row[Id])\">
                                                       &nbsp;&nbsp;<img src=\"../../../interfaz/procesos.png\"  name=\"ImageB$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB$i\"  style=\"cursor:pointer\" onclick=\"showCatalogo_procesos($row[Id])\">
                                                       &nbsp;&nbsp;<img src=\"../../../interfaz/reportes.png\"  name=\"ImageC$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageC$i\"  style=\"cursor:pointer\" onclick=\"showCatalogo_reportes($row[Id])\">&nbsp;&nbsp;



                                                    </td>
                                                </tr>
                                            ";
                                    $chk="";
                                }
                                $objGrid->Cerrar($con,$RSet);
                                $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'IdEmpleado', name : 'IdEmpleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Nombre', name : 'Nombre', width :260, sortable :false, align: 'center'},
                                                            {display: 'Usuario', name : 'Usuario', width :190, sortable :false, align: 'center'},
                                                            {display: 'Habilitar', name : 'Habilitar', width :80, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :400, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 900,
                                            height: 100
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridHabilitar\" value=\"Si\"></form>";
                                echo $FliexGrid;
                        
                        break;
                       case '5':
                              $Empleadochk=""; 
                                $Cabmschk="";
                                $Cabms_Consumiblechk="";
                                $Girochk="";
                                $UnidadMemoriachk="";
                                $Proveedoreschk="";
                                $UnidadAdministrativachk="";
                                $TipoMovimientochk="";
                                $Parametrochk="";
                                $EstadoBienchk="";
                                $TipoBienInventariablechk="";
                                $FactoresPronosticochk="";
                              $FliexGrid = "<form action='' name='frmOrderGridProcesos' method='post'><table class=\"flexme1\">
                                            <tbody>";
                                $objGrid = new poolConnection;
                                $con=$objGrid->Conexion();
                                $objGrid->BaseDatos($con);
                                $sql="Select * from sa_menu_catalogos where IdUsuario='$_POST[id]'";
                                $RSet=$objGrid->Query($con,$sql);
                                $i=0;
                                while($row=mysqli_fetch_array($RSet))
                                {
                                    
                                        $Empleado=$row[Empleado];
                                        $Cabms=$row[Cabms];
                                        $Cabms_Consumible=$row[Cabms_Consumible];
                                        $Giro=$row[Giro];
                                        $UnidadMemoria=$row[UnidadMemoria];
                                        $Proveedores=$row[Proveedores];
                                        $UnidadAdministrativa=$row[UnidadAdministrativa];
                                        $TipoMovimiento=$row[TipoMovimiento];
                                        $Parametro=$row[Parametro];
                                        $EstadoBien=$row[EstadoBien];
                                        $TipoBienInventariable=$row[TipoBienInventariable];
                                        $FactoresPronostico=$row[FactoresPronostico];
                                    
                                }
                                $objGrid->Cerrar($con,$RSet);
                                
                                
                                if($Empleado=="YES")
                                {
                                   $Empleadochk="checked"; 
                                }
                                if($Cabms=="YES")
                                 {
                                   $Cabmschk="checked";
                                }
                                if($Cabms_Consumible=="YES")
                                 {
                                    $Cabms_Consumiblechk="checked";
                                 }
                                if($Giro=="YES")
                                  {
                                     $Girochk="checked";
                                  }
                                if($UnidadMemoria=="YES")
                                  {
                                    $UnidadMemoriachk="checked";
                                  }
                                if($Proveedores=="YES")
                                  {
                                    $Proveedoreschk="checked";
                                  }
                                if($UnidadAdministrativa=="YES")
                                  {
                                    $UnidadAdministrativachk="checked";
                                  }
                                if($TipoMovimiento=="YES")
                                  {
                                    $TipoMovimientochk="checked";
                                  }
                                if($Parametro=="YES")
                                  {
                                    $Parametrochk="checked";
                                  }
                                if($EstadoBien=="YES")
                                  {
                                    $EstadoBienchk="checked";
                                  }
                                if($TipoBienInventariable=="YES")
                                  {
                                      $TipoBienInventariablechk="checked";
                                  }
                                if($FactoresPronostico=="YES")
                                  {
                                    $FactoresPronosticochk="checked";
                                 }
                                
                                $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Empleado</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Empleado' id='Empleado' value='YES' $Empleadochk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">CABMS</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Cabms' id='Cabms' value='YES' $Cabmschk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">CABMS Consumible</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Cabms_Consumible' id='OnOff[3]' value='YES' $Cabms_Consumiblechk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Giro</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Giro' id='Giro' value='YES'  $Girochk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Unidad de medida</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='UnidadMemoria' id='UnidadMemoria' value='YES'$UnidadMemoriachk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Proveedor</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Proveedores' id='Proveedores' value='YES' $Proveedoreschk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Unidada Administrativa</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='UnidadAdministrativa' id='UnidadAdministrativa' value='YES' $UnidadAdministrativachk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Tipo de Movimiento</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='TipoMovimiento' id='TipoMovimiento' value='YES' $TipoMovimientochk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Parametro</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Parametro' id='Parametro' value='YES' $Parametrochk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Estado del Bien</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='EstadoBien' id='EstadoBien' value='YES' $EstadoBienchk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Tipo de Bien Inventariable</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='TipoBienInventariable' id='TipoBienInventariable' value='YES' $TipoBienInventariablechk/></td>
                                                </tr>
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Factores de Pronóstico</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='FactoresPronostico' id='FactoresPronostico' value='YES' $FactoresPronosticochk/></td>
                                                </tr>
                                            ";
                                $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Modulo', name : 'Modulo', width :90, sortable :false, align: 'center'},
                                                            {display: 'Habilitar', name : 'Habilitar', width :90, sortable :false, align: 'center'},
                                                            
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order_procesos},
                                                            {separator: true}
                                                        ],
                                            width: 200,
                                            height: 390
                                            }

                                            );</script><input type='hidden' name='txtIdAcualizar' id='txtIdAcualizar' value='$_POST[id]'><input type=\"hidden\"  name=\"ActGridMenuCatalogo\" value=\"Si\"></form>";
                                echo $FliexGrid;
                        
                        break;  
                        case '6':
                            
                                            $Procesoschk="";
                                            $Pedidoschk="";
                                            $Consumibleschk="";
                                            $Consumibles_Entradaschk="";
                                            $Consumibles_Salidaschk="";
                                            $Invetaribaleschk="";
                                            $FliexGrid = "<form action='' name='frmOrderGridProcesos' method='post'><table class=\"flexme1\">
                                                    <tbody>";
                                                $objGrid = new poolConnection;
                                                $con=$objGrid->Conexion();
                                                $objGrid->BaseDatos($con);
                                                $sql="Select * from sa_menu_procesos where IdUsuario='$_POST[id]'";
                                                $RSet=$objGrid->Query($con,$sql);
                                                $i=0;
                                                while($row=mysqli_fetch_array($RSet))
                                                {
                                                            $Procesos=$row[Procesos];
                                                            $Pedidos=$row[Pedidos];
                                                            $Consumibles=$row[Consumibles];
                                                            $Consumibles_Entradas=$row[Consumibles_Entradas];
                                                            $Consumibles_Salidas=$row[Consumibles_Salidas];
                                                            $Invetaribales=$row[Invetaribales];
                                                }
                                                $objGrid->Cerrar($con,$RSet);
                                                if ($Procesos=="YES")
                                                    {
                                                        $Procesoschk="checked";
                                                    }
                                                if ($Pedidos=="YES")
                                                    {
                                                        $Pedidoschk="checked";
                                                    }
                                                if ($Consumibles=="YES")
                                                    {
                                                        $Consumibleschk="checked";
                                                    }    
                                                if ($Consumibles_Entradas=="YES")
                                                    {
                                                        $Consumibles_Entradaschk="checked";
                                                    }
                                                if ($Consumibles_Salidas=="YES")
                                                    {
                                                        $Consumibles_Salidaschk="checked";
                                                    }
                                                if ($Invetaribales=="YES")
                                                    {
                                                        $Invetaribaleschk="checked";
                                                    }    
                                                $FliexGrid.="
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Procesos</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Procesos' id='Procesos' value='YES' $Procesoschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Pedidos</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Pedidos' id='Pedidos' value='YES' $Pedidoschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Consumibles</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Consumibles' id='Consumibles' value='YES' $Consumibleschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Consumibles/Entradas</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Consumibles_Entradas' id='Consumibles_Entradas' value='YES' $Consumibles_Entradaschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Consumibles/Salidas</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Consumibles_Salidas' id='Consumibles_Salidas' value='YES' $Consumibles_Salidaschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Inventarible</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Inventariable' id='Inventariable' value='YES' $Invetaribaleschk/></td>
                                                                </tr>";
                                                
                                                $FliexGrid.="       </tbody>
                                                                                        </table><script>$('.flexme1').flexigrid({
                                                            title: '',
                                                            colModel : [
                                                                            {display: 'Modulo', name : 'Modulo', width :190, sortable :false, align: 'center'},
                                                                            {display: 'Habilitar', name : 'Habilitar', width :90, sortable :false, align: 'center'},



                                                                        ],
                                                            buttons : [
                                                                            {name: '',onpress:saver_Order_procesos},
                                                                            {separator: true}
                                                                        ],
                                                            width: 300,
                                                            height: 290
                                                            }

                                                            );</script><input type='hidden' name='IdActualizarProceso' id='IdActualizarProceso'  value='$_POST[id]'/><input type=\"hidden\"  name=\"ActGridMenuProceso\" value=\"Si\"></form>";
                                                echo $FliexGrid;
                            break;
                            case '7':
                            
                                            $Reporteschk="";
                                            $Pedidoschk="";
                                            $Consumibleschk="";
                                            $Invetaribaleschk="";
                                            $FliexGrid = "<form action='' name='frmOrderGridProcesos' method='post'><table class=\"flexme1\">
                                                    <tbody>";
                                                $objGrid = new poolConnection;
                                                $con=$objGrid->Conexion();
                                                $objGrid->BaseDatos($con);
                                                $sql="Select * from sa_menu_reportes where IdUsuario='$_POST[id]'";
                                                $RSet=$objGrid->Query($sql);
                                                $i=0;
                                                while($row=mysqli_fetch_array($RSet))
                                                {
                                                            $Reportes=$row[Reportes];
                                                            $Pedidos=$row[Pedidos];
                                                            $Consumibles=$row[Consumibles];
                                                            $Inventarios=$row[Inventarios];


                                                }
                                                $objGrid->Cerrar($con,$RSet);
                                                if ($Reportes=="YES")
                                                    {
                                                        $Reporteschk="checked";
                                                    }
                                                if ($Pedidos=="YES")
                                                    {
                                                        $Pedidoschk="checked";
                                                    }
                                                if ($Consumibles=="YES")
                                                    {
                                                        $Consumibleschk="checked";
                                                    }    
                                                
                                                if ($Inventarios=="YES")
                                                    {
                                                        $Inventarioschk="checked";
                                                    }    
                                                $FliexGrid.="
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Reportes</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Reportes' id='Reportes' value='YES' $Reporteschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Pedidos</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Pedidos' id='Pedidos' value='YES' $Pedidoschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Consumibles</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Consumibles' id='Consumibles' value='YES' $Consumibleschk/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Inventarios</td>
                                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type='checkbox' name='Inventarios' id='Inventarios' value='YES' $Inventarioschk/></td>
                                                                </tr>";
                                                
                                                $FliexGrid.="       </tbody>
                                                                                        </table><script>$('.flexme1').flexigrid({
                                                            title: '',
                                                            colModel : [
                                                                            {display: 'Modulo', name : 'Modulo', width :190, sortable :false, align: 'center'},
                                                                            {display: 'Habilitar', name : 'Habilitar', width :90, sortable :false, align: 'center'},



                                                                        ],
                                                            buttons : [
                                                                            {name: '',onpress:saver_Order},
                                                                            {separator: true}
                                                                        ],
                                                            width: 300,
                                                            height: 290
                                                            }

                                                            );</script><input type='hidden' name='IdActualizarReportes' id='IdActualizarReportes'  value='$_POST[id]'/><input type=\"hidden\"  name=\"ActGridMenuReportes\" value=\"Si\"></form>";
                                                echo $FliexGrid;
                            break;
                            
                default:
                    break;
         }


?>
