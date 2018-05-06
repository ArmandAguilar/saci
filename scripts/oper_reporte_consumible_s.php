<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Consumible_Salida.php");
    $obj =  new Reporte_Consumible_Salida();
     switch ($_GET[o]) {
        case '1':
            $ArrayInicio = split("/",$_GET[v2]);
            $ArrayFinal = split("/",$_GET[v3]);
            $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
            $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
            $where .=" ";

            if(!empty($_GET[v2]) && !empty($_GET[v3])) {
                $where .=" sa_movconsumo.dFechaRegistro >='$FechaInicio' and sa_movconsumo.dFechaRegistro <='$FechaFinal' and "; 
            } else {
               if(!empty($_GET[v2])) {
                   $where .=" sa_movconsumo.dFechaRegistro ='$FechaInicio' and ";
               } else {
                   if(!empty($_GET[v3])) {
                      $where .=" sa_movconsumo.dFechaRegistro ='$FechaFinal' and "; 
                   }
               }
            }
            $whereFinal = $where;

            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction

            $objG = new poolConnection();
            $con=$objG -> Conexion();
            $objG -> BaseDatos();
            if(!$sidx) $sidx =1;

            $StrConsulta = "
                Select 
                    COUNT(*) AS count
                From
                    sa_movconsumo,
                    sa_cabmsconsumible, 
                    sa_tipomovimiento,
                    sa_unidadadmva
                Where
                    ".$whereFinal."
                    sa_tipomovimiento.Id_TipoMovimiento = '2502'
                    AND  sa_movconsumo.Id_TipoMovimiento = sa_tipomovimiento.Id_TipoMovimiento 
                    AND  sa_tipomovimiento.bEstadoMov = 1
                    AND  sa_movconsumo.Id_CveARTCABMS  = sa_cabmsconsumible.Id_CveARTCABMS
                    AND  sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC
                    AND  sa_movconsumo.Id_Unidad  = sa_unidadadmva.Id_Unidad";

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
                        sa_movconsumo.dFechaRegistro,
                        sa_movconsumo.nFolio, 
                        sa_movconsumo.vDocumento, 
                        sa_unidadadmva .vDescripcion,
                        sa_cabmsconsumible.ePartidaPresupuestal, 
                        sa_movconsumo.Id_CveARTCABMS, 
                        sa_movconsumo.Id_CveInternaAC,
                        sa_movconsumo.eCantidad, 
                        sa_movconsumo.mCostoUnitario,
                        Format(sa_movconsumo.eCantidad * sa_movconsumo.mCostoUnitario,2) as nImporte,
                        sa_cabmsconsumible.Id_CABMS, 
                        sa_movconsumo.vNumPedido,
                        sa_cabmsconsumible.vDescripcion  
                        From
                        sa_movconsumo,
                        sa_cabmsconsumible, 
                        sa_tipomovimiento,
                        sa_unidadadmva 
                        Where
                        ".$whereFinal."
                         sa_tipomovimiento.Id_TipoMovimiento = '2502'
                        AND  sa_movconsumo.Id_TipoMovimiento = sa_tipomovimiento.Id_TipoMovimiento 
                        AND  sa_tipomovimiento.bEstadoMov = 1
                        AND  sa_movconsumo.Id_CveARTCABMS  = sa_cabmsconsumible.Id_CveARTCABMS
                        AND  sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC
                        AND  sa_movconsumo.Id_Unidad  = sa_unidadadmva.Id_Unidad  LIMIT ".$start." , ".$limit;
            $TEmpleados = $objG->Query($StrConsulta);
            $Respuesta->page = $page;
            $Respuesta->total = $total_pages;
            $Respuesta->records = $count;
            $Contador = 0;
            while ($row = mysql_fetch_array($TEmpleados)){
                $Respuesta->rows[$Contador]["id"] = $row[dFechaRegistro];
                $Respuesta->rows[$Contador]["cell"] = array($row[dFechaRegistro],
                                                            $row[nFolio],
                                                            $row[vDocumento],
                                                            $row[vDescripcion],
                                                            $row[ePartidaPresupuestal],
                                                            $row[Id_CveARTCABMS],
                                                            $row[Id_CveInternaAC],
                                                            $row[eCantidad],
                                                            $row[mCostoUnitario],
                                                            $row[nImporte],
                                                            $row[Id_CABMS],
                                                            $row[vNumPedido],
                                                            $row[vDescripcion]
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
