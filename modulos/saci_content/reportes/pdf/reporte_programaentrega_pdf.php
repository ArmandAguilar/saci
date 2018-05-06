<?php
    include("../../../../sis.php");
    include($path."/class/poolConnection.inic");
    include($path."/class/reporte_de_programas_de_entrega.php");
    require($path."/class/fpdf/fpdf.php");

    class PDF extends FPDF
    {
        protected $AnchoColumnas;// = array(30, 245);
        protected $CabeceraTabla;// = array('IDUnidadMedida', utf8_decode('Descripcion'));
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
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,335);
            $this->Image("../../../../logos/$Logo",8,5,20);
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg",8,190,335);
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            //$this->Cell();
            // Título
            $this->Cell(0,5,utf8_decode('Reporte'),0, 0,'C');
            $this->Ln(5);        
            $this->Cell(0,5,'Programa de Entrega',0,0,'C');
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
        function CargarDatos($v1,$v2)
        {
            $this->AnchoColumnas = array(40,20,90,20,25,23,23,23,20,30,20);
            $this->CabeceraTabla = array('Zona','Prioridad','U. Administrativas','No. Empleado','Unidad','Fecha Inicial','Fecha Final','Fecha Registro','Folio','Mes','A�o');
            $RC = new Reporte_Programas_Entrega();
            $this->DatosCatalogo = $RC->print_pdf($v1,$v2);
            
        }

        function GenerarReporte($v1,$v2)
        {	
            // Datos
        	
            $this->CargarDatos($v1,$v2);
            $this->AddPage();
            foreach($this->DatosCatalogo as $Dato)
            {                
                $this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[1],6,$Dato[1],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[2],6,$Dato[2],'');
                $this->Cell($this->AnchoColumnas[3],6,$Dato[3],'', 0, 'R');
                $this->Cell($this->AnchoColumnas[4],6,$Dato[4],'', 0, 'R');
                $this->Cell($this->AnchoColumnas[5],6,$Dato[5],'');
                $this->Cell($this->AnchoColumnas[6],6,$Dato[6],'');
                $this->Cell($this->AnchoColumnas[7],6,$Dato[7],'');
                $this->Cell($this->AnchoColumnas[8],6,$Dato[8],'');
                $this->Cell($this->AnchoColumnas[9],6,$Dato[9],'');
                $this->Cell($this->AnchoColumnas[10],6,$Dato[10],'');
                $this->Ln();
            }
            $this->Output('reporte_programas_entregas_pdf.pdf', 'I');
        }
    }

    //$pdf = new PDF('L','mm',array(210,350));
    $pdf = new PDF('L','mm',array(210,350));
    $pdf->GenerarReporte($_GET[v1],$_GET[v2]);

?>