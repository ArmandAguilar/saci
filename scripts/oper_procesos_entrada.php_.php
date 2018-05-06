<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Entradas.php");
    $objEntrada = new Entradas();
    switch ($_GET[o])
     {
	     	case '1':
	     		        echo $objEntrada->load_form();
	     		    break;
	     	case '2':
	     			     $info->Patron = $_POST[Patron];
	     			     $info->Folio = $_POST[txtFolio];
	     			     $info->Descripcion = $_POST[txtDescipcion];
	     			    echo $objEntrada->buscar_pedido($info);
	     			  
	     	        break;
	     	case '3':
	     		     $info->id=$_POST[id];
	     		     echo $objEntrada->detalle_pedido($info);    
	     	         break;
	     	 case '4':
	     	 	        echo $objEntrada->Detalles();
	     	         break;
     }
?>