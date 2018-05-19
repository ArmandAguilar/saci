<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Inventario_Consumible.php");
    $obj =  new Reporte_Inventario_Consumible();
    
     switch ($_GET[o]) {
        case '1':
            
                    $ArrayInicio = split("/",$_GET[v2]);
                    $ArrayFinal = split("/",$_GET[v3]);
                    $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
                    $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
                    $where .=" ";
                  
                    if(!empty($_GET[v2]) && !empty($_GET[v3]))
                    {
                        $where .=" sa_existenciasconsumible.dFechaModRegistro >='$FechaInicio' and sa_existenciasconsumible.dFechaModRegistro <='$FechaFinal' and "; 
                    } 
                   else{
                       if(!empty($_GET[v2]))
                       {
                           $where .=" sa_existenciasconsumible.dFechaModRegistro ='$FechaInicio' and ";
                       }
                       else
                       {
                           if(!empty($_GET[v3]))
                           {
                              $where .=" sa_existenciasconsumible.dFechaModRegistro ='$FechaFinal' and "; 
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
                            $objG -> BaseDatos($con);
                            if(!$sidx) $sidx =1;

                            $StrConsulta = "Select COUNT(*) AS count
                                            from   	
                                                sa_existenciasconsumible,
                                                sa_cabmsconsumible,
                                                sa_umedida

                                                Where  
                                                $whereFinal and
                                                sa_cabmsconsumible.Id_CveARTCABMS  = sa_existenciasconsumible.Id_CveARTCABMS and
                                                sa_cabmsconsumible.Id_CveInternaAC = sa_existenciasconsumible.Id_CveInternaAC and
                                                sa_cabmsconsumible.id_Umedida = sa_umedida.id_Umedida";
                            
                            $ResultadoTotal = $objG->Query($con,$StrConsulta);
                            $row = mysqli_fetch_array($ResultadoTotal);
                            $count = $row['count'];

                            if( $count > 0 ) {
                                    $total_pages = ceil($count/$limit);
                            } else {
                                    $total_pages = 0;
                            }
                            if ($page > $total_pages) $page=$total_pages;
                            $start = $limit*$page - $limit; // do not put $limit*($page - 1)

                            $StrConsulta = "Select
                                                sa_cabmsconsumible.Id_CveARTCABMS,
                                                sa_existenciasconsumible.Id_CveInternaAC,
                                                sa_cabmsconsumible.ePartidaPresupuestal,
                                                sa_cabmsconsumible.vDescripcion,
                                                sa_umedida.vDescripcion As vDescripcionUM,
                                                sa_existenciasconsumible.mCostoPromedioActual,
                                                sa_existenciasconsumible.eCantidadExistenciaApartada,
                                                format(sa_existenciasconsumible.eCantidadExistenciaDisponible - sa_existenciasconsumible.eCantidadExistenciaApartada, 2)  As CantidadDis,
                                                format(sa_existenciasconsumible.eCantidadExistenciaDisponible, 2) As Total

                                                from   	
                                                sa_existenciasconsumible,
                                                sa_cabmsconsumible,
                                                sa_umedida

                                                Where 
                                                $whereFinal and
                                                sa_cabmsconsumible.Id_CveARTCABMS  = sa_existenciasconsumible.Id_CveARTCABMS and
                                                sa_cabmsconsumible.Id_CveInternaAC = sa_existenciasconsumible.Id_CveInternaAC and
                                                sa_cabmsconsumible.id_Umedida = sa_umedida.id_Umedida
                                                  LIMIT ".$start." , ".$limit;
                            $TEmpleados = $objG ->Query($con,$StrConsulta);
                            $Respuesta->page = $page;
                            $Respuesta->total = $total_pages;
                            $Respuesta->records = $count;
                            $Contador = 0;
                            while ($row = mysqli_fetch_array($TEmpleados)){
                                $Respuesta->rows[$Contador]["id"] = $row[Id_CveARTCABMS];
                                $Respuesta->rows[$Contador]["cell"] = array($row[Id_CveARTCABMS],
                                                                            $row[Id_CveInternaAC],
                                                                            $row[ePartidaPresupuestal],
                                                                            $row[vDescripcion],
                                                                            $row[vDescripcionUM],
                                                                            $row[mCostoPromedioActual],
                                                                            $row[eCantidadExistenciaApartada],
                                                                            $row[CantidadDis],
                                                                            $row[Total]
                                                                            );
                                $Contador++;
                            }
                            //echo $StrConsulta;
                            echo json_encode($Respuesta);
                    
            break;
        case '2':
        	       $info->FechaInicio = $_POST[FechaInicio];
        	       $info->FechaFinal = $_POST[FechaFianl]; 
        	       echo $obj->Generar_Reporte($info);
        	break;
     }
?>
