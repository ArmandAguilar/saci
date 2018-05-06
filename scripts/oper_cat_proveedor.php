<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Cat_Proveedor.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objFormProveedor = new Cat_Proveedor();
                          $frm=$objFormProveedor->frm_add_proveedor();
                          echo $frm;
                   break;
               case '2':
                            $info->txtCodigo=$_POST[txtCodigo];
                            $info->txtProveedor=$_POST[txtProveedor];
                            $info->cboGiro=$_POST[cboGiro];
                            
                            $info->txtRespon=$_POST[txtRespon];
                            $info->txtCalle=$_POST[txtCalle];
                            $info->txtNumero=$_POST[txtNumero];
                            $info->txtColonia=$_POST[txtColonia];
                            $info->txtPoblacion=$_POST[txtPoblacion];
                            $info->txtCP=$_POST[txtCP];
                            $info->txtRFC=$_POST[txtRFC];
                            $info->txtPadron=$_POST[txtPadron];
                            $info->txtCedulaEmp=$_POST[txtCedulaEmp];
                            $info->txtCamaraCom=$_POST[txtCamaraCom];
                            $info->txtCanacintra=$_POST[txtCanacintra];
                            $info->txtCamaraRamo=$_POST[txtCamaraRamo];
                            $info->txtTelefono1=$_POST[txtTelefono1];
                            $info->txtTelefono2=$_POST[txtTelefono2];
                            $info->txtFax=$_POST[txtFax];
                            $info->txtNacionalidad=$_POST[txtNacionalidad];
                            
                            $objAdd= new Cat_Proveedor();
                            $r=$objAdd->nuevo_proveedor($info);
                            echo $r;
                   break;
               case '3':
                           $objFormGiroBuscador = new Cat_Proveedor();
                           $frm=$objFormGiroBuscador->fmr_buscar_proveedor();
                           echo $frm;
                   break;
               case '4':
                          $FliexGrid = "<br><br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_Proveedor,Id_Giro,vNombre,vResponsable,vCalle,vNumero,Colonia,vPoblacion,vCP,cRFC,cPadronFedProv,cCedulaEmpadr,cCamaraComercio,cCanacintra,cCamaraRamo,vTelefono1,vTelefono2,bNacional,vTelFax from sa_proveedor where vNombre like '%$_POST[txtProveedor]%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar_proveedor($fila[Id]);\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vResponsable]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCalle] - $fila[vNumero]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Colonia]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vPoblacion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cPadronFedProv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCedulaEmpadr]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCamaraComercio]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelefono1]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelFax]</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},
                                                            {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :200, sortable :false, align: 'center'},
                                                            {display: 'Calle', name : 'Calle', width :50, sortable :false, align: 'center'},
                                                            {display: 'Colonia', name : 'Colonia', width :200, sortable :false, align: 'center'},
                                                            {display: 'Poblacion', name : 'Poblacion', width :200, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :130, sortable :false, align: 'center'},
                                                            {display: 'Padron', name : '', width :200, sortable :false, align: 'center'},
                                                            {display: 'Cedula Emp.', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Camara', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Telefono', name : 'Telefono', width :100, sortable :false, align: 'center'},
                                                            {display: 'Fax', name : 'Fax', width :100, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 940,
                                            height: 400
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
                   break;
              case '5':
                        $objFormEditar = new Cat_Proveedor();
                       $frm=$objFormEditar->frm_editar_proveedor($_POST[IdProveedor]);
                       echo $frm;
                  break;
             case '6':
                        $info->txtCodigo=$_POST[txtCodigo];
                        $info->txtProveedor=$_POST[txtProveedor];
                        $info->cboGiro=$_POST[cboGiro];
                        $info->txtRespon=$_POST[txtRespon];
                        $info->txtCalle=$_POST[txtCalle];
                        $info->txtNumero=$_POST[txtNumero];
                        $info->txtColonia=$_POST[txtColonia];
                        $info->txtPoblacion=$_POST[txtPoblacion];
                        $info->txtCP=$_POST[txtCP];
                        $info->txtRFC=$_POST[txtRFC];
                        $info->txtPadron=$_POST[txtPadron];
                        $info->txtCedulaEmp=$_POST[txtCedulaEmp];
                        $info->txtCamaraCom=$_POST[txtCamaraCom];
                        $info->txtCanacintra=$_POST[txtCanacintra];
                        $info->txtCamaraRamo=$_POST[txtCamaraRamo];
                        $info->txtTelefono1=$_POST[txtTelefono1];
                        $info->txtTelefono2=$_POST[txtTelefono2];
                        $info->txtFax=$_POST[txtFax];
                        $info->txtNacionalidad=$_POST[txtNacionalidad];
                        $info->id=$_POST[id];
                        $objActualizarProveedor =  new Cat_Proveedor();
                        $r=$objActualizarProveedor->editar_proveedor($info);
                        echo $r;
                        
                 break;
             case '7':
                             $objFrmBuscarBorrar = new Cat_Proveedor();
                             $frm = $objFrmBuscarBorrar->frm_buscador_borrar();
                             echo $frm;
                 break;
             case '8':
                            
                            $objBuscarBorrar = new Cat_Proveedor();
                            $frm=$objBuscarBorrar->buscar_borrar_proveedor($_POST[txtProveedor]);
                            echo $frm;
                       break;
             case '9':
                             $objBorrar = new Cat_Proveedor();
                             $frm=$objBorrar->borrar_proveedor($_POST[id]);
                             echo $frm;
                 break;
             case '10':
                              $objFmrConsultar = new Cat_Proveedor();
                              $frm =$objFmrConsultar->frm_consultar_proveedor();
                              echo $frm;
                       break;
             case '11':
                              $objConsultar = new Cat_Proveedor();
                              $frm=$objConsultar->consultar($_POST[txtProveedor]);
                              echo $frm;
                       break;       
          }    
?>
