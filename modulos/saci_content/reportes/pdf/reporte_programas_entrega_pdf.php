<?php
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/reporte_de_programas_de_entrega.php");
    require("$path/class/fpdf/fpdf.php");

    class PDF extends FPDF
    {
        protected $AnchoColumnas;// = array(30, 245);
        protected $CabeceraTabla;// = array('IDUnidadMedida', utf8_decode('Descripción'));
        protected $DatosReporte;

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
            $this->Cell(0,5,utf8_decode('REPORTE DE SOLICITUDES DE ARTICULOS DE OFICINA Y LIMPIEZA'),0, 0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','B',10);
            $this->Cell(0,5,'Programas de Entrega',0,0,'C');
            // Salto de línea
            $this->SetFont('Arial','I',8);
            $this->Ln(20);
            $this->Cell(0,0,'Fecha: '.date('d/m/Y'),0, 0);
            $this->Ln();
            $this->Cell(0,6,'Hora: '.date('H:m:s'),0, 0);
            $this->Ln(10);

            $this->SetFont('Arial','',8);
            for($i=0;$i<count($this->CabeceraTabla);$i++) {
                $Bordes = 'TBL';
                if ($i == 6){
                    $Bordes .= 'R';
                }
                $this->Cell($this->AnchoColumnas[$i],6,$this->CabeceraTabla[$i],$Bordes,0,'C');
            }
            $this->Ln();
        }    

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
        }

        // Cargar los datos
        function CargarDatos()
        {
            $this->AnchoColumnas = array(10, 160, 20, 20, 20, 25, 20);
            $this->CabeceraTabla = array('No.', 'Oficna Administrativa', 'No. Empleado', 'Oportuno', 'N/Cumple', 'Nota de Cargo', 'Fecha');
            $RPE = new Reporte_Programas_Entrega();
            $Mes = $_GET["mes"];           
            $Orden = $_GET["orden"];
            $this->DatosReporte = $RPE->ObtenerReporte($Mes, $Orden);
            /*
            foreach($this->DatosReporte as $Dato)
            {
                echo $Dato->Zona." | ";
                echo $Dato->Unidad_Administrativa." | ";
                echo $Dato->Numero_Empleado." | ";
                echo $Dato->Fecha_Registro_Inicial." | ";
                echo $Dato->Fecha_Registro_Final." | ";
                echo $Dato->Folio." | ";
                echo $Dato->Fecha_Registro."<br/>";
            }
            echo json_encode($this->DatosReporte);
             * 
             */
        }

        function GenerarReporte()
        {
            // Datos
            $this->CargarDatos();
            $this->AddPage();
            $Zona = "";
            foreach($this->DatosReporte as $Dato)
            {
                if ($Zona != $Dato->Zona) {
            $this->SetFont('Arial','B',10);
                    $this->Cell($this->AnchoColumnas[1],6,$Dato->Zona,'', 0, 'C');
                    $Zona = $Dato->Zona;
                } else {
                    $this->SetFont('Arial','',8);
                    $this->Cell($this->AnchoColumnas[0],6,$Dato->Prioridad,'', 0, 'C');
                    $this->Cell($this->AnchoColumnas[1],6,$Dato->Unidad_Administrativa,'', 'C');
                    $this->Cell($this->AnchoColumnas[2],6,$Dato->Numero_Empleado,'',0,'C');
                    $this->Cell($this->AnchoColumnas[3],6,$Dato->Fecha_Registro_Inicial,'',0, 'C');
                    $this->Cell($this->AnchoColumnas[4],6,$Dato->Fecha_Registro_Final,'',0,'C');
                    $this->Cell($this->AnchoColumnas[5],6,$Dato->Folio,'',0,'C');
                    $this->Cell($this->AnchoColumnas[6],6,$Dato->Fecha_Registro,'',0,'C');
                }
                $this->Ln();
            }
            
            $this->Output('reporte_programas_entrega.pdf', 'I');
        }
    }

    $pdf = new PDF('L');
    $pdf->GenerarReporte();
?>