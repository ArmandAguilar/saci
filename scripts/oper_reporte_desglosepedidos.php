<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_DesglosePedido.php");
    $obj = new Reporte_DesglosePedido();
     switch ($_GET[o]) {
        case '1':
                    $info->Patron=$_POST[txtPatron];
                    $info->Folio=$_POST[Folio];
                    $info->Licitacion=$_POST[Licitacion];
                    $info->Requisicion=$_POST[Requisicion];
                    $frm=$obj->buscar_pedidoInicial($info);  
                    echo $frm;
            break;
        case '2':
                    $info->Patron=$_POST[txtPatron];
                    $info->Folio=$_POST[Folio];
                    $info->Licitacion=$_POST[Licitacion];
                    $info->Requisicion=$_POST[Requisicion];
                    $frm=$obj->buscar_pedidoFinal($info);  
                    echo $frm;
            break;
        case '3':
            
                    $where .=" ";
                   if(!empty($_GET[v1]))
                    {
                       $where .=" sa_detallepedido.cTipoAlmacen='$_GET[v1]' and";   
                    } 
                    if(!empty($_GET[v4]) && !empty($_GET[v5]))
                    {
                        $where .=" sa_detallepedido.Id_Pedido>='$_GET[v4]' and sa_detallepedido.Id_Pedido<='$_GET[v5]' and "; 
                    }
                    else
                    {
                        if(!empty($_GET[v4]))
                        {
                           $where .=" sa_detallepedido.Id_Pedido='$_GET[v4]' and "; 
                        }
                        else
                            {
                               if(!empty($_GET[v5]))
                               {
                                 $where .=" sa_detallepedido.Id_Pedido='$_GET[v5]' and ";   
                               }
                            
                            }
                    }
                    
                    if(!empty($_GET[v2]) && !empty($_GET[v3]))
                    {
                        $where .=" sa_detallepedido.dFechaRegistro>='$_GET[v2]' and sa_detallepedido.dFechaRegistro<='$_GET[v3]' and "; 
                    } 
                   else{
                       if(!empty($_GET[v2]))
                       {
                           $where .=" sa_detallepedido.dFechaRegistro='$_GET[v2]' and ";
                       }
                       else
                       {
                           if(!empty($_GET[v3]))
                           {
                              $where .=" sa_detallepedido.dFechaRegistro='$_GET[v3]' and "; 
                           }
                       }
                   }
                   $whereFinal = substr($where, 0, -4);
                    
                   
                    $page = $_GET['page']; // get the requested page
                    $limit = $_GET['rows']; // get how many rows we want to have into the grid
                    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
                    $sord = $_GET['sord']; // get the direction
                    
                            $objG = new poolConnection();
                            $objG -> Conexion();
                            $objG -> BaseDatos();
                            if(!$sidx) $sidx =1;

                            
                            $sqlcount="SELECT 
                                              COUNT(*) as count
                                                From
                                            sa_pedido,
                                        sa_detallepedido,
                                        sa_unidadadmva,
                                        sa_proveedor,
                                        sa_umedida
                                        
                                        where
                                        $whereFinal and
                                        sa_detallepedido.Id_Pedido = sa_pedido.Id_Pedido and 
                                        sa_unidadadmva.Id_Unidad =sa_pedido.Id_UnidadAdmonDes and
                                        sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor  and
                                        sa_detallepedido.Id_UMedida=sa_umedida.Id_UMedida";
                            
                           
                            $ResultadoTotal = $objG->Query($sqlcount);
                            $row = mysql_fetch_array($ResultadoTotal);
                            $count = $row['count'];

                            if( $count > 0 ) {
                                    $total_pages = ceil($count/$limit);
                            } else {
                                    $total_pages = 0;
                            }
                            if ($page > $total_pages) $page=$total_pages;
                            $start = $limit*$page - $limit; // do not put $limit*($page - 1)
                    
                            if ($limit==0) 
                                {
                                  $limit=20;
                                }
                        $StrConsulta="SELECT 
                                        sa_detallepedido.Id_Pedido As Pedido,
                                        sa_pedido.dFechaPedido As FechaRegistro,
                                        sa_pedido.vNoLicitacion As Licitacion,
                                        sa_proveedor.vNombre As Proveedor,
                                        sa_unidadadmva.vDescripcion As AreaSolicitante,
                                        sa_detallepedido.vCaracteristicas As Descripcion,
                                        sa_detallepedido.mPrecioUnitario As PrecioUnitario,
                                        (sa_detallepedido.nIva + sa_detallepedido.mPrecioUnitario) As PrecioConIva,
                                        sa_detallepedido.eCantidad As Cantidad,
                                        sa_umedida.VDescripcion As Unidad

                                        FROM 
                                        sa_pedido,
                                        sa_detallepedido,
                                        sa_unidadadmva,
                                        sa_proveedor,
                                        sa_umedida
                                        where
                                         $whereFinal  and
                                        sa_detallepedido.Id_Pedido = sa_pedido.Id_Pedido and 
                                        sa_unidadadmva.Id_Unidad =sa_pedido.Id_UnidadAdmonDes and
                                        sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor  and
                                        sa_detallepedido.Id_UMedida=sa_umedida.Id_UMedida  Limit " . $start . ',' . $limit;
                            $objG2 = new poolConnection();
                            $objG2 ->BaseDatos();
                            $RSet = $objG2->Query($StrConsulta);
                            $Respuesta->page = $page;
                            $Respuesta->total = $total_pages;
                            $Respuesta->records = $count;
                            $Contador = 0;
                            while ($rowT = mysql_fetch_array($RSet)){
                                
                                $Respuesta->rows[$Contador]["Pedido"] = $rowT["Pedido"];
                                $Respuesta->rows[$Contador]["cell"] = array($rowT["FechaRegistro"],
                                                                            $rowT["Licitacion"],
                                                                            $rowT["Proveedor"],
                                                                            $rowT["AreaSolicitante"],
                                                                            $rowT["Descripcion"],
                                                                            $rowT["PrecioUnitario"],
                                                                            $rowT["PrecioConIva"],
                                                                            $rowT["Cantidad"],
                                                                            $rowT["Unidad"]);
                                $Contador++;
                            }
                            echo json_encode($Respuesta);
                        
            break;
     }
?>
