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
class Reporte_Consumible_Salida
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
			                        sa_movconsumo.dFechaRegistro,
			                        sa_movconsumo.nFolio, 
			                        sa_movconsumo.vDocumento, 
			                        sa_unidadadmva .vDescripcion as UnidadAministrativa,
			                        sa_cabms.ePartidaPresupuestal, 
			                        sa_movconsumo.Id_CABMS, 
			                        sa_movconsumo.eCantidad, 
			                        sa_movconsumo.mCostoUnitario,
			                        Format(sa_movconsumo.eCantidad * sa_movconsumo.mCostoUnitario,2) as nImporte,
			                        sa_movconsumo.vNumPedido,
			                        sa_cabms.vDescripcionCABMS  As CABMS  
			                        From
			                        sa_movconsumo,
			                        sa_cabms, 
			                        sa_tipomovimiento,
			                        sa_unidadadmva 
			                        Where
			                        sa_movconsumo.dFechaMovRegistro>='$fechainicio' and sa_movconsumo.dFechaMovRegistro<='$fechafinal' and
			                         sa_tipomovimiento.Id_TipoMovimiento = '2502'
			                        AND  sa_movconsumo.Id_TipoMovimiento = sa_tipomovimiento.Id_TipoMovimiento 
			                        AND  sa_tipomovimiento.bEstadoMov = 1
			                        AND  sa_movconsumo.Id_CABMS  = sa_cabms.Id_CABMS
			                        AND  sa_movconsumo.Id_Unidad  = sa_unidadadmva.Id_Unidad";
					$RSet=$objGrid->Query($sql);
						
					$i=0;
					while($fila=mysql_fetch_array($RSet))
					{
						$i++;
							
						$FliexGrid.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaMovRegistro]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Folio]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDocumento]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[UnidadAdministrativa]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CAMBS]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mCostoUnitario]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nImporte]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNumPedido]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CABMS]</td> 
						</tr>";
						
						}
						mysql_free_result($RSet);
						$objGrid->Cerrar($con);
				
						
						
										$FliexGrid.="       </tbody>
										</table><script>$('.flexme1').flexigrid({
										title: '',
										colModel : [
							
													{display: 'Fecha', name : 'Fecha', width :120, sortable :false, align: 'center'},
													{display: 'No.Folio', name : 'No.Folio', width :100, sortable :false, align: 'center'},
													{display: 'Documento', name : 'Documento', width :100, sortable :false, align: 'center'},
													{display: 'U. Administrativa', name : 'U. Administrativa', width :400, sortable :false, align: 'center'},
													{display: 'P.Presupuestal', name : 'P.Presupuestal', width :130, sortable :false, align: 'center'},
													{display: 'Cve. CAMBS', name : 'Cve. CAMBS', width :130, sortable :false, align: 'center'},
													{display: 'Cantidad', name : 'Cantidad', width :130, sortable :false, align: 'center'},
													{display: 'Costo Unitario', name : 'Costo Unitario', width :130, sortable :false, align: 'center'},
													{display: 'Importe', name : 'Importe', width :130, sortable :false, align: 'center'},
													{display: 'Num. Pedido', name : 'Num. Pedido', width :130, sortable :false, align: 'center'},
													{display: 'Cabms', name : 'Cabms', width :130, sortable :false, align: 'center'}
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
			                        sa_movconsumo.dFechaRegistro,
			                        sa_movconsumo.nFolio, 
			                        sa_movconsumo.vDocumento, 
			                        sa_unidadadmva .vDescripcion as UnidadAministrativa,
			                        sa_cabms.ePartidaPresupuestal, 
			                        sa_movconsumo.Id_CABMS, 
			                        sa_movconsumo.eCantidad, 
			                        sa_movconsumo.mCostoUnitario,
			                        Format(sa_movconsumo.eCantidad * sa_movconsumo.mCostoUnitario,2) as nImporte,
			                        sa_movconsumo.vNumPedido,
			                        sa_cabms.vDescripcionCABMS  As CABMS  
			                        From
			                        sa_movconsumo,
			                        sa_cabms, 
			                        sa_tipomovimiento,
			                        sa_unidadadmva 
			                        Where
			                        sa_movconsumo.dFechaMovRegistro>='$fechainicio' and sa_movconsumo.dFechaMovRegistro<='$fechafinal' and
			                         sa_tipomovimiento.Id_TipoMovimiento = '2502'
			                        AND  sa_movconsumo.Id_TipoMovimiento = sa_tipomovimiento.Id_TipoMovimiento 
			                        AND  sa_tipomovimiento.bEstadoMov = 1
			                        AND  sa_movconsumo.Id_CABMS  = sa_cabms.Id_CABMS
			                        AND  sa_movconsumo.Id_Unidad  = sa_unidadadmva.Id_Unidad";
			
					$RSet = $objDatosPDF ->Query($StrConsulta);
					$Catalogo = array();
					while ($Row = mysql_fetch_array($RSet)){
			
					$Catalogo[] = array(
					$Row["dFechaRegistro"],
					$Row["nFolio"],
					$Row["vDocumento"],
					$Row["UnidadAministrativa"],
					$Row["ePartidaPresupuestal"],
					$Row["Id_CABMS"],
					$Row["eCantidad"],
					$Row["mCostoUnitario"],
					$Row["nImporte"],
					$Row["vNumPedido"],
					$Row["CABMS"]
					);
					}
						
					mysql_free_result($RSet);
					$objDatosPDF->Cerrar($con);
					return $Catalogo;
			}

}

?>