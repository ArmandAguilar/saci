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
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,280);
            $this->Image("../../../../logos/$Logo",8,5,20);
            $this->Image("../../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg",8,190,280);
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            //$this->Cell();
            // Título
            $this->Cell(0,5,utf8_decode('Reporte de Catálogo'),0, 0,'C');
            $this->Ln(5);        
            $this->Cell(0,5,'de Unidades de Medida',0,0,'C');
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
                if ($i == 1){
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
            $this->AnchoColumnas = array(30, 245);
            $this->CabeceraTabla = array('IDUnidadMedida', utf8_decode('Descripción'));
            $RC = new Reporte_Catalogos();
            $this->DatosCatalogo = $RC->ObtenerArregloCatalogoUnidadesMedida();
        }

        function GenerarReporte()
        {
            // Datos
            $this->CargarDatos();
            $this->AddPage();
            foreach($this->DatosCatalogo as $Dato)
            {
                //$this->Cell(10);
                $this->Cell($this->AnchoColumnas[0],6,$Dato[0],'', 0, 'C');
                $this->Cell($this->AnchoColumnas[1],6,$Dato[1],'');
                $this->Ln();
            }
            $this->Output('reporte_catalogo_unidades_de_medida.pdf', 'I');
        }
    }

    $pdf = new PDF('L');
    $pdf->GenerarReporte();
?>