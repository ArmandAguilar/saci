<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reporte_MovimientoKardex
 *
 * @author armand
 */
class Reporte_MovimientoKardex {
    
    public function buscar_cambs1($AData)
    {
                        $Patron=$AData->Patron;
                        $Clave=$AData->Clave;
			$Descripcion=$AData->Descripcion;
        $where = "";
			#Preparamos ware
			if($Clave=="Si")
			{
				$where.="Id_CABMS like '%$Patron%' and ";
			}
			
			if($Descripcion=="Si")
			{
			$where.="DescripcionCABMS like '%$Patron%' and ";
			}
			
			$where = substr($where, 0, -4);
			
			
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="SELECT 
                                    sa_cabms.Id_CABMS,
                                    sa_cabms.vDescripcionCABMS
	                      FROM 
                            sa_cabms
			Where  $where";
			$RSet=$objGrid->Query($con,$sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
                        $i=0;
		    while($fila=mysqli_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs1('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			
			</tr>";
			}
			$objGrid->Cerrar($con,$RSet);
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
					{display: 'Cambs', name : 'Cambs', width :100, sortable :false, align: 'center'},
					{display: 'Descripcion', name : 'Descripcion', width :400, sortable :false, align: 'center'},
			
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
    public function buscar_cambs2($AData)
    {
                        $Patron=$AData->Patron;
                        $Clave=$AData->Clave;
			$Descripcion=$AData->Descripcion;
        	$where = "";
			#Preparamos ware
			if($Clave=="Si")
			{
				$where.="Id_CABMS like '%$Patron%' and ";
			}
			
			if($Descripcion=="Si")
			{
			$where.="DescripcionCABMS like '%$Patron%' and ";
			}
			
			$where = substr($where, 0, -4);
			
			
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="SELECT 
                                    sa_cabms.Id_CABMS,
                                    sa_cabms.vDescripcionCABMS
	                      FROM 
                            sa_cabms
			Where  $where";
			$RSet=$objGrid->Query($con,$sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
                        $i=0;
		    while($fila=mysqli_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs2('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			
			</tr>";
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
					{display: 'Cambs', name : 'Cambs', width :100, sortable :false, align: 'center'},
					{display: 'Descripcion', name : 'Descripcion', width :400, sortable :false, align: 'center'},
			
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
 public function  Generar_Reporte($AData)
 {
     
                        $Cabms=$AData->Cabms;
                       // $Cabms="2221000002";
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="Select
                                MC.dFechaMovRegistro,
                                MC.nFolio,
                                MC.vNumPedido,
                                MC.eCantidad,
                                MC.eExistenciaIniMovto,
                                CA.vDescripcionCABMS,
                                UM.vDescripcion,
                                CA.ePartidaPresupuestal,
                                MC.mCostoUnitario,
                                (MC.eCantidad - MC.eCantidadApartadaSalida) * MC.mCostoUnitario As CostoInversion
                                From
                                sa_movconsumo MC,
                                sa_cabms CA,
                                sa_umedida UM

                                Where
                                MC.Id_CABMS ='$Cabms' and
                                MC.Id_CABMS = CA.Id_CABMS and
                                CA.Id_UMedida = UM.Id_UMedida";
			$RSet=$objGrid->Query($sql);
			
                        $i=0;
		    while($fila=mysqli_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid2.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaMovRegistro]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNumPedido]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nFolio]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">-</td>    
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eExistenciaIniMovto]</td>
			</tr>";
                        $vDescripcionCABMS=$fila[vDescripcionCABMS];
                        $vDescripcion=$fila[vDescripcion];
                        $ePartidaPresupuestal=$fila[vDescripcion];
                        $mCostoUnitario = $fila[mCostoUnitario];    
                        $mCostoUnitario= number_format($mCostoUnitario,'2',',','.');
                        $mCostoInversion =$fila[CostoInversion];
                        $mCostoInversion=number_format($mCostoInversion,'2',',','.');
			}
			$objGrid->Cerrar($con,$RSet);
                        
                        $FliexGrid = "<br><br>
                                     <table>
                                          <tr>
                                             <td><b>Cambs:</b></td>
                                             <td>$Cabms</td>
                                             <td>&nbsp;&nbsp;&nbsp;<b>Descripci&oacute;n:</b></td>
                                             <td>$vDescripcionCABMS</td>
                                             
                                          </tr>
                                          <tr>
                                              <td><b>Unidad Medida:</b></td>
                                              <td>$vDescripcion</td>
                                              <td>&nbsp;&nbsp;&nbsp;<b>Partida Presupuestal:</b></td> 
                                              <td>$ePartidaPresupuestal</td>
                                          </tr>
                                          <tr>
                                             <td><b>Precio Unitario:</b></td>
                                             <td>$ $mCostoUnitario</td>
                                             <td>&nbsp;&nbsp;&nbsp;<b>Existencia:</b></td>
                                             <td></td>
                                          </tr>
                                          <tr>
                                             <td><b>Costos de inversion:</b></td>
                                             <td>$ $mCostoInversion</td>
                                             <td></td>
                                             <td>&nbsp;&nbsp;&nbsp;<b>Existencia Anterior:</b></td>
                                          </tr>
                                     </table>
                                     <center><table class=\"flexme1\">
			<tbody>$FliexGrid2";
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Fecha', name : 'Fecha', width :120, sortable :false, align: 'center'},
					{display: 'No.Pedido', name : 'No.Pedido', width :100, sortable :false, align: 'center'},
					{display: 'No. Folio', name : 'No. Folio', width :100, sortable :false, align: 'center'},
			                {display: 'Procedencia-Destino', name : 'Procedencia-Destino', width :400, sortable :false, align: 'center'},
			                {display: 'Entrada', name : 'Entrada', width :130, sortable :false, align: 'center'},
                                        {display: 'Salida', name : 'Salida', width :130, sortable :false, align: 'center'}
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
 				$Cabms=$AData->Cabms;
			 	$Cabms="2221000002";
			 	$objDatosPDF = new poolConnection();
			 	$con=$objDatosPDF -> Conexion();
			 	$objDatosPDF -> BaseDatos($con);
			 	
			 	$StrConsulta="Select
			 	MC.dFechaMovRegistro,
			 	MC.nFolio,
			 	MC.vNumPedido,
			 	MC.eCantidad,
			 	MC.eExistenciaIniMovto,
			 	CA.vDescripcionCABMS,
			 	UM.vDescripcion,
			 	CA.ePartidaPresupuestal,
			 	MC.mCostoUnitario,
			 	(MC.eCantidad - MC.eCantidadApartadaSalida) * MC.mCostoUnitario As CostoInversion
			 	From
			 	sa_movconsumo MC,
			 	sa_cabms CA,
			 	sa_umedida UM
			 	
			 	Where
			 	MC.Id_CABMS ='$Cabms' and
			 	MC.Id_CABMS = CA.Id_CABMS and
			 	CA.Id_UMedida = UM.Id_UMedida";
			 
			 	$RSet = $objDatosPDF ->Query($con,$StrConsulta);
			 	$Catalogo = array();
			 	while ($Row = mysqli_fetch_array($RSet)){
			 		
			 		$Catalogo[] = array(
			 				$Row["dFechaMovRegistro"],
			 				$Row["nFolio"],
			 				$Row["vNumPedido"],
			 				$Row["eCantidad"],
			 				$Row["eExistenciaIniMovto"],
			 				$Row["vDescripcionCABMS"],
			 				$Row["vDescripcion"],
			 				$Row["ePartidaPresupuestal"],
			 				$Row["mCostoUnitario"],
			 				$Row["CostoInversion"]
			 		);
			 	}
			 	

			 	$objDatosPDF->Cerrar($con,$RSet);
			 	return $Catalogo;
 }
 
}

?>
