<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Parametro
 *
 * @author armand
 */
class Reporte_Consumible_Entrada extends poolConnection
{
	public function  Generar_Reporte($AData)
	{
		 		    $fechainicio = $AData->fechainicial; 
		 		    $fechafinal = $AData->fechafinal;
					$FliexGrid = "<br><br>
					<center><table class=\"flexme1\">
					<tbody>";
					$objGrid = new poolConnection();
					$con=$objGrid->Conexion();
					$objGrid->BaseDatos();
					     $sql="Select
                        sa_movconsumo.Id_CABMS,
                        sa_movconsumo.dFechaMovRegistro, 
                        sa_movconsumo.vNumPedido, 
                        sa_movconsumo.vDocumento, 
                        Format(sa_movconsumo.mCostoUnitario  * sa_movconsumo.eCantidad,2 ) As Total, 
                        sa_movconsumo.eCantidad,
                        sa_cabms.Id_CABMS,
                        sa_cabms.vDescripcionCABMS AS descripcionC,
                        sa_tipomovimiento.vDescripcion AS 'descripcionTM',
                        sa_pedido.Id_Proveedor,
                        sa_proveedor.vNombre
                    From
                        sa_movconsumo,
                        sa_cabms,
                        sa_tipomovimiento,
                        sa_pedido,
                        sa_proveedor
                    Where
                        sa_movconsumo.dFechaMovRegistro>='$fechainicio' and sa_movconsumo.dFechaMovRegistro<='$fechafinal' and
                        sa_movconsumo.Id_CABMS  = sa_cabms.Id_CABMS and
                        sa_movconsumo.vNumPedido      = sa_pedido.Id_Pedido and
                        (sa_tipomovimiento.Id_TipoMovimiento like '01%' or sa_tipomovimiento.Id_TipoMovimiento='4000') and
                        sa_tipomovimiento.bEntrada =  '1' and
                        sa_tipomovimiento.bEstadoMov =  '1'  
                        and sa_proveedor.Id_Proveedor=sa_pedido.Id_Proveedor";
					$RSet=$objGrid->Query($sql);
					while($fila=mysql_fetch_array($RSet))
					{
						$FliexGrid.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaMovRegistro]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNumPedido]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDocumento]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Total]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[descripcionC]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[descripcionTM]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Proveedor]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td> 
						</tr>";
						
						}
						mysql_free_result($RSet);
						$objGrid->Cerrar($con);
				
						
						
										$FliexGrid.="       </tbody>
										</table><script>$('.flexme1').flexigrid({
										title: '',
										colModel : [
							
													{display: 'Cve Cabms', name : 'Fecha', width :120, sortable :false, align: 'center'},
													{display: 'Fecha Registro', name : 'No.Folio', width :100, sortable :false, align: 'center'},
													{display: 'Num. Pedido', name : 'Documento', width :100, sortable :false, align: 'center'},
													{display: 'Documento', name : 'U. Administrativa', width :400, sortable :false, align: 'center'},
													{display: 'Total', name : 'P.Presupuestal', width :130, sortable :false, align: 'center'},
													{display: 'Cantidad', name : 'Cve. CAMBS', width :130, sortable :false, align: 'center'},
													{display: 'Cve Cabms', name : 'Cantidad', width :130, sortable :false, align: 'center'},
													{display: 'Cabms', name : 'Costo Unitario', width :130, sortable :false, align: 'center'},
													{display: 'Descripcion Tipo', name : 'Importe', width :130, sortable :false, align: 'center'},
													{display: 'Cve. Proveedor', name : 'Num. Pedido', width :130, sortable :false, align: 'center'},
													{display: 'Proveedor', name : 'Cabms', width :130, sortable :false, align: 'center'}
													],
													buttons : [
													{name: '',onpress:saver_Order},
													{separator: true}
													],
													width: 940,
													height: 250
													}
														
													);</script>
													<br><br><br>
													<div id=\"DivExportar\">
													<table border=\"0\">
													<tr>
													<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf();\"/></th>
													<td>&nbsp;</td>
													<th></th>
													<td>&nbsp;</td>
													<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls();\"/></th>
													</tr>
													</table>
													</div>
													</center>";
						return $FliexGrid;
			}
			
			function print_pdf($AData)
			{
					$fechainicio = $AData->fechainicial; 
		 		    $fechafinal = $AData->fechafinal;
					$objDatosPDF = new poolConnection();
					$con=$objDatosPDF -> Conexion();
					$objDatosPDF -> BaseDatos();
						
					$StrConsulta="Select
                        sa_movconsumo.Id_CABMS,
                        sa_movconsumo.dFechaMovRegistro, 
                        sa_movconsumo.vNumPedido, 
                        sa_movconsumo.vDocumento, 
                        Format(sa_movconsumo.mCostoUnitario  * sa_movconsumo.eCantidad,2 ) As Total, 
                        sa_movconsumo.eCantidad,
                        sa_cabms.Id_CABMS,
                        sa_cabms.vDescripcionCABMS AS descripcionC,
                        sa_tipomovimiento.vDescripcion AS 'descripcionTM',
                        sa_pedido.Id_Proveedor,
                        sa_proveedor.vNombre
                    From
                        sa_movconsumo,
                        sa_cabms,
                        sa_tipomovimiento,
                        sa_pedido,
                        sa_proveedor
                    Where
                        sa_movconsumo.dFechaMovRegistro>='$fechainicio' and sa_movconsumo.dFechaMovRegistro<='$fechafinal' and
                        sa_movconsumo.Id_CABMS  = sa_cabms.Id_CABMS and
                        sa_movconsumo.vNumPedido      = sa_pedido.Id_Pedido and
                        (sa_tipomovimiento.Id_TipoMovimiento like '01%' or sa_tipomovimiento.Id_TipoMovimiento='4000') and
                        sa_tipomovimiento.bEntrada =  '1' and
                        sa_tipomovimiento.bEstadoMov =  '1'  
                        and sa_proveedor.Id_Proveedor=sa_pedido.Id_Proveedor";
			
					$RSet = $objDatosPDF ->Query($StrConsulta);
					$Catalogo = array();
					while ($Row = mysql_fetch_array($RSet)){
			
					$Catalogo[] = array(
					$Row["Id_CABMS"],
					$Row["dFechaMovRegistro"],
					$Row["vNumPedido"],
					$Row["vDocumento"],
					$Row["Total"],
					$Row["eCantidad"],
					$Row["descripcionC"],
					$Row["descripcionTM"],
					$Row["Id_Proveedor"],
					$Row["vNombre"]
					);
					}
						
					mysql_free_result($RSet);
					$objDatosPDF->Cerrar($con);
					return $Catalogo;
			}

}

?>