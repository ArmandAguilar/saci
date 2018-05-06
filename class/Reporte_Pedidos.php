<?php
    class Reporte_Pedidos extends  poolConnection {
        public function getProveedor($id) {
            $objProveedor = new poolConnection();
            $objProveedor->Conexion();
            $objProveedor->BaseDatos();
            $sqlp="select vNombre from sa_proveedor where Id_Proveedor='$id'";
            $RSetPro=$objProveedor->Query($sqlp);
            while($fila = mysql_fetch_array($RSetPro))
            {
                $NProveedor = $fila[vNombre];
            }
            return $NProveedor;
        }
        
        public function buscar_pedidoInicial($AData){
            $Patron=$AData->Patron;
            $ACFolio=$AData->Folio;
            $ACLicitacion=$AData->Licitacion;
            $ACRequisicion=$AData->Requisicion;
            #Preparamos ware
            if($ACFolio=="Si")
            {
                $where.="Id_Pedido like '%$Patron%' or "; 
            }

            if($ACLicitacion=="Si")
            {
                $where.="vNoLicitacion like '%$Patron%' or "; 
            }
            if($ACRequisicion)
            {
               $where.="vNoRequisicion like '%$Patron%' or "; 
            }  
            $where = substr($where, 0, -3);
            $objNomProveedor = new Reporte_Pedidos();

            $objGridPedido = new poolConnection();
            $con=$objGridPedido->Conexion();
            $objGridPedido->BaseDatos();
            $sql="SELECT Id_Pedido, 
                         vNoRequisicion,
                         vNoLicitacion,
                         Id_Proveedor,
                         dFechaPedido
                         FROM sa_pedido Where $where";
            $RSet=$objGridPedido->Query($sql);
            $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                             <tbody>";
            while($fila=mysql_fetch_array($RSet))
            {
                $i++;
                $proveedor = $objNomProveedor->getProveedor($fila[Id_Proveedor]);
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"$('#txtPedidoInicial').val('$fila[Id_Pedido]'); $('#dialog').dialog('close');\">&nbsp;</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>    
                                  </tr>";
            }
            mysql_free_result($RSet);
            $objGridPedido->Cerrar($con);
            $FliexGrid.="       </tbody>
                                                          </table><script>$('.flexme1').flexigrid({
                              title: '',
                              colModel : [

                                              {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                              {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                              {display: 'Requisicion', name : 'Requisicion', width :100, sortable :false, align: 'center'},
                                              {display: 'Licitacion', name : 'Licitacion', width :100, sortable :false, align: 'center'},
                                              {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                              {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},



                                          ],
                              buttons : [
                                              {name: '',onpress:saver_Order},
                                              {separator: true}
                                          ],
                              width: 640,
                              height: 250
                              }

                              );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
            return $FliexGrid;
        }
        
        public function buscar_pedidoFinal($AData) {
            $Patron=$AData->Patron;
            $ACFolio=$AData->Folio;
            $ACLicitacion=$AData->Licitacion;
            $ACRequisicion=$AData->Requisicion;
            #Preparamos ware
            if($ACFolio=="Si")
            {
                $where.="Id_Pedido like '%$Patron%' or "; 
            }

            if($ACLicitacion=="Si")
            {
                $where.="vNoLicitacion like '%$Patron%' or "; 
            }
            if($ACRequisicion)
            {
               $where.="vNoRequisicion like '%$Patron%' or "; 
            }  
            $where = substr($where, 0, -3);
            $objNomProveedor = new Reporte_Pedidos();

            $objGridPedido = new poolConnection();
            $con=$objGridPedido->Conexion();
            $objGridPedido->BaseDatos();
            $sql="SELECT Id_Pedido, 
                         vNoRequisicion,
                         vNoLicitacion,
                         Id_Proveedor,
                         dFechaPedido
                         FROM sa_pedido Where $where";
            $RSet=$objGridPedido->Query($sql);
            $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                             <tbody>";
            while($fila=mysql_fetch_array($RSet))
            {
                $i++;
                $proveedor = $objNomProveedor->getProveedor($fila[Id_Proveedor]);
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageH$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageH$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageH$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"$('#txtPedidoFinal').val('$fila[Id_Pedido]'); $('#dialog2').dialog('close');\">&nbsp;</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>    
                                  </tr>";
            }
            mysql_free_result($RSet);
            $objGridPedido->Cerrar($con);
            $FliexGrid.="       </tbody>
                                                          </table><script>$('.flexme1').flexigrid({
                              title: '',
                              colModel : [

                                              {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                              {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                              {display: 'Requisicion', name : 'Requisicion', width :100, sortable :false, align: 'center'},
                                              {display: 'Licitacion', name : 'Licitacion', width :100, sortable :false, align: 'center'},
                                              {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                              {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},



                                          ],
                              buttons : [
                                              {name: '',onpress:saver_Order},
                                              {separator: true}
                                          ],
                              width: 640,
                              height: 250
                              }

                              );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
            return $FliexGrid;
        }
        
        public function JSONC_Pedidos($page, $limit, $sidx, $sord,$sql,$sqlcount) {   
            $objCount = new poolConnection();
            $con=$objCount -> Conexion();
            $objCount -> BaseDatos();
            if(!$sidx) $sidx =1;

            $StrConsulta = "$sqlcount";
            $ResultadoTotal = $objCount->Query($StrConsulta);
            $row = mysql_fetch_array($ResultadoTotal);
            $count = $row['count'];

            if( $count > 0 ) {
                    $total_pages = ceil($count/$limit);
            } else {
                    $total_pages = 0;
            }
            if ($page > $total_pages) $page=$total_pages;
            $start = $limit*$page - $limit; // do not put $limit*($page - 1)
            if($limit==0)
            {
                    $limit=20;
            }	
            $sLimite.="LIMIT $start,$limit";
            $sql.=$sLimite;
            $objGrid =  new poolConnection();
            $objGrid->BaseDatos();
            $RSet = $objGrid ->Query($sql);
            $Respuesta->page = $page;
            $Respuesta->total = $total_pages;
            $Respuesta->records = $count;
            $Contador = 0;
            while ($row = mysql_fetch_array($RSet))
            {

                $Respuesta->rows[$Contador]['Pedido'] = $row[Pedido];
                $Respuesta->rows[$Contador]['cell'] = array($row[Pedido]);
                $Contador++;
            }
            return json_encode($Respuesta);
            //return $sql;
        }
		
        public function print_pdf($AData) {
        	
        	$PedidoInicial=$AData->PedidoInicial;
        	$PedidoFinal=$AData->PedidoFinal;
        	$FechaIncial=$AData->FechaIncial;
        	$FechaFinal=$AData->FechaFinal;
        	
        	$where .=" ";
        	
        	if(!empty($PedidoInicial) && !empty($PedidoFinal))
        	{
        		$where .=" sa_pedido.Id_Pedido>='$PedidoInicial' and sa_pedido.Id_Pedido<='$PedidoFinal' and ";
        	}
        	else
        	{
        	if(!empty($PedidoInicial))
        	{
        	$where .=" sa_pedido.Id_Pedido='$PedidoInicial' and ";
        	}
        		else
        		{
        		if(!empty($PedidoFinal))
        		{
        		$where .=" sa_pedido.Id_Pedido='$PedidoFinal' and ";
        		}
        	
        		}
        		}
        	
        		if(!empty($FechaIncial) && !empty($FechaFinal))
        		{
        		$where .=" sa_pedido.dFechaPedido>='$FechaIncial' and sa_pedido.dFechaPedido>='$FechaFinal' and ";
        		}
        		else{
        		if(!empty($FechaIncial))
        		{
        		$where .=" sa_pedido.dFechaPedido='$FechaIncial' and ";
        		}
        		else
        		{
        		if(!empty($FechaFinal))
        		{
        		$where .=" sa_pedido.dFechaPedido='$FechaFinal' and ";
        		}
        		}
        		}
        		$whereFinal = substr($where, 0, -4);
        	
        	
		            $objG = new poolConnection();
		            $con=$objG -> Conexion();
		            $objG -> BaseDatos();
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
		                            sa_pedido.Id_UnidadAdmonDes=sa_unidadadmva.Id_Unidad  ORDER BY Id_Pedido";
		             $RSet = $objG ->Query($StrConsulta);
			        $Catalogo = array();
			        while ($Row = mysql_fetch_array($RSet)){
			            
			          $Catalogo[] = array($Row["Id_Pedido"], 
			                                $Row["FechaRegistro"],
			                                $Row["Licitacion"],
			                                $Row["Proveedor"],
			                                $Row["AreaSolicitante"],
			                                $Row["ImporteTotalIVA"]
			                                );
			        }
			        
			        mysql_free_result($RSet);
			        $objG->Cerrar($con);
			        //$Catalogo[] = array( $whereFinal);
            return $Catalogo;
        }
    }
?>