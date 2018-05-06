<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Consumible_Entrada.php");
    $obj = new Reporte_Consumible_Entrada();
    switch ($_GET[o]) {
        case '1':
                $ArrayInicio = split("/",$_GET[v2]);
                $ArrayFinal = split("/",$_GET[v3]);
                $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
                $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
                $where .=" ";

                if(!empty($_GET[v2]) && !empty($_GET[v3])) {
                    $where .=" sa_movconsumo.dFechaRegistro >='.$FechaInicio.' and sa_movconsumo.dFechaRegistro <='.$FechaFinal.' and "; 
                } else {
                   if(!empty($_GET[v2])) {
                       $where .=" sa_movconsumo.dFechaRegistro ='.$FechaInicio.' and ";
                   } else {
                       if(!empty($_GET[v3]))                        {
                          $where .=" sa_movconsumo.dFechaRegistro ='.$FechaFinal.' and "; 
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
                                    sa_movconsumo,
                                    sa_cabmsconsumible,
                                    sa_tipomovimiento,
                                    sa_pedido,
                                    sa_proveedor
                                    Where
                                    sa_movconsumo.Id_CveARTCABMS  = sa_cabmsconsumible.Id_CveARTCABMS and
                                    sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC and
                                    sa_movconsumo.vNumPedido      = sa_pedido.Id_Pedido and
                                    (sa_tipomovimiento.Id_TipoMovimiento like '01%' or sa_tipomovimiento.Id_TipoMovimiento='4000') and
                                    sa_tipomovimiento.bEntrada =  '1' and
                                    sa_tipomovimiento.bEstadoMov =  '1' 
                                    and sa_proveedor.Id_Proveedor=sa_pedido.Id_Proveedor";

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

                $StrConsulta = "
                    Select
                        sa_movconsumo.Id_CveARTCABMS, 
                        sa_movconsumo.Id_CveInternaAC,
                        sa_movconsumo.dFechaMovRegistro, 
                        sa_movconsumo.vNumPedido, 
                        sa_movconsumo.vDocumento, 
                        Format(sa_movconsumo.mCostoUnitario  * sa_movconsumo.eCantidad,2 ) As Total, 
                        sa_movconsumo.eCantidad,
                        sa_cabmsconsumible.Id_CABMS,
                        sa_cabmsconsumible.vdescripcion AS 'descripcionC',
                        sa_tipomovimiento.vDescripcion AS 'descripcionTM',
                        sa_pedido.Id_Proveedor,
                        sa_proveedor.vNombre
                    From
                        sa_movconsumo,
                        sa_cabmsconsumible,
                        sa_tipomovimiento,
                        sa_pedido,
                        sa_proveedor
                    Where
                        $whereFinal  and
                        sa_movconsumo.Id_CveARTCABMS  = sa_cabmsconsumible.Id_CveARTCABMS and
                        sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC and
                        sa_movconsumo.vNumPedido      = sa_pedido.Id_Pedido and
                        (sa_tipomovimiento.Id_TipoMovimiento like '01%' or sa_tipomovimiento.Id_TipoMovimiento='4000') and
                        sa_tipomovimiento.bEntrada =  '1' and
                        sa_tipomovimiento.bEstadoMov =  '1'  
                        and sa_proveedor.Id_Proveedor=sa_pedido.Id_Proveedor
                        LIMIT ".$start." , ".$limit;
                $TEmpleados = $objG ->Query($StrConsulta);
                $Respuesta->page = $page;
                $Respuesta->total = $total_pages;
                $Respuesta->records = $count;
                $Contador = 0;
                while ($row = mysql_fetch_array($TEmpleados)){
                    $Respuesta->rows[$Contador]["id"] = $row[Id_CveARTCABMS];
                    $Respuesta->rows[$Contador]["cell"] = array($row[Id_CveARTCABMS],
                                                                $row[Id_CveInternaAC],
                                                                $row[dFechaMovRegistro],
                                                                $row[vNumPedido],
                                                                $row[vDocumento],
                                                                $row[Total],
                                                                $row[eCantidad],
                                                                $row[Id_CABMS],
                                                                $row[vdescripcion],
                                                                $row[vDescripcion],
                                                                $row[Id_Proveedor]
                                                                );
                    $Contador++;
                }
                //echo $StrConsulta;
                echo json_encode($Respuesta);
                    
            break;
        case '2':
        	
        	$ArrayInicio = split("/",$_POST[v2]);
        	$ArrayFinal = split("/",$_POST[v3]);
        	$FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
        	$FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
        	$info->fechainicial=$FechaInicio;
        	$info->fechafinal=$FechaFinal;
        	echo $obj->Generar_Reporte($info);
        	
        	
        	
        	break;
     }
?>