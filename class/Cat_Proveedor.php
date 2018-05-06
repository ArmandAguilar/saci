<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Proveedor
 *
 * @author armand
 */
class Cat_Proveedor {
    
 public function frm_add_proveedor()
    {
            $objCboGiro = new poolConnection();
           $con=$objCboGiro->Conexion();
           $objCboGiro->BaseDatos($con);
           $sql="SELECT * FROM sa_giro order by vDescripcionGR";
           $RSet=$objCboGiro->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               $cboGiro .= "<option value='$fila[Id_Giro]'>$fila[vDescripcionGR]</option>";
           }
           $objCboGiro->Cerrar($con,$RSet);
        $frm="<form  id='frmAddProvedor' name='frmAddProvedor' mathod='post'><center>
        <br><br>
            <div id=\"tabs\" class=\"tabs-bottom\" style=\"width: 800px;\">
                <ul>
                    <li><a href=\"#tabs-1\">Parte 1</a></li>
                    <li><a href=\"#tabs-2\">Parte 2</a></li>
                    <li><a href=\"#tabs-3\">Parte 3</a></li>
                </ul>
                <div class=\"tabs-spacer\"></div>
                <div id=\"tabs-1\">
                        <table>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Codigo:</td>
                                <td><input  type=\"text\" id=\"txtCodigo\"  name=\"txtCodigo\" class=\"boxes_form150px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Proveedor:</td>
                                <td><input  type=\"text\" id=\"txtProveedor\"  name=\"txtProveedor\" class=\"boxes_form200px validate[required,minSize[5]]\" /></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Giro:</td>
                                <td>
                                    <select name='cboGiro' id='cboGiro' class=\"validate[required]\">
                                        <option value=\"\"></option>
                                        $cboGiro
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Respon.:</div></td>
                                <td><input  type=\"text\" id=\"txtRespon\"  name=\"txtRespon\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Calle:</div></td>
                                <td><input  type=\"text\" id=\"txtCalle\"  name=\"txtCalle\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Numero:</div></td>
                                <td><input  type=\"text\" id=\"txtNumero\"  name=\"txtNumero\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Colonia:</div></td>
                                <td><input  type=\"text\" id=\"txtColonia\"  name=\"txtColonia\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Poblacion:</div></td>
                                <td><input  type=\"text\" id=\"txtPoblacion\"  name=\"txtPoblacion\" class=\"boxes_form200px\"/></td>
                            </tr> 
                        </table>
                </div>
                <div id=\"tabs-2\">
                    <table>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >C.P.:</div></td>
                                <td><input  type=\"text\" id=\"txtCP\"  name=\"txtCP\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >R.F.C:</div></td>
                                <td><input  type=\"text\" id=\"txtRFC\"  name=\"txtRFC\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >Padron:</div></td>
                                <td><input  type=\"text\" id=\"txtPadron\"  name=\"txtPadron\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Cedula de Emp.:</div></td>
                                <td><input  type=\"text\" id=\"txtCedulaEmp\"  name=\"txtCedulaEmp\" class=\"boxes_form200px\"/></td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >Camara de Com.:</div></td>
                                <td><input  type=\"text\" id=\"txtCamaraCom\"  name=\"txtCamaraCom\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Canacintra:</div></td>
                                <td><input  type=\"text\" id=\"txtCanacintra\"  name=\"txtCanacintra\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Camara del Ramo:</div></td>
                                <td><input  type=\"text\" id=\"txtCamaraRamo\"  name=\"txtCamaraRamo\" class=\"boxes_form200px\"/></td>
                            </tr>
                    </table>
                </div>
                <div id=\"tabs-3\">
                    <table>
                        
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Telefono 1:</div></td>
                                <td><input  type=\"text\" id=\"txtTelefono1\"  name=\"txtTelefono1\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Telefono 2:</div></td>
                                <td><input  type=\"text\" id=\"txtTelefono2\"  name=\"txtTelefono2\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Email:</div></td>
                                <td><input  type=\"text\" id=\"txtFax\"  name=\"txtFax\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Nacionalidad Mex.:</div></td>
                                <td><input  type=\"text\" id=\"txtNacionalidad\"  name=\"txtNacionalidad\" class=\"boxes_form200px\"/></td>
                            </tr>
                    </table>
                    <br>
                    <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_proveedor();\" style=\"cursor:pointer\"/>
                </div>
            </div> 
            <script>
                $(function() {
                    $(\"#tabs\").tabs();

                    // fix the classes
                    $(\".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav >*\")
                        .removeClass(\"ui-corner-all ui-corner-top\")
                        .addClass(\"ui-corner-bottom\");

                    // move the nav to the bottom
                    $(\".tabs-bottom .ui-tabs-nav\").appendTo(\".tabs-bottom\");
                });
                jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddProvedor\").validationEngine();
		});

		
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}
                        
		}
         </script>
           </center>
           </form>
           ";
        return $frm;
    }
    public function nuevo_proveedor($AData)
    {
        $txtCodigo=$AData->txtCodigo;
        $txtProveedor=$AData->txtProveedor;
        $cboGiro=$AData->cboGiro;
        $txtRespon=$AData->txtRespon;
        $txtCalle=$AData->txtCalle;
        $txtNumero=$AData->txtNumero;
        $txtColonia=$AData->txtColonia;
        $txtPoblacion=$AData->txtPoblacion;
        $txtCP=$AData->txtCP;
        $txtRFC=$AData->txtRFC;
        $txtPadron=$AData->txtPadron;
        $txtCedulaEmp=$AData->txtCedulaEmp;
        $txtCamaraCom=$AData->txtCamaraCom;
        $txtCanacintra=$AData->txtCanacintra;
        $txtCamaraRamo=$AData->txtCamaraRamo;
        $txtTelefono1=$AData->txtTelefono1;
        $txtTelefono2=$AData->txtTelefono2;
        $txtFax=$AData->txtFax;
        $txtNacionalidad=$AData->txtNacionalidad;
        $sql="insert into sa_proveedor values
            ('0',
              '$txtCodigo',
              '$cboGiro',
              '$txtProveedor',
              '$txtRespon',
              '$txtCalle',
              '$txtNumero',
              '$txtColonia',
              '$txtPoblacion',
              '$txtCP',
              '$txtRFC',
              '$txtPadron',
              '$txtCedulaEmp',
              '$txtCamaraCom',
              '$txtCanacintra',
              '$txtCamaraRamo',
              '$txtTelefono1',
              '$txtTelefono2',
              '$txtNacionalidad',
              '$txtFax'
              )";
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
        return $sql;
    } 
    public function fmr_buscar_proveedor()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Proveedor</div></td>
                            <td><input  type=\"text\" id=\"txtProveedor\"  name=\"txtProveedor\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
        <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;
        
    } 
    public function frm_editar_proveedor($id)
    {
        
        
                    $objData = new poolConnection();
                    $con=$objData->Conexion();
                    $objData->BaseDatos($con);
                    $sql2="Select Id_Proveedor,
                        Id_Giro,
                        vNombre,
                        vResponsable,
                        vCalle,vNumero,
                        Colonia,vPoblacion,
                        vCP,
                        cRFC,
                        cPadronFedProv,
                        cCedulaEmpadr,
                        cCamaraComercio,
                        cCanacintra,
                        cCamaraRamo,
                        vTelefono1,
                        vTelefono2,
                        bNacional,
                        vTelFax 
                        from sa_proveedor where Id='$id'";
                    $Rset=$objData->Query($con,$sql2);
                    while($fila=  mysql_fetch_array($Rset))
                    {
                        $Id_Proveedor=$fila[Id_Proveedor];
                        $Id_Giro=$fila[Id_Giro];
                        $vNombre=$fila[vNombre];
                        $vResponsable=$fila[vResponsable];
                        $vCalle=$fila[vCalle];
                        $vNumero=$fila[vNumero];
                        $Colonia=$fila[Colonia];
                        $vPoblacion=$fila[vPoblacion];
                        $vCP=$fila[vCP];
                        $cRFC=$fila[cRFC];
                        $cPadronFedProv=$fila[cPadronFedProv];
                        $cCedulaEmpadr=$fila[cCedulaEmpadr];
                        $cCamaraComercio=$fila[cCamaraComercio];
                        $cCanacintra=$fila[cCanacintra];
                        $cCamaraRamo=$fila[cCamaraRamo];
                        $vTelefono1=$fila[vTelefono1];
                        $vTelefono2=$fila[vTelefono2];
                        $bNacional=$fila[bNacional];
                        $vTelFax=$fila[vTelFax];
                    }
                    $objData->Cerrar($con,$Rset);
        

                   $objCboGiro = new poolConnection();
                   $con=$objCboGiro->Conexion();
                   $objCboGiro->BaseDatos($con);
                   $sql="SELECT * FROM sa_giro order by vDescripcionGR";
                   $RSet=$objCboGiro->Query($con,$sql);
                   while($fila=  mysqli_fetch_array($RSet))
                   {
                      if($Id_Giro==$fila[Id_Giro])
                      {
                         $cboGiro .= "<option value='$fila[Id_Giro]' selected>$fila[vDescripcionGR]</option>"; 
                          
                      } 
                      else
                      {
                          $cboGiro .= "<option value='$fila[Id_Giro]'>$fila[vDescripcionGR]</option>";  
                      }
                       
                   }
                   $objCboGiro->Cerrar($con,$RSet);
                            $frm="<form  id='frmEditProvedor' name='frmEditProvedor' mathod='post'><center>
                            <br><br>
                                <div id=\"tabs\" class=\"tabs-bottom\" style=\"width: 800px;\">
                                    <ul>
                                        <li><a href=\"#tabs-1\">Parte 1</a></li>
                                        <li><a href=\"#tabs-2\">Parte 2</a></li>
                                        <li><a href=\"#tabs-3\">Parte 3</a></li>
                                    </ul>
                                    <div class=\"tabs-spacer\"></div>
                                    <div id=\"tabs-1\">
                                            <table>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Codigo:</td>
                                                    <td><input  type=\"text\" id=\"txtCodigoE\"  name=\"txtCodigoE\" value='$Id_Proveedor' class=\"boxes_form150px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Proveedor:</td>
                                                    <td><input  type=\"text\" id=\"txtProveedorE\"  name=\"txtProveedorE\"  value='$vNombre' class=\"boxes_form200px validate[required,minSize[5]]\" /></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Giro:</td>
                                                    <td>
                                                        <select name='cboGiroE' id='cboGiroE' class=\"validate[required]\">
                                                            <option value=\"\"></option>
                                                            $cboGiro
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Respon.:</div></td>
                                                    <td><input  type=\"text\" id=\"txtResponE\"  name=\"txtResponE\" value='$vResponsable' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Calle:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCalleE\"  name=\"txtCalleE\" value='$vCalle' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Numero:</div></td>
                                                    <td><input  type=\"text\" id=\"txtNumeroE\"  name=\"txtNumeroE\" value='$vNumero' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Colonia:</div></td>
                                                    <td><input  type=\"text\" id=\"txtColoniaE\"  name=\"txtColoniaE\" value='$Colonia' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Poblacion:</div></td>
                                                    <td><input  type=\"text\" id=\"txtPoblacionE\"  name=\"txtPoblacionE\" value='$vPoblacion' class=\"boxes_form200px\"/></td>
                                                </tr> 
                                            </table>
                                    </div>
                                    <div id=\"tabs-2\">
                                        <table>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >C.P.:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCPE\"  name=\"txtCPE\" value='$vCP' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >R.F.C:</div></td>
                                                    <td><input  type=\"text\" id=\"txtRFCE\"  name=\"txtRFCE\" value='$cRFC' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                 <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Padron:</div></td>
                                                    <td><input  type=\"text\" id=\"txtPadronE\"  name=\"txtPadronE\" value='$cPadronFedProv' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Cedula de Emp.:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCedulaEmpE\"  name=\"txtCedulaEmpE\" value='$cCedulaEmpadr' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                 <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Camara de Com.:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCamaraComE\"  name=\"txtCamaraComE\" value='$cCamaraComercio' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Canacintra:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCanacintraE\"  name=\"txtCanacintraE\" value='$cCanacintra' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Camara del Ramo:</div></td>
                                                    <td><input  type=\"text\" id=\"txtCamaraRamoE\"  name=\"txtCamaraRamoE\" value='$cCamaraRamo' class=\"boxes_form200px\"/></td>
                                                </tr>
                                        </table>
                                    </div>
                                    <div id=\"tabs-3\">
                                        <table>

                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Telefono 1:</div></td>
                                                    <td><input  type=\"text\" id=\"txtTelefono1E\"  name=\"txtTelefono1E\" value='$vTelefono1' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Telefono 2:</div></td>
                                                    <td><input  type=\"text\" id=\"txtTelefono2E\"  name=\"txtTelefono2E\" value='$vTelefono2' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Fax:</div></td>
                                                    <td><input  type=\"text\" id=\"txtFaxE\"  name=\"txtFaxE\" value='$vTelFax' class=\"boxes_form200px\"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class=\"txt_titulos_bold\" >Nacionalidad Mex.:</div></td>
                                                    <td><input  type=\"text\" id=\"txtNacionalidadE\"  name=\"txtNacionalidadE\" value='$bNacional' class=\"boxes_form200px\"/></td>
                                                </tr>
                                        </table>
                                        <br>
                                        <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion_Giro($id);\" style=\"cursor:pointer\"/>
                                    </div>
                                </div> 
                               </center>
                               </form>
                               <script>
                                    $(function() {
                                        $(\"#tabs\").tabs();

                                        // fix the classes
                                        $(\".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav >*\")
                                            .removeClass(\"ui-corner-all ui-corner-top\")
                                            .addClass(\"ui-corner-bottom\");

                                        // move the nav to the bottom
                                        $(\".tabs-bottom .ui-tabs-nav\").appendTo(\".tabs-bottom\");
                                    });
                                    jQuery(document).ready(function(){
                                            // binds form submission and fields to the validation engine
                                            jQuery(\"#frmEditProvedor\").validationEngine();
                                    });


                                    function checkHELLO(field, rules, i, options){
                                            if (field.val() != \"HELLO\") {
                                                    // this allows to use i18 for the error msgs
                                                    return options.allrules.validate2fields.alertText;

                                            }

                                    }
                             </script>";
                            return $frm;
    }
 function editar_proveedor($AData)
    {
        
        $txtCodigo=$AData->txtCodigo;
        $txtProveedor=$AData->txtProveedor;
        $cboGiro=$AData->cboGiro;
        $txtRespon=$AData->txtRespon;
        $txtCalle=$AData->txtCalle;
        $txtNumero=$AData->txtNumero;
        $txtColonia=$AData->txtColonia;
        $txtPoblacion=$AData->txtPoblacion;
        $txtCP=$AData->txtCP;
        $txtRFC=$AData->txtRFC;
        $txtPadron=$AData->txtPadron;
        $txtCedulaEmp=$AData->txtCedulaEmp;
        $txtCamaraCom=$AData->txtCamaraCom;
        $txtCanacintra=$AData->txtCanacintra;
        $txtCamaraRamo=$AData->txtCamaraRamo;
        $txtTelefono1=$AData->txtTelefono1;
        $txtTelefono2=$AData->txtTelefono2;
        $txtFax=$AData->txtFax;
        $txtNacionalidad=$AData->txtNacionalidad;
        $id=$AData->id;
        $sql="update sa_proveedor set
               Id_Proveedor='$txtCodigo',
                Id_Giro='$cboGiro',
                vNombre='$txtProveedor',
                vResponsable='$txtRespon',
                vCalle='$txtCalle',
                vNumero='$txtNumero',
                Colonia='$txtColonia',
                vPoblacion='$txtPoblacion',
                vCP='$txtCP',
                cRFC='$txtRFC',
                cPadronFedProv='$txtPadron',
                cCedulaEmpadr='$txtCedulaEmp',
                cCamaraComercio='$txtCamaraCom',
                cCanacintra='$txtCanacintra',
                cCamaraRamo='$txtCamaraRamo',
                vTelefono1='$txtTelefono1',
                vTelefono2='$txtTelefono2',
                bNacional='$txtNacionalidad',
                vTelFax='$txtFax'
                where Id='$id'
            ";
        
       $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos($con);
        $R=$objUpdate->Query($con,$sql);
        $objUpdate->Cerrar($con,$R);
        return $sql;
    }
     function frm_buscador_borrar()
    {
        
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Proveedor</div></td>
                            <td><input  type=\"text\" id=\"txtProveedor\"  name=\"txtProveedor\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style='cursor:pointer' onclick=\"buscar_borrar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
              <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;   
    } 
 public function buscar_borrar_proveedor($texto)
  {
     $FliexGrid = "<br><br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_Proveedor,Id_Giro,vNombre,vResponsable,vCalle,vNumero,Colonia,vPoblacion,vCP,cRFC,cPadronFedProv,cCedulaEmpadr,cCamaraComercio,cCanacintra,cCamaraRamo,vTelefono1,vTelefono2,bNacional,vTelFax from sa_proveedor where vNombre like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_proveedor($fila[Id]);\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vResponsable]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCalle] - $fila[vNumero]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Colonia]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vPoblacion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cPadronFedProv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCedulaEmpadr]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCamaraComercio]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelefono1]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelFax]</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},
                                                            {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :200, sortable :false, align: 'center'},
                                                            {display: 'Calle', name : 'Calle', width :50, sortable :false, align: 'center'},
                                                            {display: 'Colonia', name : 'Colonia', width :200, sortable :false, align: 'center'},
                                                            {display: 'Poblacion', name : 'Poblacion', width :200, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :130, sortable :false, align: 'center'},
                                                            {display: 'Padron', name : '', width :200, sortable :false, align: 'center'},
                                                            {display: 'Cedula Emp.', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Camara', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Telefono', name : 'Telefono', width :100, sortable :false, align: 'center'},
                                                            {display: 'Fax', name : 'Fax', width :100, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 940,
                                            height: 400
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         return $FliexGrid;
  }
  public function borrar_proveedor($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_proveedor Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
  public function frm_consultar_proveedor()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Proveedor</div></td>
                            <td><input  type=\"text\" id=\"txtProveedor\"  name=\"txtProveedor\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_consultar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
        <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;
     
 }
 public function consultar($texto)
 {
     $FliexGrid = "<br><br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_Proveedor,Id_Giro,vNombre,vResponsable,vCalle,vNumero,Colonia,vPoblacion,vCP,cRFC,cPadronFedProv,cCedulaEmpadr,cCamaraComercio,cCanacintra,cCamaraRamo,vTelefono1,vTelefono2,bNacional,vTelFax from sa_proveedor where vNombre like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vResponsable]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCalle] - $fila[vNumero]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Colonia]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vPoblacion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cPadronFedProv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCedulaEmpadr]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cCamaraComercio]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelefono1]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTelFax]</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            
                                                            {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :200, sortable :false, align: 'center'},
                                                            {display: 'Calle', name : 'Calle', width :50, sortable :false, align: 'center'},
                                                            {display: 'Colonia', name : 'Colonia', width :200, sortable :false, align: 'center'},
                                                            {display: 'Poblacion', name : 'Poblacion', width :200, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :130, sortable :false, align: 'center'},
                                                            {display: 'Padron', name : '', width :200, sortable :false, align: 'center'},
                                                            {display: 'Cedula Emp.', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Camara', name : '', width :150, sortable :false, align: 'center'},
                                                            {display: 'Telefono', name : 'Telefono', width :100, sortable :false, align: 'center'},
                                                            {display: 'Fax', name : 'Fax', width :100, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 940,
                                            height: 400
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         return $FliexGrid;
 }

}

?>
