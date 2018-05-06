<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Pedidos.php");
    $obj = new Reporte_Pedidos();
     switch ($_GET[o]) {
        case '1':
                    $info->Patron=$_POST[txtPatron];
                    $info->Folio=$_POST[Folio];
                    $info->Licitacion=$_POST[Licitacion];
                    $info->Requisicion=$_POST[Requisicion];
                    echo $obj->buscar_pedidoInicial($info);  
                    
            break;
        case '2':
                    $info->Patron=$_POST[txtPatron];
                    $info->Folio=$_POST[Folio];
                    $info->Licitacion=$_POST[Licitacion];
                    $info->Requisicion=$_POST[Requisicion];
                    echo $obj->buscar_pedidoFinal($info);  
                    
            break;
        case '3':
            
                    $where .=" ";
                  
                    if(!empty($_GET[v4]) && !empty($_GET[v5]))
                    {
                        $where .=" sa_pedido.Id_Pedido>='$_GET[v4]' and sa_pedido.Id_Pedido<='$_GET[v5]' and "; 
                    }
                    else
                    {
                        if(!empty($_GET[v4]))
                        {
                           $where .=" sa_pedido.Id_Pedido='$_GET[v4]' and "; 
                        }
                        else
                            {
                               if(!empty($_GET[v5]))
                               {
                                 $where .=" sa_pedido.Id_Pedido='$_GET[v5]' and ";   
                               }
                            
                            }
                    }
                    
                    if(!empty($_GET[v2]) && !empty($_GET[v3]))
                    {
                        $where .=" sa_pedido.dFechaPedido>='$_GET[v2]' and sa_pedido.dFechaPedido>='$_GET[v3]' and "; 
                    } 
                   else{
                       if(!empty($_GET[v2]))
                       {
                           $where .=" sa_pedido.dFechaPedido='$_GET[v2]' and ";
                       }
                       else
                       {
                           if(!empty($_GET[v3]))
                           {
                              $where .=" sa_pedido.dFechaPedido='$_GET[v3]' and "; 
                           }
                       }
                   }
                   $whereFinal = substr($where, 0, -4);
                    
                    $page = $_GET['page']; // get the requested page
                    $limit = $_GET['rows']; // get how many rows we want to have into the grid
                    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
                    $sord = $_GET['sord']; // get the direction

                            $objG = new poolConnection();
                            $con=$objG -> Conexion();
                            $objG -> BaseDatos();
                            if(!$sidx) $sidx =1;

                            $StrConsulta = "Select COUNT(*) AS count
                                            From 
                                            sa_pedido,
                                            sa_proveedor,
                                            sa_unidadadmva
                                            where
                                            $whereFinal and
                                            sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor  and
                                            sa_pedido.Id_UnidadAdmonDes=sa_unidadadmva.Id_Unidad";
                            $ResultadoTotal = $objG->Query($StrConsulta);
                            $row = mysql_fetch_array($ResultadoTotal);
                            $count = $row['count'];

                            if( $count > 0 ) {
                                    $total_pages = ceil($count/$limit);
                            } else {
                                    $total_pages = 0;
                            }
                            if ($page > $total_pages) $page=$total_pages;
                            $start = $limit*$page - $limit; // do not put $limit*($page - 1)

                            $StrConsulta = "Select
                                            sa_pedido.Id_Pedido,
                                            sa_pedido.dFechaPedido As FechaRegistro,
                                            sa_pedido.vNoLicitacion As Licitacion,
                                            sa_proveedor.vNombre As Proveedor,
                                            sa_unidadadmva.vDescripcion As AreaSolicitante,
                                            (Select sum((sa_detallepedido.eCantidad * sa_detallepedido.mPrecioUnitario)+sa_detallepedido.nIva) From sa_detallepedido Where sa_detallepedido.Id_Pedido =sa_pedido.Id_Pedido ) As ImporteTotalIVA
                                            From 
                                            sa_pedido,
                                            sa_proveedor,
                                            sa_unidadadmva
                                            where
                                            $whereFinal and
                                            sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor  and
                                            sa_pedido.Id_UnidadAdmonDes=sa_unidadadmva.Id_Unidad  ORDER BY Id_Pedido LIMIT ".$start." , ".$limit;
                            $TEmpleados = $objG ->Query($StrConsulta);
                            $Respuesta->page = $page;
                            $Respuesta->total = $total_pages;
                            $Respuesta->records = $count;
                            $Contador = 0;
                            while ($row = mysql_fetch_array($TEmpleados)){
                                $Importe =  number_format($row[ImporteTotalIVA],2,'.',',');
                                $Respuesta->rows[$Contador]["id"] = $row["Id_Pedido"];
                                $Respuesta->rows[$Contador]["cell"] = array($row["Id_Pedido"],
                                                                            $row[FechaRegistro],
                                                                            $row[Licitacion],
                                                                            $row[Proveedor],
                                                                            $Importe,);
                                $Contador++;
                            }
                            //echo json_encode($Respuesta);
                            echo $StrConsulta;
                  
            break;
     }
?>