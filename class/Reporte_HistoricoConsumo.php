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
class Reporte_HistoricoConsumo {
    
    public function buscar_cambs1($AData)
    {
                        $Patron=$AData->Patron;
                        $Clave=$AData->Clave;
			$Descripcion=$AData->Descripcion;
			
			#Preparamos ware
			if($Clave=="Si")
			{
				$where.="Id_CABMS like '%$Patron%' and ";
			}
			
			if($Descripcion=="Si")
			{
			$where.="vDescripcionCABMS like '%$Patron%' and ";
			}
			
			$where = substr($where, 0, -4);
			
			
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="SELECT 
                                    sa_cabms.Id_CABMS,
                                    sa_cabms.vDescripcionCABMS
	                      FROM 
                            sa_cabms
			Where  $where";
			$RSet=$objGrid->Query($sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
                        $i=0;
		    while($fila=mysql_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs1('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
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
           $fecha1 = $AData->fecha1;
           $fecha2 = $AData->fecha2;
           $cambs  = $AData->Cambs;
           
           if(!empty($cambs))
           {
           	 $where .= "  ";
           }
           if(!empty($fecha1))
           {
           	  $FechaA1 = split("/",$fecha1);
           	  //$where .= " CH.eAnio='' and ";
           	  //$where .= " CH.eMes='$FechaA1[1]' and ";
           }
           if(!empty($fecha2))
           {
           	 $FechaA2 = split("/",$fecha2);
           	//$where .= " CH.eAnio='$FechaA2[0]' and ";
           	//$where .= " CH.eMes='$FechaA2[1]' and ";
           }
            $where .="((CH.eAnio BETWEEN '$FechaA1[2]' AND '$FechaA2[2]') or (CH.eMes BETWEEN '$FechaA1[0]' AND '$FechaA2[0]')) ";
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="Select
					CC.Id_CABMS,
					CC.vDescripcionCABMS,
					CC.Id_UMedida,
					UA.vDescripcion
					From   
					 sa_consumohistorico CH,
					 sa_cabms CC,
					 sa_umedida UA
					 
					Where
					(CH.Id_CABMS = CC.Id_CABMS and CC.Id_UMedida = UA.Id_UMedida and CH.Id_CABMS='$cambs') and $where ";
			$RSet=$objGrid->Query($sql);
			$i=0;
		    while($fila=mysql_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid2.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
            <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">0</td>    
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">0</td>
             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">0</td>
			</tr>";
                        
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
                        
                        $FliexGrid = "<br><br>
                                     <center><table class=\"flexme1\">
			<tbody>$FliexGrid2";
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
					{display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
					{display: 'U. Medida', name : 'U. Medida', width :100, sortable :false, align: 'center'},
			        {display: 'Mov. Entrada', name : 'Mov. Entrada', width :400, sortable :false, align: 'center'},
			        {display: 'Mov. Salida', name : 'Mov. Salida', width :130, sortable :false, align: 'center'},
                    {display: 'Total', name : 'Total', width :130, sortable :false, align: 'center'}
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
 	
			 	$fecha1 = $AData->fecha1;
			 	$fecha2 = $AData->fecha2;
			 	$cambs  = $AData->Cambs;
			 	 
			 	if(!empty($cambs))
			 	{
			 		$where .= "  ";
			 	}
			 	if(!empty($fecha1))
			 	{
			 		$FechaA1 = split("/",$fecha1);
			 		//$where .= " CH.eAnio='' and ";
			 		//$where .= " CH.eMes='$FechaA1[1]' and ";
			 	}
			 	if(!empty($fecha2))
			 	{
			 		$FechaA2 = split("/",$fecha2);
			 		//$where .= " CH.eAnio='$FechaA2[0]' and ";
			 		//$where .= " CH.eMes='$FechaA2[1]' and ";
			 	}
			 	$where .="((CH.eAnio BETWEEN '$FechaA1[2]' AND '$FechaA2[2]') or (CH.eMes BETWEEN '$FechaA1[0]' AND '$FechaA2[0]')) ";
 	
 				$Entrada =0;
 				$Salida = 0;
 				$Total = 0;
			 	$objDatosPDF = new poolConnection();
			 	$con=$objDatosPDF -> Conexion();
			 	$objDatosPDF -> BaseDatos();
			 	
			 	$StrConsulta="Select
					CC.Id_CABMS,
					CC.vDescripcionCABMS,
					CC.Id_UMedida,
					UA.vDescripcion
					From   
					 sa_consumohistorico CH,
					 sa_cabms CC,
					 sa_umedida UA
					 
					Where
					(CH.Id_CABMS = CC.Id_CABMS and CC.Id_UMedida = UA.Id_UMedida and CH.Id_CABMS='$cambs') and $where ";
			 
			 	$RSet = $objDatosPDF ->Query($StrConsulta);
			 	$Catalogo = array();
			 	while ($Row = mysql_fetch_array($RSet)){
			 		
			 		$Catalogo[] = array(
			 				$Row["Id_CABMS"],
			 				$Row["vDescripcionCABMS"],
			 				$Row["Id_UMedida"],
			 				$Row["vDescripcion"],
			 				$Entrada,
			 				$Salida,
			 				$Total
			 				
			 		);
			 	}
			 	
			 	mysql_free_result($RSet);
			 	$objDatosPDF->Cerrar($con);
			 	return $Catalogo;
 }
 
}

?>