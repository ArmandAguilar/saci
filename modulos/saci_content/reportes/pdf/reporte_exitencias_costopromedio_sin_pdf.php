<?php
include("../../../../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Reporte_ConSin.php");
require("$path/class/fpdf/fpdf.php");

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
		$this->Cell(0,5,'Sin Costo Promedio',0,0,'C');
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
		// Número de pagina
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
	}

	// Cargar los datos
	function CargarDatos($Fecha1,$Fecha2)
	{
		$this->AnchoColumnas = array(30,50,50,20,20,20,30,30,30,30);
		$this->CabeceraTabla = array('Cambs','Descripcion','U. Medida','Stock Min.','Stock Max.','Exis. Incial','Mov.Entrada','Acomulados Salida');
		$RC = new Reporte_ConSin();
		
		$info->Fecha1 =$Fecha1;
		$info->Fecha2 =$Fecha2;
		$this->DatosCatalogo = $RC->print_pdf_sin($info);
	}

	function GenerarReporte($FechaInicial,$FechaFinal)
	{
		// Datos
		
		$this->CargarDatos($FechaInicial,$FechaFinal);
		
		$this->AddPage();
		
		foreach($this->DatosCatalogo as $Dato)
		{
			
		
			$this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'L');
			$this->Cell($this->AnchoColumnas[1],6,$Dato[1],'', 0, 'L');
			$this->Cell($this->AnchoColumnas[2],6,$Dato[2],'', 0, 'L');
			$this->Cell($this->AnchoColumnas[3],6,$Dato[3],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[4],6,$Dato[4],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[5],6,$Dato[5],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[6],6,$Dato[6],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[7],6,$Dato[7],'', 0, 'C');
			$this->Ln();
		}
		$this->Output('reporte_existenciacon_pdf.pdf', 'I');
	}
}

//$pdf = new PDF('L','mm',array(210,350));
$pdf = new PDF('L');

$pdf->GenerarReporte($_GET[fecha1],$_GET[fecha2]);

?>