<?php
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/Reporte_Pronostico_Consumo.php");
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
            $this->Cell(0,5,'Pronostico De Consumo',0,0,'C');
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
        function CargarDatos($AData)
        {
            $this->AnchoColumnas = array(40,85,25,25,25,25,25,25);
            $this->CabeceraTabla = array('Cambs','Descripcion','P. Consumo A.','P. Consumo B.','A. Base Ant.','A. Base','A. a Pronosticar','Mes a Pronosticar');
            $RC = new Reporte_Pronostico_Consumo();
           // $info->FechaInicial = $FechaInicial;
           // $info->FechaFinal = $FechaFinal;
            $this->DatosCatalogo = $RC->print_pdf($AData);
        }

        function GenerarReporte($AData)
        {	
            // Datos
        	
            $this->CargarDatos($AData);
            $this->AddPage();
            foreach($this->DatosCatalogo as $Dato)
            {                
            	$PCA=number_format($Dato[2], 2, '.', '');
            	$PCB=number_format($Dato[3], 2, '.', '');
                $this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[1],6,$Dato[1],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[2],6,$PCA,'', 0, 'C');
                $this->Cell($this->AnchoColumnas[3],6,$PCB,'', 0, 'C');
                $this->Cell($this->AnchoColumnas[4],6,$Dato[4],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[5],6,$Dato[5],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[6],6,$Dato[6],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[7],6,$Dato[7],'', 0, 'C');
                
                $this->Ln();
            }
            $this->Output('reporte_salidas_pdf.pdf', 'I');
        }
    }

    //$pdf = new PDF('L','mm',array(210,350));
    $pdf = new PDF('L');
    $info->txtCambsInicio=$_GET[txtCambsInicio];
    $info->txtCambsFinal=$_GET[txtCambsFinal];
    $info->cboMes=$_GET[cboMes];
    $info->cboAnio=$_GET[cboAnio];
    $info->txtAnioBase=$_GET[txtAnioBase];
    $info->chkBox01=$_GET[chkBox01];
    $info->chkBox02=$_GET[chkBox02];
    $info->chkBox03=$_GET[chkBox03];
    $info->chkBox04=$_GET[chkBox04];
    $info->chkBox05=$_GET[chkBox05];
    $info->chkBox06=$_GET[chkBox06];
    $info->chkBox07=$_GET[chkBox07];
    $info->chkBox08=$_GET[chkBox08];
    $info->chkBox09=$_GET[chkBox09];
    $info->chkBox10=$_GET[chkBox10];
    $info->chkBox11=$_GET[chkBox11];
    $info->chkBox12=$_GET[chkBox12];
    
    $pdf->GenerarReporte($info);

?>