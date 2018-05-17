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
class Reporte_EntradaYSalida {
    
    
public function  Generar_Reporte($AData)
 {
           $fecha1 = $AData->fecha1;
           $fecha2 = $AData->fecha2;
           $Unidad  = $AData->cbo;
           $FechaA1 = split("/",$fecha1);
           $FechaA2 = split("/",$fecha2);
          $F1 = "$FechaA1[2]/$FechaA1[0]/$FechaA1[1]"; 
          $F2 = "$FechaA2[2]/$FechaA2[0]/$FechaA2[1]";
     $where = "";
           if(!empty($fecha1))
           {
           	  
           	  $where .= " sa_movinventario.dFechaMovRegistro>='$F1' and ";
           	  
           }
           if(!empty($fecha2))
           {
           	 $where .= " sa_movinventario.dFechaMovRegistro<='$F2' and ";
           }
            $whereFinal = substr($where, 0, -4);
            
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="SELECT  
					sa_movinventario.dFechaMovRegistro,
					sa_movinventario.vDoctoOficial,
					sa_unidadadmva.vDescripcion,
					sa_movinventario.Id_CABMS,
					sa_cabms.vDescripcionCABMS,
					COUNT(sa_movinventario.Id_CABMS) As Total
					FROM    
					sa_movinventario,  
					sa_unidadadmva, 
					sa_cabms
					
					Where
					sa_movinventario.Id_CABMS = sa_cabms.Id_CABMS and
					sa_movinventario.Id_Unidad = sa_unidadadmva.Id_Unidad and
					sa_movinventario.Id_TipoMovimiento	= '1500' and
					sa_movinventario.Id_Unidad='$Unidad' and
					$whereFinal";
			$RSet=$objGrid->Query($con,$sql);
			$i=0;
		    while($fila=mysqli_fetch_array($RSet))
			{
			$i++;
			
			$FliexGrid2.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaMovRegistro]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDoctoOficial]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
            <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>    
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Total]</td>
			</tr>";
                        
			}
			$objGrid->Cerrar($con,$RSet);
                        
                        $FliexGrid = "<br><br>
                                     <center><table class=\"flexme1\">
			<tbody>$FliexGrid2";
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Fecha', name : 'Fecha', width :100, sortable :false, align: 'center'},
					{display: 'Documento', name : 'Documento', width :120, sortable :false, align: 'center'},
					{display: 'U.Administrativa', name : 'U.Administrativa', width :300, sortable :false, align: 'center'},
			        {display: 'Cve.CABMS', name : 'Cve.CABMS', width :130, sortable :false, align: 'center'},
			        {display: 'Descripcion', name : 'Descripcion', width :300, sortable :false, align: 'center'},
			        {display: 'Total', name : 'Total', width :100, sortable :false, align: 'center'}
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
           $Unidad  = $AData->cbo;
           $FechaA1 = split("/",$fecha1);
           $FechaA2 = split("/",$fecha2);
          $F1 = "$FechaA1[2]/$FechaA1[0]/$FechaA1[1]"; 
          $F2 = "$FechaA2[2]/$FechaA2[0]/$FechaA2[1]";
     $where = "";
           if(!empty($fecha1))
           {
           	  
           	  $where .= " sa_movinventario.dFechaMovRegistro>='$F1' and ";
           	  
           }
           if(!empty($fecha2))
           {
           	 $where .= " sa_movinventario.dFechaMovRegistro<='$F2' and ";
           }
            $whereFinal = substr($where, 0, -4);
			 	$objDatosPDF = new poolConnection();
			 	$con=$objDatosPDF -> Conexion();
			 	$objDatosPDF -> BaseDatos($con);
			 	
			 	$StrConsulta="SELECT  
					sa_movinventario.dFechaMovRegistro,
					sa_movinventario.vDoctoOficial,
					sa_unidadadmva.vDescripcion,
					sa_movinventario.Id_CABMS,
					sa_cabms.vDescripcionCABMS,
					COUNT(sa_movinventario.Id_CABMS) As Total
					FROM    
					sa_movinventario,  
					sa_unidadadmva, 
					sa_cabms
					
					Where
					sa_movinventario.Id_CABMS = sa_cabms.Id_CABMS and
					sa_movinventario.Id_Unidad = sa_unidadadmva.Id_Unidad and
					sa_movinventario.Id_TipoMovimiento	= '1500' and
					sa_movinventario.Id_Unidad='$Unidad' and
					$whereFinal";
			 	$RSet = $objDatosPDF ->Query($con,$StrConsulta);
			 	$Catalogo = array();
			 	while ($Row = mysqli_fetch_array($RSet)){
			 		if(!empty($Row[Total]))
			 		{
			 			$Total=$Row["Total"];
			 		}
			 		else{
			 			$Total="0";
			 		}	
			 		$Catalogo[] = array(
			 				$Row["dFechaMovRegistro"],
			 				$Row["vDoctoOficial"],
			 				$Row["vDescripcion"],
			 				$Row["Id_CABMS"],
			 				$Row["vDescripcionCABMS"],
			 				$Total
			 		);
			 	}

			 	$objDatosPDF->Cerrar($con,$RSet);
			 	return $Catalogo;
 }
 
}

?>