<?php

    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Pronostico_Consumo.php");
    $obj = new Reporte_Pronostico_Consumo();
     switch ($_GET[o])
      {
          case '1':
	          	$info->Patron=$_POST[txtPatron];
	          	$info->Clave=$_POST[Clave];
	          	$info->Descripcion=$_POST[Descripcion];
	          	echo $obj ->buscar_cambs1($info);
        	break;
        case '2':
	        	$info->Patron=$_POST[txtPatron];
	        	$info->Clave=$_POST[Clave];
	        	$info->Descripcion=$_POST[Descripcion];
	        	echo $obj ->buscar_cambs2($info);
        	break;
        case '3':
        	
		        	 $info->txtCambsInicio=$_POST[txtCambsInicio];
			         $info->txtCambsFinal=$_POST[txtCambsFinal];
			         $info->cboMes=$_POST[cboMes];
			         $info->cboAnio=$_POST[cboAnio];
			         $info->txtAnioBase=$_POST[txtAnioBase];
			         $info->chkBox01=$_POST[chkBox01];
			         $info->chkBox02=$_POST[chkBox02];
			         $info->chkBox03=$_POST[chkBox03];
			         $info->chkBox04=$_POST[chkBox04];
			         $info->chkBox05=$_POST[chkBox05];
			         $info->chkBox06=$_POST[chkBox06];
			         $info->chkBox07=$_POST[chkBox07];
			         $info->chkBox08=$_POST[chkBox08];
			         $info->chkBox09=$_POST[chkBox09];
			         $info->chkBox10=$_POST[chkBox10];
			         $info->chkBox11=$_POST[chkBox11];
			         $info->chkBox12=$_POST[chkBox12];
  	      			$foot = $obj->generar_reporte($info);
  	      			/*$foot.="       </tbody>
  	      			</table><script>$('.flexme2').flexigrid({
  	      			title: '',
  	      			colModel : [
  	      			
  	      			{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
  	      			{display: 'Descripcion', name : 'Descripcion', width :200, sortable :false, align: 'center'},
  	      			{display: 'P. Consumo A', name : 'Pronostico Consumo A', width :80, sortable :false, align: 'center'},
  	      			{display: 'P. Consumo B', name : 'Pronostico Consumo B', width :80, sortable :false, align: 'center'},
  	      			{display: 'A&ntilde;o Base Ant.', name : 'Anio Base Anterior', width :80, sortable :false, align: 'center'},
  	      			{display: 'A&ntilde;o Base', name : 'Anio Base', width :120, sortable :false, align: 'center'},
  	      			{display: 'A&ntilde;o a Pro.', name : 'A&ntilde;o a Pro.', width :80, sortable :false, align: 'center'},
  	      			{display: 'Mes a Pro.', name : 'Mes a Pro.', width :80, sortable :false, align: 'center'}
  	      			
  	      			],
  	      			buttons : [
  	      			{name: '',onpress:saver_Order},
  	      			{separator: true}
  	      			],
  	      			width: 740,
  	      			height: 250
  	      			}
  	      			
  	      			);</script></form>";*/
					echo $foot;
        	break;
     } 	
        	
?>