<?php
   include("../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Factura.php");
    //include("$path/class/Importe.php");
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
            $this->Image("../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,195,20);
            $this->Image("../../../logos/$Logo",8,5,20);
            
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            //$this->Cell();
            // Título
            $this->Cell(0,5,utf8_decode('SECRETARIA DE EDUCACION PUBLICA'),0, 0,'C');
            $this->Ln(5);        
            $this->Cell(0,5,'GOBIERNO DEL  DISTRITO FEDERAL ',0,0,'C');
            // Salto de línea
            $this->SetFont('Arial','I',8);
            $this->Ln(20);
            $this->Cell(0,0,'Fecha: '.date('d/m/Y'),0, 0);
            $this->Ln();
            $this->Cell(0,6,'Hora: '.date('H:m:s'),0, 0);
            $this->Ln(10);
            
            
        }    

        // Pie de página
        function Footer()
        {
            // Posici&pn: a 1,5 cm del final
            //$this->SetY(-15);
            // Arial italic 8
            //$this->SetFont('Arial','I',8);
            // Número de página
            //$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
        }

        function GenerarReporte($Id)
        {
        	
            //DAtos
            $objGridFacturas = new poolConnection();
            $con=$objGridFacturas->Conexion();
            $objGridFacturas->BaseDatos();
            $sql="SELECT Id_Folio, 
                     Id_Pedido,
                     dFechaAlta,
                     vNoRemisionFactura,
                     mImporte,
                     Id_Proveedor
                     FROM sa_contrarecibo Where Id_Folio='$Id'";
                $RSet=$objGridFacturas->Query($sql);
        
            while($fila=mysql_fetch_array($RSet))
            {
                $Id_Pedido = $fila[Id_Pedido];    
                $dFechaAlta=$fila[dFechaAlta];
                $vNoRemisionFactura=$fila[vNoRemisionFactura];
                $mImporte=$fila[mImporte];
                $mImporte2=$fila[mImporte];
                $Id_Proveedor = $fila[Id_Proveedor];
                
            }
            mysql_free_result($RSet);
            $objGridFacturas->Cerrar($con);
            $mImporte = number_format($mImporte,2,'.',',');
            
            
            
            $objProveedor = new Factura();
            $Proveedor = $objProveedor->getProveedor($Id_Proveedor);
            
            //$objImporte =  new Importe();
            //$Letra = $objImporte->num2letras($mImporte2);
            
            
            $this->AddPage();
            $this->SetFont('Arial','B',12);
            $this->Cell(0,6,'Folio : '. $Id ,0, 0);
            $this->Ln();
            $this->Cell(0,6,'Fecha : '. $dFechaAlta,0, 0);
            $this->Ln();
            $this->Cell(0,6,'Pedido : '.$Id_Pedido,0, 0);
            $this->Ln();
            $this->Cell(0,6,'Proveedor : '. $Proveedor,0, 0);
            $this->Ln();
            $this->Cell(0,6,'Factura : '.$vNoRemisionFactura,0, 0);
            $this->Ln();
            $this->Cell(0,6,'Importe : $'.$mImporte,0, 0);
            $this->Ln();
            $this->Cell(0,6,'('. $Letra .')',0, 0);
            $this->Ln();
            /*foreach($this->DatosCatalogo as $Dato)
            {
                
                $this->Cell($this->AnchoColumnas[0],6,$Dato[0],'',0,'C');
                $this->Cell($this->AnchoColumnas[1],6,$Dato[1],'');
                $this->Cell($this->AnchoColumnas[2],6,$Dato[2],'');
                $this->Cell($this->AnchoColumnas[3],6,$Dato[3],'',0,'C');
                $this->Cell($this->AnchoColumnas[4],6,$Dato[4],'',0,'C');
                $this->Cell($this->AnchoColumnas[5],6,$Dato[5],'');
                $this->Ln();
            }*/
            
            $this->Output('recibo_.pdf', 'I');
        }
    }

    $pdf = new PDF('P');
    
    $pdf->GenerarReporte($_GET[id]);

?>
