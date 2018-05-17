<?php
class Reporte_Inventario_Consumible
{
	
	
	
	public function  Generar_Reporte($AData)
	{
		$ArrayInicio= split("/",$AData->FechaInicial);
        $ArrayFinal = split("/",$AData->FechaFinal);
        $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
        $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
        $where =" ";

        if(!empty($AData->FechaInicial) && !empty($AData->FechaFinal)) {
            $where .=" AND sa_existenciasconsumible.dFechaModRegistro >='$FechaInicio' and sa_existenciasconsumible.dFechaModRegistro <='$FechaFinal'"; 
        } else {
           if(!empty($AData->FechaInicial)) {
               $where .=" AND sa_existenciasconsumible.dFechaModRegistro ='$FechaInicio'";
           } else {
               if(!empty($AData->FechaFinal)) {
                  $where .=" AND sa_existenciasconsumible.dFechaModRegistro ='$FechaFinal'"; 
               }
           }
       }
       $whereFinal = $where;
		$FliexGrid = "<br><br>
		<center><table class=\"flexme1\">
		<tbody>";
		$objGrid = new poolConnection();
		$con=$objGrid->Conexion();
		$objGrid->BaseDatos($con);
		$sql="Select
                sa_cabms.Id_CABMS,
                sa_cabms.ePartidaPresupuestal,
                sa_cabms.vDescripcionCABMS,
                sa_umedida.vDescripcion As vDescripcionUM,
                sa_existenciasconsumible.mCostoPromedioActual,
                sa_existenciasconsumible.eCantidadExistenciaApartada,
                format(sa_existenciasconsumible.eCantidadExistenciaDisponible - sa_existenciasconsumible.eCantidadExistenciaApartada, 2)  As CantidadDis,
                format(sa_existenciasconsumible.eCantidadExistenciaDisponible, 2) As Total

            from   	
                sa_existenciasconsumible,
                sa_cabms,
                sa_umedida

            Where
                sa_cabms.Id_CABMS  = sa_existenciasconsumible.Id_CABMS and
                sa_cabms.Id_CABMS = sa_existenciasconsumible.Id_CABMS and
                sa_cabms.id_Umedida = sa_umedida.id_Umedida" .$whereFinal;
		$RSet=$objGrid->Query($con,$sql);
		while($fila=mysqli_fetch_array($RSet))
		{
		$FliexGrid.="
		<tr>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionUM]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mCostoPromedioActual]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadExistenciaApartada]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CantidadDis]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Total]</td>
		</tr>";
	
		}
		$objGrid->Cerrar($con,$RSet);
	
	
	
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
		title: '',
		colModel : [
			
		{display: 'Cve Cabms', name : 'Cve Cabms', width :120, sortable :false, align: 'center'},
		{display: 'P. Presupuestal', name : 'P. Presupuestal', width :100, sortable :false, align: 'center'},
		{display: 'Cabms', name : 'Cabms', width :300, sortable :false, align: 'center'},
		{display: 'U. Medida', name : 'U. Medida', width :300, sortable :false, align: 'center'},
		{display: 'Costo Promedio', name : 'Costo Promedio', width :100, sortable :false, align: 'center'},
		{display: 'Existencia Apartada', name : 'Existencia Apartada', width :100, sortable :false, align: 'center'},
		{display: 'Cantidad Disponible', name : 'Cantidad Disponible', width :100, sortable :false, align: 'center'},
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
	
	
	
    public function print_pdf($AData) {
    	$ArrayInicio= split("/",$AData->FechaInicial);
        $ArrayFinal = split("/",$AData->FechaFinal);
        $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
        $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
        $where =" ";

        if(!empty($AData->FechaInicial) && !empty($AData->FechaFinal)) {
            $where .=" AND sa_existenciasconsumible.dFechaModRegistro >='$FechaInicio' and sa_existenciasconsumible.dFechaModRegistro <='$FechaFinal'"; 
        } else {
           if(!empty($AData->FechaInicial)) {
               $where .=" AND sa_existenciasconsumible.dFechaModRegistro ='$FechaInicio'";
           } else {
               if(!empty($AData->FechaFinal)) {
                  $where .=" AND sa_existenciasconsumible.dFechaModRegistro ='$FechaFinal'"; 
               }
           }
       }
       $whereFinal = $where;

        $objG = new poolConnection();
        $con=$objG -> Conexion();
        $objG -> BaseDatos($con);
        $StrConsulta ="Select
                sa_cabms.Id_CABMS,
                sa_cabms.ePartidaPresupuestal,
                sa_cabms.vDescripcionCABMS,
                sa_umedida.vDescripcion As vDescripcionUM,
                sa_existenciasconsumible.mCostoPromedioActual,
                sa_existenciasconsumible.eCantidadExistenciaApartada,
                format(sa_existenciasconsumible.eCantidadExistenciaDisponible - sa_existenciasconsumible.eCantidadExistenciaApartada, 2)  As CantidadDis,
                format(sa_existenciasconsumible.eCantidadExistenciaDisponible, 2) As Total

            from   	
                sa_existenciasconsumible,
                sa_cabms,
                sa_umedida

            Where
                sa_cabms.Id_CABMS  = sa_existenciasconsumible.Id_CABMS and
                sa_cabms.Id_CABMS = sa_existenciasconsumible.Id_CABMS and
                sa_cabms.id_Umedida = sa_umedida.id_Umedida";
        $TResultado = $objG->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($Row = mysqli_fetch_array($TResultado)){
        
        	$Catalogo[] = array(
        			$Row["ePartidaPresupuestal"],
        			$Row["vDescripcionCABMS"],
        			$Row["vDescripcionUM"],
        			$Row["mCostoPromedioActual"],
        			$Row["eCantidadExistenciaApartada"],
        			$Row["CantidadDis"],
        			$Row["Total"]
        	);
        }

        $objG->Cerrar($con,$TResultado);
        //echo $StrConsulta;
        return $Catalogo;
    }    
}
?>