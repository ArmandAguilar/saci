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
            $this->Cell(0,5,'de Proveedores',0,0,'C');
            // Salto de línea
            $this->SetFont('Arial','I',8);
            $this->Ln(20);
            $this->Cell(0,0,'Fecha: '.date('d/m/Y'),0, 0);
            $this->Ln();
            $this->Cell(0,6,'Hora: '.date('H:m:s'),0, 0);
            $this->Ln(10);

            $this->SetFont('Arial','',6);
            /*
            for($i=0;$i<count($this->CabeceraTabla);$i++) {
                $Bordes = 'TBL';
                if ($i == 18){
                    $Bordes .= 'R';
                }
                $this->Cell($this->AnchoColumnas[$i],6,$this->CabeceraTabla[$i],$Bordes,0,'C');
            }
            $this->Ln();
            */
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
            $this->AnchoColumnas = array(14, 8, 25, 25, 25, 10, 15, 20, 12, 10, 15, 12, 15, 15, 15, 12, 12, 12, 10);
            $this->CabeceraTabla = array('IDProveedor', 'IDGiro', 'Nombre', 'Responsable', 'Calle', 'Numero', 'Colonia', utf8_decode('Población'), 'CP', 'RFC', utf8_decode('Padrón Fed.'), 'Ced. Emp.', 'Cam. de Com.', 'Canacintra', 'CamaraRamo', 'Telefono 1', 'Telefono 2', 'Nacional', 'Fax');
            $RC = new Reporte_Catalogos();
            $this->DatosCatalogo = $RC->ObtenerArregloCatalogoProveedores();
        }

        function GenerarReporte()
        {
            // Datos
            $this->CargarDatos();
            $this->AddPage();
            foreach($this->DatosCatalogo as $Dato)
            {
                $this->Cell(15,6,'IDProveedor','T', 0);
                $this->Cell(15,6,$Dato[0],'T', 0);
                $this->Cell(15,6,'RFC','T');
                $this->Cell(80,6,$Dato[9],'T');
                $this->Cell(12,6,'Calle','T', 0);
                $this->Cell(50,6,$Dato[4],'T');
                $this->Cell(10,6,'Numero','T', 0);
                $this->Cell(15,6,$Dato[5],'T');
                $this->Cell(10,6,'Tel. 2','T', 0);
                $this->Cell(15,6,$Dato[16],'T');
                $this->Cell(12,6,'Pad. Fed.','T', 0);
                $this->Cell(15,6,$Dato[10],'T');
                $this->Cell(18,6,'Cam. de Com.','T', 0);
                $this->Ln();
                $this->Cell(15,6,'IDGrio','');
                $this->Cell(15,6,$Dato[1],'');
                $this->Cell(15,6,'Nombre','');
                $this->Cell(80,6,$Dato[2],'');
                $this->Cell(12,6,'Colonia','');
                $this->Cell(50,6,$Dato[6],'');
                $this->Cell(10,6,'CP','', 0);
                $this->Cell(15,6,$Dato[8],'');
                $this->Cell(10,6,'Nacional','', 0);
                $this->Cell(15,6,$Dato[17],'');
                $this->Cell(12,6,'Ced. Emp.','', 0);
                $this->Cell(15,6,$Dato[16],'');
                $this->Cell(18,6,$Dato[12],'');
                $this->Ln();
                $this->Cell(10,6,'','B');
                $this->Cell(20,6,'','B');
                $this->Cell(15,6,'Responsable','B');
                $this->Cell(80,6,$Dato[3],'B');
                $this->Cell(12,6,utf8_decode('Población'),'B');
                $this->Cell(50,6,$Dato[7],'B');
                $this->Cell(10,6,'Tel. 1','B', 0);
                $this->Cell(15,6,$Dato[15],'B');
                $this->Cell(10,6,'Fax   ','B', 0);
                $this->Cell(15,6,$Dato[18],'B');
                $this->Cell(12,6,'Canacintra.','B', 0);
                $this->Cell(15,6,$Dato[13],'B');
                $this->Cell(18,6,'','B');
                /*
                $this->Cell($this->AnchoColumnas[2],6,$Dato[2],'',0,'C');
                $this->Cell($this->AnchoColumnas[3],6,$Dato[3],'',0, 'C');
                $this->Cell($this->AnchoColumnas[4],6,$Dato[4],'',0,'C');
                $this->Cell($this->AnchoColumnas[5],6,$Dato[5],'',0,'C');
                $this->Cell($this->AnchoColumnas[6],6,$Dato[6],'',0,'C');
                $this->Cell($this->AnchoColumnas[7],6,$Dato[7],'',0,'C');
                $this->Cell($this->AnchoColumnas[8],6,$Dato[8],'',0,'C');
                $this->Cell($this->AnchoColumnas[9],6,$Dato[9],'',0,'C');
                $this->Cell($this->AnchoColumnas[10],6,$Dato[10],'',0,'C');
                $this->Cell($this->AnchoColumnas[11],6,$Dato[11],'',0,'C');
                $this->Cell($this->AnchoColumnas[12],6,$Dato[12],'',0,'C');
                $this->Cell($this->AnchoColumnas[13],6,$Dato[13],'',0,'C');
                $this->Cell($this->AnchoColumnas[14],6,$Dato[14],'',0,'C');
                $this->Cell($this->AnchoColumnas[15],6,$Dato[15],'',0,'C');
                $this->Cell($this->AnchoColumnas[16],6,$Dato[16],'',0,'C');
                $this->Cell($this->AnchoColumnas[17],6,$Dato[17],'',0,'C');
                $this->Cell($this->AnchoColumnas[18],6,$Dato[18],'',0,'C');
                 */
                $this->Ln();
            }
            $this->Output('reporte_catalogo_proveedores.pdf', 'I');
        }
    }

    $pdf = new PDF('L');
    $pdf->GenerarReporte();
?>