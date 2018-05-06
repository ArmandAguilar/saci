<?php
include("../../../../sis.php");
include($path."/class/poolConnection.php");
include($path."/class/Reporte_HistoricoConsumo.php");
require($path."/class/fpdf/fpdf.php");

class PDF extends FPDF
{
	protected $AnchoColumnas;// = array(30, 245);
	protected $CabeceraTabla;// = array('IDUnidadMedida', utf8_decode('Descripción'));
	protected $DatosCatalogo;

	function Header()
	{
		$ObjImgLogo = new poolConnection();
		$con=$ObjImgLogo->Conexion();
		$ObjImgLogo->BaseDatos();
		$sql="SELECT Reportes FROM sa_settings Where Id='1'";
		$RSetImg=$ObjImgLogo->Query($sql);
		while($rowimg = mysql_fetch_array($RSetImg))
		{
			$Logo = $rowimg[Reportes];
		}
		mysql_free_result($RSetImg);
		$ObjImgLogo->Cerrar($con);
		// Logo
		$this->Image("../../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,280);
		$this->Image("../../../../logos/$Logo",8,5,20);
		$this->Image("../../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg",8,190,280);
		// Arial bold 15
		$this->SetFont('Arial','B',12);
		// Movernos a la derecha
		//$this->Cell();
		// Título
		$this->Cell(0,5,utf8_decode('Reporte'),0, 0,'C');
		$this->Ln(5);
		$this->Cell(0,5,'Historico Consumo',0,0,'C');
		// Salto de línea
		$this->SetFont('Arial','I',6);
		$this->Ln(20);
		$this->Cell(0,0,'Fecha: '.date('d/m/Y'),0, 0);
		$this->Ln();
		$this->Cell(0,6,'Hora: '.date('H:m:s'),0, 0);
		$this->Ln(10);

		$this->SetFont('Arial','',8);
		for($i=0;$i<count($this->CabeceraTabla);$i++) {
			$Bordes = 'TBLR';
			/*if ($i == 1 || $i == 8){
			 $Bordes .= 'R';
			}
			if($i == 8)
			{
			$Bordes .= 'R';
			}*/
			$this->Cell($this->AnchoColumnas[$i],5,$this->CabeceraTabla[$i],$Bordes,0,'C');
		}
		//$this->Cell($this->AnchoColumnas[$i],5,$this->CabeceraTabla[$i],'TBLR',0,'C');
		$this->Ln();
	}

	// Pie de página
	function Footer()
	{
		// Posici&pn: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',5);
		// Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
	}

	// Cargar los datos
	function CargarDatos($FechaInicial,$FechaFinal,$Cabms)
	{
		
		$this->AnchoColumnas = array(40,65,65,25,25,25);
		$this->CabeceraTabla = array('CABMS','Descripcion','U. Medida','Mov. Entrada','Mov. Salida','Total');
		$RC = new Reporte_HistoricoConsumo();
		$info->fecha1 = $FechaInicial;
		$info->fecha2 = $FechaFinal;
		$info->Cambs = $Cabms;
		
		$this->DatosCatalogo = $RC->print_pdf($info);
	}

	function GenerarReporte($FechaInicial,$FechaFinal,$Cabms)
	{
		// Datos
		 
		$this->CargarDatos($FechaInicial,$FechaFinal,$Cabms);
		$this->AddPage();
		foreach($this->DatosCatalogo as $Dato)
		{
			$this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[1],6,$Dato[1],'');
			$this->Cell($this->AnchoColumnas[2],6,$Dato[2],'');
			$this->Cell($this->AnchoColumnas[3],6,$Dato[3],'');
			$this->Cell($this->AnchoColumnas[4],6,$Dato[4],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[5],6,$Dato[5],'', 0, 'C');
			$this->Ln();
		}
		$this->Output('reporte_historicoconsumo_pdf.pdf', 'I');
	}
}

//$pdf = new PDF('L','mm',array(210,350));
$pdf = new PDF('L');
$pdf->GenerarReporte($_GET[v1],$_GET[v2],$_GET[v3]);

?>