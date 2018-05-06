<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Factura.php");
    
     switch ($_GET[o])
          {
              case '0':
                          $objFrm = new Factura();
                          $frm=$objFrm->frm_factura();
                          echo $frm;
                  break;
               case '1':
                          $info->Patron=$_POST[txtPatron];
                          $info->Folio=$_POST[Folio];
                          $info->Licitacion=$_POST[Licitacion];
                          $info->Requisicion=$_POST[Requisicion];
                          $objBuscador = new Factura();
                          $frm=$objBuscador->Buscar_pedido($info);
                          echo $frm;
                   break;
                  case '2':
                            $info->IdProveedor=$_POST[cboProveedor];
                            $info->dFechaAlta=$_POST[txtFechaAlta];
                            $info->Id_Pedido=$_POST[txtPedido];
                            $info->mImporte=$_POST[txtImporte];
                            $info->cEstado=$_POST[txtEstado];
                            $info->Folio=$_POST[txtFolio];
                            $info->Clave=$_POST[txtClave];
                            $info->Factura = $_POST[txtFactura];
                            $objAdd = new Factura();
                            $objAdd->add_factura($info);
                      break;
                  case '3':
                            $objFrmBuscar =  new Factura();
                            $frm=$objFrmBuscar->fmr_buscar_factura();
                            echo $frm;
                      break;
                  case '4':
                                $info->Patron=$_POST[txtPatron];
                                $info->Folio=$_POST[Folio];
                                $info->Pedido=$_POST[Pedido];
                                $info->Remicion=$_POST[Remicion];
                                $objBuscar = new Factura();
                                $frm=$objBuscar->buscar($info);
                                echo $frm;
                      break;
                  case '5':
                             $objFromEdit = new Factura();
                             $frm=$objFromEdit->frm_editar_factura($_POST[id]);
                             echo $frm;
                      break;
                  case '6':
                            $info->IdProveedor=$_POST[cboProveedor];
                            $info->Id_Pedido=$_POST[txtPedido];
                            $info->mImporte=$_POST[txtImporte];
                            $info->cEstado=$_POST[txtEstado];
                            $info->vNoRemisionFactura=$_POST[txtFactura];
                            $info->Id=$_POST[txtId];
                            $objActualizar = new Factura();
                             $r=$objActualizar->guardar_cambios($info);
                            echo $r;
                      break;
                  case '7':
                             $objfrmBuscarBorrar = new Factura();
                             $frm=$objfrmBuscarBorrar->frm_buscar_borrar();
                             echo $frm;
                      break;
                  case '8':
                      
                             $info->Patron=$_POST[txtPatron];
                             $info->Folio=$_POST[Folio];
                             $info->Pedido=$_POST[Pedido];
                             $info->Remicion=$_POST[Remicion];
                             $objBuscarBorrar = new Factura();
                             $frm=$objBuscarBorrar->buscar_borrar($info);
                             echo $frm;
                      break;
                  case '9':
                              $objBorrar = new Factura();
                              $objBorrar->borrar_factura($_POST[id]);
                      break;
                  case '10':
                             $objFrmConsultar =  new Factura();
                             $frm=$objFrmConsultar->frm_buscar_consultar();
                             echo $frm;
                      break;
                  case '11':
                             $info->Patron=$_POST[txtPatron];
                             $info->Folio=$_POST[Folio];
                             $info->Pedido=$_POST[Pedido];
                             $info->Remicion=$_POST[Remicion];
                             $objBuscarBorrar = new Factura();
                             $frm=$objBuscarBorrar->consultar($info);
                             echo $frm;
                             
                      break;
                    case '12':
                        
                                $Select .="<select data-placeholder=\"Proveedor\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select' name='cboProveedor' id='cboProveedor'>";
                        
                                $objProveedor = new poolConnection();
                                $con=$objProveedor->Conexion();
                                $objProveedor->BaseDatos();
                                $sql="SELECT Id_Proveedor,vNombre FROM sa_proveedor order by vNombre";
                                $RSet=$objProveedor->Query($sql);
                                while($fila=  mysql_fetch_array($RSet))
                                {
                                    if($_POST[id]==$fila[Id_Proveedor])
                                    {
                                       $cboProveedor .= "<option value='$fila[Id_Proveedor]' Selected>$fila[vNombre]</option>"; 
                                    }
                                    else
                                        {
                                          $cboProveedor .= "<option value='$fila[Id_Proveedor]'>$fila[vNombre]</option>";   
                                        }
                                    
                                }
                                mysql_free_result($RSet);
                                $objProveedor->Cerrar($con);
                                $Select .="$cboProveedor </select><script>$(\".chzn-select\").chosen(); </script>";
                                echo $Select;

                        break;
         
         
          }
?>
