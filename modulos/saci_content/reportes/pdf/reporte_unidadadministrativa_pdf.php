<?php
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Catalogos.php");
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
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,445);
            $this->Image("../../../../logos/$Logo",8,5,20);
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg",8,190,445);
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            //$this->Cell();
            // Título
            $this->Cell(0,5,utf8_decode('Reporte de Catalogo'),0, 0,'C');
            $this->Ln(5);        
            $this->Cell(0,5,'de Unidada Administrativa',0,0,'C');
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
                if ($i == 1 || $i == 14){
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
            $this->AnchoColumnas = array(15,30,15,120,60,20,50,30,15,25,25,10);
            $this->CabeceraTabla = array('IDUMedida','Resposable Area','Zona','Decripcion','Calle','Numero','Colonia','Problacion','CP','Telefono','Fax','Folio');
            $RC = new Reporte_Catalogos();
            $this->DatosCatalogo = $RC->ObtenerArregloCatalogoUnidadAdministrativa();
        }

        function GenerarReporte()
        {
            // Datos
            $this->CargarDatos();
            $this->AddPage();
            foreach($this->DatosCatalogo as $Dato)
            {
                //$this->Cell(10);
                
                $this->Cell($this->AnchoColumnas[0],6,$Dato[1],'',0,'C');
                $this->Cell($this->AnchoColumnas[1],6,$Dato[2],'',0,'C');
                $this->Cell($this->AnchoColumnas[2],6,$Dato[3],'',0, 'C');
                $this->Cell($this->AnchoColumnas[3],6,$Dato[4],'',0, 'L');
                $this->Cell($this->AnchoColumnas[4],6,$Dato[5],'',0, 'L');
                $this->Cell($this->AnchoColumnas[5],6,$Dato[6],'',0, 'L');
                $this->Cell($this->AnchoColumnas[6],6,$Dato[7],'',0, 'L');
                $this->Cell($this->AnchoColumnas[7],6,$Dato[8],'',0, 'L');
                $this->Cell($this->AnchoColumnas[8],6,$Dato[9],'',0, 'C');
                $this->Cell($this->AnchoColumnas[9],6,$Dato[10],'',0, 'C');
                $this->Cell($this->AnchoColumnas[10],6,$Dato[11],'',0, 'C');
                $this->Cell($this->AnchoColumnas[11],6,$Dato[12],'',0, 'C');
                
                $this->Ln();
            }
            $this->Output('reporte_catalogo_unidadadministrativa.pdf', 'I');
        }
    }
    $pdf = new PDF('L','mm',array(210,445));
    //$pdf = new PDF('L');
    $pdf->GenerarReporte();
?>
