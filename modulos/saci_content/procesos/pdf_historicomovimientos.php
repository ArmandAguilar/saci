<?php
   include("../../../sis.php");
    include("$path/class/poolConnection.php");
    require("$path/class/fpdf/fpdf.php");

    class PDF extends FPDF
    {
    	
        protected $AnchoColumnas = array(25,40,40,60,30,81);
        protected $CabeceraTabla = array('Movimientos', 'ID_CAMBS', 'Resguradante','Nombre', 'Id Unidad', 'Descripcion');
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
            $this->Image("../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg",8,5,280);
            $this->Image("../../../logos/$Logo",8,5,20);
            $this->Image("../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg",8,190,280);
            
             // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            //$this->Cell();
            // Título
            $this->Cell(0,5,utf8_decode('Historico de Movimientos'),0, 0,'C');
            $this->Ln(5);        
            $this->Cell(0,5,'',0,0,'C');
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
                if ($i == 5){
                    $Bordes .= 'R';
                }
                $this->Cell($this->AnchoColumnas[$i],6,$this->CabeceraTabla[$i],$Bordes,0,'C');
            }
            $this->Ln();
            
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
        	$this->AddPage();
        	//$this->AnchoColumnas = array(20,40,40,20,20);
        	//$this->CabeceraTabla = array('Movimientos', 'ID_CAMBS', 'Resguradante','Nombre', 'Id Unidad', 'Descripcion');
        	
            //DAtos
        	$objGridHistorial = new poolConnection();
        	$con=$objGridHistorial->Conexion();
        	$objGridHistorial->BaseDatos();
        	$sql="SELECT
        	sa_movinventario.dFechaMovRegistro,
        	sa_movinventario.Id_CABMS,
        	sa_movinventario.Resguardante1,
        	sa_usuarios.Nombres,
        	sa_movinventario.Id_Unidad,
        	sa_unidadadmva.vDescripcion
        	FROM
        	sa_movinventario,
        	sa_usuarios,
        	sa_unidadadmva
        	Where
        	sa_movinventario.Id_ConsecutivoInv='$Id' and
        	sa_movinventario.Resguardante1=sa_usuarios.IdEmpleado  and
        	sa_movinventario.Id_Unidad=sa_unidadadmva.Id_Unidad";
        	$RSet=$objGridHistorial->Query($sql);
        	$FliexGrid = "<hr><table class=\"flexme1\">
        	<tbody>";
        	
        	while($fila=mysql_fetch_array($RSet))
        	{
        		
        	
        		$this->Cell($this->AnchoColumnas[0],6,$fila[dFechaMovRegistro],'',0,'C');
                $this->Cell($this->AnchoColumnas[1],6,$fila[Id_CABMS],'',0,'C');
                $this->Cell($this->AnchoColumnas[2],6,$fila[Resguardante1],'',0,'C');
                $this->Cell($this->AnchoColumnas[3],6,$fila[Nombres],'',0,'C');
                $this->Cell($this->AnchoColumnas[4],6,$fila[Id_Unidad],'',0,'C');
                $this->Cell($this->AnchoColumnas[5],6,$fila[vDescripcion],'',0,'C');
                $this->Ln();
        		}
        		mysql_free_result($RSet);
        		$objGridHistorial->Cerrar($con);
            
            
           
            
            $this->Output('historico_movimientios.pdf', 'I');
        }
    }

    $pdf = new PDF('L');
    
    $pdf->GenerarReporte($_GET[id]);

?>