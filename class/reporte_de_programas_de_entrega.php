<?php

class Reporte_Programas_Entrega extends poolConnection {
    public function ObtenerReporte($xMes, $xOrden) {
        $MesInicial = $xMes - 1;
           $Anio = date("Y");
           
           if ($MesInicial == 0){
               $MesInicial = 12;
               $AnioInicial = $Anio - 1;
           } else {
               $AnioInicial = $Anio;
           }
           
           if ($xMes < 10)
               $xMes = "0".$xMes;
           
           if ($MesInicial < 10)
               $MesInicial = "0".$MesInicial;
           
           $FechaInicial = $AnioInicial.$MesInicial;
           $FechaFinal = $Anio.$xMes;
        $StrOrden = "";
        switch ($xOrden) {
            case "Z":
                $StrOrden = "ORDER BY z.vDescripcionzn, u.ePrioridad";
                break;
            case "":
                $StrOrden = "ORDER BY u.ePrioridad, z.vDescripcionzn";
                break;
            default: 
                break;
        }
        $StrConsulta = "
            SELECT
              z.vDescripcionzn AS 'Zona', u.ePrioridad AS 'Prioridad', u.vDescripcion AS 'Unidad_Administrativa',
              IFNULL(u.eNumEmpleados, 0) AS 'Numero_Empleado',m.id_unidad AS 'IDUnidad',
              IFNULL((
                SELECT mc.dFechaMovRegistro
                FROM sa_movconsumo mc
                WHERE Id_Tipomovimiento='2502'
                  AND Id_Unidad = m.Id_unidad
                  AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaInicial."'
                  AND dFechaMovRegistro = (
                    SELECT MAX(dFechaMovRegistro)
                    FROM sa_movconsumo
                    WHERE nFolio = mc.nFolio
                      AND Id_Tipomovimiento='2502')
                  GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Inicial',
              IFNULL((
                SELECT mc.dFechaMovRegistro
                            FROM sa_movconsumo mc
                WHERE Id_Tipomovimiento='2502'
                  AND Id_unidad = m.Id_unidad
                  AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaFinal."'
                                    AND dFechaMovRegistro = (
                    SELECT MAX(dFechaMovRegistro)
                                            FROM sa_movconsumo
                                            WHERE nFolio = mc.nFolio
                                            AND Id_Tipomovimiento='2502')
                GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Final',
              IFNULL((
                SELECT mc.dFechaRegistro
                            FROM sa_movconsumo mc
                WHERE Id_Tipomovimiento='2502'
                  AND Id_unidad = m.Id_unidad
                  AND dFechaRegistro = (
                    SELECT MAX(dFechaRegistro)
                    FROM sa_movconsumo
                    WHERE nFolio = mc.nFolio
                      AND Id_Tipomovimiento='2502')
                GROUP BY dFechaRegistro),\"-\") AS 'Fecha_Registro',
              m.nFolio AS 'Folio',
              UPPER(MONTHNAME(CONVERT(CONCAT(substring('".$FechaFinal."',1,4), substring('".$FechaFinal."',5,2), '01'), DATETIME))) AS 'Mes',
              substring('".$FechaFinal."',1,4) AS 'Anio'
            FROM
              sa_unidadadmva u, sa_zona z, sa_movconsumo m
            WHERE
              m.id_tipomovimiento='2502'
                    AND u.id_zonas = z.id_zonas
              AND m.id_unidad = u.id_unidad
            GROUP BY
              z.vDescripcionzn,m.nFolio, u.vDescripcion,u.ePrioridad, u.eNumEmpleados, m.Id_Unidad
            ".$StrOrden." LIMIT 100;";
        echo $StrConsulta."<p/>";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        $TReporte = $objConexion->Query($con,$StrConsulta);
        
        $Contador = 0;
        if (mysqli_num_rows($TReporte) > 0) {
            while ($Registro = mysqli_fetch_array($TReporte)) {
                $Respuesta[$Contador]->Zona = $Registro["Zona"];
                $Respuesta[$Contador]->Prioridad = $Registro["Prioridad"];
                $Respuesta[$Contador]->Unidad_Administrativa = $Registro["Unidad_Administrativa"];
                $Respuesta[$Contador]->Numero_Empleado = $Registro["Numero_Empleado"];
                $Respuesta[$Contador]->IDUnidad = $Registro["IDUnidad"];
                $Respuesta[$Contador]->Fecha_Registro_Inicial = $Registro["Fecha_Registro_Inicial"];
                $Respuesta[$Contador]->Fecha_Registro_Final = $Registro["Fecha_Registro_Final"];
                $Respuesta[$Contador]->Fecha_Registro = $Registro["Fecha_Registro"];
                $Respuesta[$Contador]->Folio = $Registro["Folio"];
                $Respuesta[$Contador]->Mes = $Registro["Mes"];
                $Respuesta[$Contador]->Anio = $Registro["Anio"];
                $Contador++;
            }
        } else {
            $Respuesta = json_decode("[]");
        }
        return $Respuesta;
    }
    public function generar($xMes, $xOrden)
    {
    	$MesInicial = $xMes - 1;
    	$Anio = date("Y");
    	 
    	if ($MesInicial == 0){
    		$MesInicial = 12;
    		$AnioInicial = $Anio - 1;
    	} else {
    		$AnioInicial = $Anio;
    	}
    	 
    	if ($xMes < 10)
    		$xMes = "0".$xMes;
    	 
    	if ($MesInicial < 10)
    		$MesInicial = "0".$MesInicial;
    	 
    	$FechaInicial = $AnioInicial.$MesInicial;
    	$FechaFinal = $Anio.$xMes;
    	$StrOrden = "";
    	switch ($xOrden) {
    		case "Z":
    			$StrOrden = "ORDER BY z.vDescripcionzn, u.ePrioridad";
    			break;
    		case "":
    			$StrOrden = "ORDER BY u.ePrioridad, z.vDescripcionzn";
    			break;
    		default:
    			break;
    	}
    	$StrConsulta = "
    	SELECT
    	z.vDescripcionzn AS 'Zona', u.ePrioridad AS 'Prioridad', u.vDescripcion AS 'Unidad_Administrativa',
    	IFNULL(u.eNumEmpleados, 0) AS 'Numero_Empleado',m.id_unidad AS 'IDUnidad',
    	IFNULL((
    	SELECT mc.dFechaMovRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_Unidad = m.Id_unidad
    	AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaInicial."'
    	AND dFechaMovRegistro = (
    	SELECT MAX(dFechaMovRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Inicial',
    	IFNULL((
    	SELECT mc.dFechaMovRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_unidad = m.Id_unidad
    	AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaFinal."'
    	AND dFechaMovRegistro = (
    	SELECT MAX(dFechaMovRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Final',
    	IFNULL((
    	SELECT mc.dFechaRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_unidad = m.Id_unidad
    	AND dFechaRegistro = (
    	SELECT MAX(dFechaRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaRegistro),\"-\") AS 'Fecha_Registro',
    	m.nFolio AS 'Folio',
    	UPPER(MONTHNAME(CONVERT(CONCAT(substring('".$FechaFinal."',1,4), substring('".$FechaFinal."',5,2), '01'), DATETIME))) AS 'Mes',
    	substring('".$FechaFinal."',1,4) AS 'Anio'
    	FROM
    	sa_unidadadmva u, sa_zona z, sa_movconsumo m
    	WHERE
    	m.id_tipomovimiento='2502'
    	AND u.id_zonas = z.id_zonas
    	AND m.id_unidad = u.id_unidad
    	GROUP BY
    	z.vDescripcionzn,m.nFolio, u.vDescripcion,u.ePrioridad, u.eNumEmpleados, m.Id_Unidad
    	".$StrOrden." LIMIT 100;";
    	$objGrid = new poolConnection();
    	$con=$objGrid->Conexion();
    	$objGrid->BaseDatos($con);
    	
    	$RSet=$objGrid->Query($con,$StrConsulta);
    		
    	$Capasidad = "Normal";
    	while($fila=mysqli_fetch_array($RSet))
    	{
    		
    		
    			$FliexGrid2.="
    			<tr>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Zona]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Prioridad]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Unidad_Administrativa]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Numero_Empleado]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IDUnidad]vMax</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Fecha_Registro_Inicial]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Fecha_Registro_Final]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Fecha_Registro]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Folio]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Mes]</td>
    			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Anio]</td>
    			</tr>";
    		
    		 
    		}
    			$objGrid->Cerrar($con,$RSet);
    			
    			
    	
    			$FliexGrid = "<br><br><center><table class=\"flexme1\">
    			<tbody>$FliexGrid2";
    			$FliexGrid.="       </tbody>
    			</table><script>$('.flexme1').flexigrid({
    					title: '',
    			colModel : [
    				
    			{display: 'Zona', name : 'Zona', width :120, sortable :false, align: 'center'},
    			{display: 'Prioridad', name : 'Prioridad', width :130, sortable :false, align: 'center'},
    			{display: 'U. Administrativa', name : 'U. Administrativa', width :200, sortable :false, align: 'center'},
    			{display: 'Num. Empleado', name : 'Num. Empleado', width :80, sortable :false, align: 'center'},
    			{display: 'Unidad', name : 'Unidad', width :80, sortable :false, align: 'center'},
    			{display: 'Registro Inicial', name : 'Registro Inicial', width :90, sortable :false, align: 'center'},
    			{display: 'Registro Final', name : 'Registro Final', width :130, sortable :false, align: 'center'},
    			{display: 'Registro', name : 'Registro', width :130, sortable :false, align: 'center'},
    			{display: 'Folio', name : 'Folio', width :100, sortable :false, align: 'center'},
    			{display: 'Mes', name : 'Mes', width :100, sortable :false, align: 'center'},
    			{display: 'Anio', name : 'Anio', width :100, sortable :false, align: 'center'}
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
    function print_pdf($xMes, $xOrden)
    {   	
    	
    	$MesInicial = $xMes - 1;
    	$Anio = date("Y");
    	
    	if ($MesInicial == 0){
    		$MesInicial = 12;
    		$AnioInicial = $Anio - 1;
    	} else {
    		$AnioInicial = $Anio;
    	}
    	
    	if ($xMes < 10)
    		$xMes = "0".$xMes;
    	
    	if ($MesInicial < 10)
    		$MesInicial = "0".$MesInicial;
    	
    	$FechaInicial = $AnioInicial.$MesInicial;
    	$FechaFinal = $Anio.$xMes;
    	$StrOrden = "";
    	switch ($xOrden) {
    		case "Z":
    			$StrOrden = "ORDER BY z.vDescripcionzn, u.ePrioridad";
    			break;
    		case "":
    			$StrOrden = "ORDER BY u.ePrioridad, z.vDescripcionzn";
    			break;
    		default:
    			break;
    	}
    	$StrConsulta = "
    	SELECT
    	z.vDescripcionzn AS 'Zona', u.ePrioridad AS 'Prioridad', u.vDescripcion AS 'Unidad_Administrativa',
    	IFNULL(u.eNumEmpleados, 0) AS 'Numero_Empleado',m.id_unidad AS 'IDUnidad',
    	IFNULL((
    	SELECT mc.dFechaMovRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_Unidad = m.Id_unidad
    	AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaInicial."'
    	AND dFechaMovRegistro = (
    	SELECT MAX(dFechaMovRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Inicial',
    	IFNULL((
    	SELECT mc.dFechaMovRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_unidad = m.Id_unidad
    	AND (CONVERT(YEAR(dFechaMovRegistro), CHAR(4)) + CONVERT(MONTH(dFechaMovRegistro), CHAR(2)))='".$FechaFinal."'
    	AND dFechaMovRegistro = (
    	SELECT MAX(dFechaMovRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaMovRegistro),\"-\") AS 'Fecha_Registro_Final',
    	IFNULL((
    	SELECT mc.dFechaRegistro
    	FROM sa_movconsumo mc
    	WHERE Id_Tipomovimiento='2502'
    	AND Id_unidad = m.Id_unidad
    	AND dFechaRegistro = (
    	SELECT MAX(dFechaRegistro)
    	FROM sa_movconsumo
    	WHERE nFolio = mc.nFolio
    	AND Id_Tipomovimiento='2502')
    	GROUP BY dFechaRegistro),\"-\") AS 'Fecha_Registro',
    	m.nFolio AS 'Folio',
    	UPPER(MONTHNAME(CONVERT(CONCAT(substring('".$FechaFinal."',1,4), substring('".$FechaFinal."',5,2), '01'), DATETIME))) AS 'Mes',
    	substring('".$FechaFinal."',1,4) AS 'Anio'
    	FROM
    	sa_unidadadmva u, sa_zona z, sa_movconsumo m
    	WHERE
    	m.id_tipomovimiento='2502'
    	AND u.id_zonas = z.id_zonas
    	AND m.id_unidad = u.id_unidad
    	GROUP BY
    	z.vDescripcionzn,m.nFolio, u.vDescripcion,u.ePrioridad, u.eNumEmpleados, m.Id_Unidad
    	".$StrOrden.";";
    	
    	$objDatosPDF = new poolConnection();
    	$con=$objDatosPDF -> Conexion();
    	$objDatosPDF -> BaseDatos($con);	
    	$RSet = $objDatosPDF ->Query($con,$StrConsulta);
    	$Catalogo = array();
    	while ($Row = mysqli_fetch_array($RSet)){
    		
			    	$Catalogo[] = array(
			    	$Row["Zona"],
			    	$Row["Prioridad"],
			    	$Row["Unidad_Administrativa"],
			    	$Row["Numero_Empleado"],
			    	$Row["IDUnidad"],
			    	$Row["Fecha_Registro_Inicial"],
			    		$Row["Fecha_Registro_Final"],
			    		$Row["Fecha_Registro"],
			    		$Row["Folio"],
			    		$Row["Mes"],
			    			$Row["Anio"]
			    		);
    	}
    

    		$objDatosPDF->Cerrar($con,$RSet);
    		return $Catalogo;
    	}
}
?>
