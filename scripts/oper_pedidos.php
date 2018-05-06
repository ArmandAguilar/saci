<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Pedidos.php");
    
     switch ($_GET[o])
          {
               case '1':
                          $objForm = new Pedidos();
                          $frm=$objForm->load_form();
                          echo $frm;
                   break;
               case '2':
                   
                            $info->Id_Proveedor=$_POST[cboProveedor];
                            $info->Id_UnidadAdmonDes=$_POST[cbouadmin];
                            $info->vNoRequisicion=$_POST[txtRequisicion];
                            $info->vNoLicitacion=$_POST[txtLicitacion];
                            $info->dFechaPedido=$_POST[txtFecha];
                            $info->cEstado=$_POST[txtEstatus];
                            $info->Folio =$_POST[txtFolio].'-'.$_POST[txtClave];
                            $objbjAdd = new Pedidos();
                            $r=$objbjAdd->nuevo_pedido($info);
                            echo $r;
                   break;
               case '3':
                   
                          $objCbo = new Pedidos();
                          $cbofrm= $objCbo->cboArt($_POST[id]);
                          echo $cbofrm;
                   break;
               case '4':
                          
                           
                            $info->Id_Pedido=$_POST[txtFolio];
                            $info->Id_Partida =$_POST[txtPartida];
                            $info->Id_CABMS=$_POST[cbocambs];
                            $info->Id_CveARTCABMS=$cboArtCambs;
                            $info->Id_UMedida=$_POST[cboUMedida];
                            $info->Id_CveInternaAC=$CveInternaAC;
                            $info->eCantidad=$_POST[txtCantidad];
                            $info->mPrecioUnitario=$_POST[txtPrecio];
                            $info->vCaracteristicas=$_POST[txtDescripcion];
                            $info->nIva=$_POST[txtIVA];
                            $info->nDescuento=$_POST[txtDescuento];
                            $info->cTipoAlmacen=$_POST[rdAlmacen];
                            
                            $objAddPartida = new Pedidos();
                            echo $r=$objAddPartida->agragar_detalle($info);
                            
                   break;
                   case '5';
                              $objGrid = new Pedidos();
                              $frm=$objGrid->load_grid($_POST[id]);
                              echo $frm;
                              
                       break;
                   case '6':
                             $objBorrar = new Pedidos();
                             $objBorrar->borrar_partida($_POST[id]);
                             
                             //borramos el considente en 
                              $objGridBorrarFechaEntr  = new Pedidos();
                              $objGridBorrarFechaEntr->borrar_fecha_entrega($_POST[idfechaentrega]);
                            
                             
                       break;
                   case '7':
                            $objGridFecha =  new Pedidos();
                            $frm=$objGridFecha->load_grid_fechaentrega($_POST[id]);
                             echo $frm;
                       break;
                   case '8':
                              $objGridBorrarFechaEntr  = new Pedidos();
                              $objGridBorrarFechaEntr->borrar_fecha_entrega($_POST[id]);
                              
                              //Borramos Pedido
                              
                              $objBorrar = new Pedidos();
                              $objBorrar->borrar_partida($_POST[idpartida]);
                              
                       break;
                   case '9':
                               $objfrmBuscarPedido = new Pedidos();
                               $frm = $objfrmBuscarPedido -> frm_buscar_editar();
                               echo $frm;
                       break;
                   case '10':
                                $info->Patron=$_POST[txtPatron];
                                $info->Folio=$_POST[Folio];
                                $info->Requisicion=$_POST[Requisicion];
                                $info->Licitacion=$_POST[Licitacion];
                               $objGridEditar = new Pedidos();
                               $frm=$objGridEditar->grid_buscar_editar($info);
                               echo  $frm;
                       break;
                   case '11':
                             $objFrmEditar = new Pedidos();
                             $frm=$objFrmEditar->frm_editar_pedido($_POST[id]);
                             echo $frm;
                       break;
                   case '12':
                                $info->Id_Proveedor=$_POST[cboProveedor];
                                $info->Id_UnidadAdmonDes=$_POST[cbouadmin];
                                $info->vNoRequisicion=$_POST[txtRequisicion];
                                $info->vNoLicitacion=$_POST[txtLicitacion];
                                $info->dFechaPedido=$_POST[txtFecha];
                                $info->cEstado=$_POST[txtEstatus]; 
                                $info->Folio = $_POST[txtFolio];
                                $info->eNumModificaciones= $_POST[noModificacion];
                                
                                $objActualizarPedido =  new Pedidos();
                                $frm=$objActualizarPedido->guardar_edicion_pedido($info);
                                echo $frm;
                                
                       break;
                   case '13':
                               $objFrmBuscarBorrar = new Pedidos();
                               $frm = $objFrmBuscarBorrar->frm_borrar_pedido();
                               echo $frm;
                       
                       break;
                   case '14':
                              $info->Patron=$_POST[txtPatron];
                                $info->Folio=$_POST[Folio];
                                $info->Requisicion=$_POST[Requisicion];
                                $info->Licitacion=$_POST[Licitacion];
                              $objBuscarEliminar =  new Pedidos();
                              $frm = $objBuscarEliminar->buscar_borrar_pedido($info);
                              echo $frm;
                       break;
                   case '15':
                              $objBorrar = new Pedidos();
                              $objBorrar->borrar_todo_pedido($_POST[id]);
                       
                       break;
                   case '16':
                                $objFrmConsultar = new Pedidos();
                                $frm=$objFrmConsultar->frm_buscar_consultar();
                                echo $frm;
                       break;
                   case '17':
                                $info->Patron=$_POST[txtPatron];
                                $info->Folio=$_POST[Folio];
                                $info->Requisicion=$_POST[Requisicion];
                                $info->Licitacion=$_POST[Licitacion];
                              $objBuscarConsultar =  new Pedidos();
                              $frm = $objBuscarConsultar->buscar_consultar_pedido($info);
                              echo $frm;
                       break;
                   case '18':
                              $objDetalle = new Pedidos();
                              $frm=$objDetalle ->detalle($_POST[id]);
                              echo $frm;
                       break;
                   case '19':
                             $objGrid = new Pedidos();
                              $frm=$objGrid->grid_pedido($_POST[id]);
                              echo $frm;
                       break;
                   case '20':
                             $objGridFecha =  new Pedidos();
                            $frm=$objGridFecha->grid_fechaentrega($_POST[id]);
                             echo $frm;
                       break;
                   case '21':
   								$objDetalle = new Pedidos();
   								echo $objDetalle->detalle($_POST[id]);
                   	break;
          }
?>
