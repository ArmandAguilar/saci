<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Facturas.php");
    $obj = new Reporte_Facturas();
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
                   
                    $ArrayFechaInicial = split("/",$_GET[FI]);
                    $ArrayFechaFinal =split("/",$_GET[FF]);
                    $FechaInicial = "$ArrayFechaInicial[2]/$ArrayFechaInicial[0]/$ArrayFechaInicial[1]";
                    $FechaFinal = "$ArrayFechaFinal[2]/$ArrayFechaFinal[0]/$ArrayFechaFinal[1]";
                    if($FechaInicial=="//")
                    {
                        $FechaInicial="";
                    }  
                    if($FechaFinal=="//")
                    {
                        $FechaFinal="";
                    } 
                    
                    $where .=" ";
                  
                    if(!empty($FechaInicial) && !empty($FechaFinal))
                    {
                        $where .=" sa_contrarecibo.dFechaRegistro>='$FechaInicial' and sa_contrarecibo.dFechaRegistro<='$FechaFinal' and "; 
                    }
                    else
                    {
                        if(!empty($FechaInicial))
                        {
                           $where .=" sa_contrarecibo.dFechaRegistro='$FechaInicial' and "; 
                        }
                        else
                            {
                               if(!empty($FechaFinal))
                               {
                                 $where .=" sa_contrarecibo.dFechaRegistro='$FechaFinal' and ";   
                               }
                            
                            }
                    }
                    
                    if(!empty($_GET[PI]) && !empty($_GET[PF]))
                    {
                        $where .=" sa_contrarecibo.Id_Pedido>='$_GET[PI]' and sa_contrarecibo.Id_Pedido<='$_GET[PF]' and "; 
                    } 
                   else{
                       if(!empty($_GET[PI]))
                       {
                           $where .=" sa_contrarecibo.Id_Pedido='$_GET[PI]' and ";
                       }
                       else
                       {
                           if(!empty($_GET[PF]))
                           {
                              $where .=" sa_contrarecibo.Id_Pedido='$_GET[PF]' and "; 
                           }
                       }
                   }
                    
                    $whereFinal = substr($where, 0, -4);  
                    $page = $_GET['page']; // get the requested page
                    $limit = $_GET['rows']; // get how many rows we want to have into the grid
                    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
                    $sord = $_GET['sord']; // get the direction

                    
                  $sql="Select sa_pedido.Id_Pedido,
       sa_pedido.Id_Proveedor,
       sa_proveedor.vNombre As Proveedor,
       sa_pedido.dFechaPedido,
       sa_contrarecibo.vNoRemisionFactura,
       sa_contrarecibo.dFechaRegistro,
       sa_contrarecibo.mImporte
       From sa_pedido,sa_contrarecibo,sa_proveedor where $whereFinal and sa_pedido.Id_Pedido = sa_contrarecibo.Id_Pedido and sa_contrarecibo.Id_Proveedor=sa_proveedor.Id";
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos();
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "Select COUNT(*) AS count From sa_pedido,sa_contrarecibo,sa_proveedor where $whereFinal and sa_pedido.Id_Pedido = sa_contrarecibo.Id_Pedido and sa_contrarecibo.Id_Proveedor=sa_proveedor.Id";
        $ResultadoTotal = $objMenu->Query($StrConsulta);
        $row = mysql_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $sql .= " LIMIT ".$start." , ".$limit;
        $RSet = $objMenu ->Query($sql);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($rows = mysql_fetch_array($RSet)){
            $importe = number_format($rows["mImporte"],2,'.',',');
            $importefoamt = "$ $importe";
            $Respuesta->rows[$Contador]["Id"] = $rows["Id_Pedido"];
            $Respuesta->rows[$Contador]["cell"] = array($rows["Id_Pedido"], $rows["Proveedor"], $rows["dFechaPedido"], $rows["vNoRemisionFactura"],$importefoamt);
            $Contador++;
        }
        echo json_encode($Respuesta);
        //echo $sql; 
            break;
     }
?>
