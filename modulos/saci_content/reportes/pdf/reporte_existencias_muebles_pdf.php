<?php
include("../../../../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Reporte_Existencias.php");
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
		$this->Cell(0,5,'Existencias Muebles',0,0,'C');
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
	function CargarDatos($info)
	{
		
		$this->AnchoColumnas = array(25,25,23,45,35,30,15,15,15,15,15,20);
		$this->CabeceraTabla = array('Cve.Usuario','No.Inventario','Fecha Registro','Tipo','Modelo','Pedestal','Fija','Giratoria','Rodajas','Plegable','NoCajon','NoEntrepanio');
		$RC = new Reporte_Existencias();
		
		
		$this->DatosCatalogo = $RC->print_muebles_pdf($info);
	}

	function GenerarReporte($info)
	{
		// Datos
		
		$this->CargarDatos($info);
		
		$this->AddPage();
		
		foreach($this->DatosCatalogo as $Dato)
		{
			
		
			$this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[1],6,$Dato[1],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[2],6,$Dato[2],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[3],6,$Dato[3],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[4],6,$Dato[4],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[5],6,$Dato[5],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[6],6,$Dato[6],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[7],6,$Dato[7],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[8],6,$Dato[8],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[9],6,$Dato[9],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[10],6,$Dato[10],'', 0, 'C');
			$this->Cell($this->AnchoColumnas[11],6,$Dato[11],'', 0, 'C');
			$this->Ln();
		}
		$this->Output('reporte_existencias_muebles_pdf.pdf', 'I');
	}
}

//$pdf = new PDF('L','mm',array(210,350));
$pdf = new PDF('L');
$info->txtIdEmpleadoInicial=$_GET[txtIdEmpleadoInicial];
$info->txtIdEmpleadoFinal=$_GET[txtIdEmpleadoFinal];
$info->txtAreaInicial=$_GET[txtAreaInicial];
$info->txtAreaFinal=$_GET[txtAreaFinal];
$info->txtInventarioInicial=$_GET[txtInventarioInicial];
$info->txtInventarioFinal=$_GET[txtInventarioFinal];
$info->txtFechaInicial=$_GET[txtFechaInicial];
$info->txtFechaFinal=$_GET[txtFechaFinal];
$info->txtMarcaMuebleInicio=$_GET[txtMarcaMuebleInicio];
$info->txtMarcaMuebleFinal=$_GET[txtMarcaMuebleFinal];
$info->txtMuebleTipoInicial=$_GET[txtMuebleTipoInicial];
$info->txtMuebleTipoFinal=$_GET[txtMuebleTipoFinal];
$info->txtMuebleModeloInicial=$_GET[txtMuebleModeloInicial];
$info->txtMuebleModeloFinal=$_GET[txtMuebleModeloFinal];
$info->chkMueblePedestal=$_GET[chkMueblePedestal];
$info->chkMuebleFija=$_GET[chkMuebleFija];
$info->chkMuebleGiratoria=$_GET[chkMuebleGiratoria];
$info->chkMuebleRodajas=$_GET[chkMuebleRodajas];
$info->chkMueblePlegable=$_GET[chkMueblePlegable];
$info->chkMuebleCajones=$_GET[chkMuebleCajones];
$info->chkMuebleGavetas=$_GET[chkMuebleGavetas];
$info->chkMuebleEntrepano=$_GET[chkMuebleEntrepano];
$info->chkMuebleSerie=$_GET[chkMuebleSerie];
$pdf->GenerarReporte($info);

?>