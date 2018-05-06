<?php
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/Reporte_Consumible_Salida.php");
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
            $this->Cell(0,5,'De Salidas',0,0,'C');
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
        function CargarDatos($FechaInicial,$FechaFinal)
        {
            $this->AnchoColumnas = array(20,20,20,40,25,20,20,20,20,30,40);
            $this->CabeceraTabla = array('Fecha','No.Folio','Documento','U. Administrativa','P.Presupuestal','Cve. CAMBS','Cantidad','Costo Unitario','Importe','Num. Pedido','Cabms');
            $RC = new Reporte_Consumible_Salida();
            $info->FechaInicial = $FechaInicial;
            $info->FechaFinal = $FechaFinal;
            $this->DatosCatalogo = $RC->print_pdf($info);
        }

        function GenerarReporte($FechaInicial,$FechaFinal)
        {	
            // Datos
        	
            $this->CargarDatos($FechaInicial,$FechaFinal);
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
            $this->Output('reporte_salidas_pdf.pdf', 'I');
        }
    }

    //$pdf = new PDF('L','mm',array(210,350));
    $pdf = new PDF('L');
    $ArrayInicio = split("/",$_GET[v2]);
    $ArrayFinal = split("/",$_GET[v3]);
    $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
    $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
    $pdf->GenerarReporte($FechaInicio,$FechaFinal);

?>