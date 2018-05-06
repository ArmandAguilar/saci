<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author armand
 */
class Menus  extends poolConnection{
    
    
    public function menu_catalogos($IdUsuario)
    {
        $menuCatalogo = "";
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        $sql="Select * from sa_menu_catalogos where IdUsuario='$IdUsuario'";
        $RSet=$objMenu ->Query($con,$sql);
        while($row = mysqli_fetch_array($RSet))
        {
            $Empleado=$row[Empleado];
            $Cabms=$row[Cabms];
            $Cabms_Consumible=$row[Cabms_Consumible];
            $Giro=$row[Giro];
            $UnidadMedida=$row[UnidadMemoria];
            $Proveedores=$row[Proveedores];
            $UnidadAdministrativa=$row[UnidadAdministrativa];
            $TipoMovimiento=$row[TipoMovimiento];
            $Parametro=$row[Parametro];
            $EstadoBien=$row[EstadoBien];
            $TipoBienInventariable=$row[TipoBienInventariable];
            $FactoresPronostico=$row[FactoresPronostico];
        }
        $objMenu->Cerrar($con,$RSet);
        if($Empleado=="YES")
        {
             $menuCatalogo.="<div id=\"apDiv3\"><a href=\"saci_content/catalogos/empleado.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image1','','interfaz_modulos/catalogos/empleado_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/empleado.png\" name=\"Image1\" width=\"335\" height=\"60\" border=\"0\" id=\"Image1\" /></a></div>";

        }
       else 
          {
              $menuCatalogo.="<div id=\"apDiv3\"><img src=\"interfaz_modulos/catalogos/empleado.png\" name=\"Image1\" width=\"335\" height=\"60\" border=\"0\" id=\"Image1\" /></div>";
          }
        if($Cabms=="YES")
            {
                $menuCatalogo.="<div id=\"apDiv4\"><a href=\"saci_content/catalogos/cabms.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image2','','interfaz_modulos/catalogos/cabms_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/cabms.png\" name=\"Image2\" width=\"335\" height=\"60\" border=\"0\" id=\"Image2\" /></a></div>";

           }
        else 
            {
                $menuCatalogo.="<div id=\"apDiv4\"><img src=\"interfaz_modulos/catalogos/cabms.png\" name=\"Image2\" width=\"335\" height=\"60\" border=\"0\" id=\"Image2\" /></div>";

            }
        if($Cabms_Consumible=="YES")
            {
               //$menuCatalogo.="<div id=\"apDiv5\"><a href=\"saci_content/catalogos/cabms_consumible.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image3','','interfaz_modulos/catalogos/cabms_c_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/cabms_c.png\" name=\"Image3\" width=\"335\" height=\"60\" border=\"0\" id=\"Image3\" /></a></div>";

            }
            else 
                {
                  // $menuCatalogo.="<div id=\"apDiv5\"><img src=\"interfaz_modulos/catalogos/cabms_c.png\" name=\"Image3\" width=\"335\" height=\"60\" border=\"0\" id=\"Image3\" /></div>";

                }
        if($Giro=="YES")
            {
                 //$menuCatalogo.="<div id=\"apDiv6\"><a href=\"saci_content/catalogos/giro.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image4','','interfaz_modulos/catalogos/giro_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/giro.png\" name=\"Image4\" width=\"335\" height=\"60\" border=\"0\" id=\"Image4\" /></a></div>";
 
            }
            else 
                {
                    //$menuCatalogo.="<div id=\"apDiv6\"><img src=\"interfaz_modulos/catalogos/giro.png\" name=\"Image4\" width=\"335\" height=\"60\" border=\"0\" id=\"Image4\" /></div>";

                }
        if($UnidadMedida=="YES")
            {
                 $menuCatalogo.="<div id=\"apDiv7\"><a href=\"saci_content/catalogos/unidad_de_medida.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image5','','interfaz_modulos/catalogos/unidad_m_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/unidad_m.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></a></div>";

            }
            else 
                {
                    $menuCatalogo.="<div id=\"apDiv7\"><img src=\"interfaz_modulos/catalogos/unidad_m.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></div>";

                }
        if($Proveedores=="YES")
            {
                $menuCatalogo.="<div id=\"apDiv8\"><a href=\"saci_content/catalogos/proveedor.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image6','','interfaz_modulos/catalogos/proveedor_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/proveedor.png\" name=\"Image6\" width=\"335\" height=\"60\" border=\"0\" id=\"Image6\" /></a></div>";

            }
            else
                {
                    $menuCatalogo.="<div id=\"apDiv8\"><img src=\"interfaz_modulos/catalogos/proveedor.png\" name=\"Image6\" width=\"335\" height=\"60\" border=\"0\" id=\"Image6\" /></div>";

                }
        if($UnidadAdministrativa=="YES")
            {
                $menuCatalogo.="<div id=\"apDiv9\"><a href=\"saci_content/catalogos/unidad_administrativa.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image7','','interfaz_modulos/catalogos/unidad_a_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/unidad_a.png\" name=\"Image7\" width=\"335\" height=\"60\" border=\"0\" id=\"Image7\" /></a></div>";

            }
            else
                {
                   $menuCatalogo.="<div id=\"apDiv9\"><img src=\"interfaz_modulos/catalogos/unidad_a.png\" name=\"Image7\" width=\"335\" height=\"60\" border=\"0\" id=\"Image7\" /></div>";

                }
        if($TipoMovimiento=="YES")
            {
               $menuCatalogo.="<div id=\"apDiv10\"><a href=\"saci_content/catalogos/tipo_de_movimiento.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image8','','interfaz_modulos/catalogos/tipo_m_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/tipo_m.png\" name=\"Image8\" width=\"335\" height=\"60\" border=\"0\" id=\"Image8\" /></a></div>";
 
            }
         else 
             {
                 $menuCatalogo.="<div id=\"apDiv10\"><img src=\"interfaz_modulos/catalogos/tipo_m.png\" name=\"Image8\" width=\"335\" height=\"60\" border=\"0\" id=\"Image8\" /></div>";
 
             }
        if($Parametro=="YES")
            {
                $menuCatalogo.="<div id=\"apDiv11\"><a href=\"saci_content/catalogos/parametro.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image9','','interfaz_modulos/catalogos/parametro_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/parametro.png\" name=\"Image9\" width=\"335\" height=\"60\" border=\"0\" id=\"Image9\" /></a></div>";

            }
        else 
            {
               $menuCatalogo.="<div id=\"apDiv11\"><img src=\"interfaz_modulos/catalogos/parametro.png\" name=\"Image9\" width=\"335\" height=\"60\" border=\"0\" id=\"Image9\" /></div>";

            }
        if($EstadoBien=="YES")
            {
              $menuCatalogo.="<div id=\"apDiv12\"><a href=\"saci_content/catalogos/estado_del_bien.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image10','','interfaz_modulos/catalogos/estado_b_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/estado_b.png\" name=\"Image10\" width=\"335\" height=\"60\" border=\"0\" id=\"Image10\" /></a></div>";
  
            }
         else{
                 $menuCatalogo.="<div id=\"apDiv12\"><img src=\"interfaz_modulos/catalogos/estado_b.png\" name=\"Image10\" width=\"335\" height=\"60\" border=\"0\" id=\"Image10\" /></div>";
   
            }
        if($TipoBienInventariable=="YES")
            {
              $menuCatalogo.="<div id=\"apDiv13\"><a href=\"saci_content/catalogos/tipo_de_bien_inventariable.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image11','','interfaz_modulos/catalogos/tipo_bi_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/tipo_bi.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></a></div>";
  
            }
          else
               {
                  $menuCatalogo.="<div id=\"apDiv13\"><img src=\"interfaz_modulos/catalogos/tipo_bi.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></div>";
  
               }
        if($FactoresPronostico=="YES")
            {
              $menuCatalogo.="<!--<div id=\"apDiv14\"><a href=\"saci_content/catalogos/factores_de_pronostico.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image12','','interfaz_modulos/catalogos/factores_p_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/catalogos/factores_p.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></a></div>-->";
  
            }
         else
             {
             
                 $menuCatalogo.="<!--<div id=\"apDiv14\"><img src=\"interfaz_modulos/catalogos/factores_p.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></div>-->";
  
             }
        return $menuCatalogo;
    }
  public function menu_procesos($IdUsuario)
  {
      $menuProcesos = "";
        $objMenuProcesos = new poolConnection();
        $con=$objMenuProcesos->Conexion();
        $objMenuProcesos->BaseDatos($con);
        $sql="Select * from sa_menu_procesos where IdUsuario='$IdUsuario'";
        $RSet=$objMenuProcesos->Query($con,$sql);
        $i=0;
        while($row=mysqli_fetch_array($RSet))
        {
                    $Procesos=$row[Procesos];
                    $Pedidos=$row[Pedidos];
                    $Consumibles=$row[Consumibles];
                    $Consumibles_Entradas=$row[Consumibles_Entradas];
                    $Consumibles_Salidas=$row[Consumibles_Salidas];
                    $Invetaribales=$row[Invetaribales];


        }
        $objMenuProcesos->Cerrar($con,$RSet);
        
        
        if ($Pedidos=="YES")
          {
                $menuProcesos.="<div id=\"apDiv28\"><a href=\"saci_content/procesos/carga_de_empleados.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image1','','interfaz_modulos/procesos/carga_em_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/carga_em.png\" name=\"Image1\" width=\"335\" height=\"60\" border=\"0\" id=\"Image1\" /></a></div>
                                <div id=\"apDiv8\"><img src=\"interfaz_modulos/procesos/t_pedidos.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv9\"><a href=\"saci_content/procesos/captura_de_pedidos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image4','','interfaz_modulos/procesos/captura_p_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/captura_p.png\" name=\"Image4\" width=\"335\" height=\"60\" border=\"0\" id=\"Image4\" /></a></div>
                                <div id=\"apDiv10\"><a href=\"saci_content/procesos/alta_de_facturas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image5','','interfaz_modulos/procesos/alta_fac_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/alta_fac.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></a></div>
                                
                                ";
          }
        else
           {
                   $menuProcesos.="<div id=\"apDiv8\"><img src=\"interfaz_modulos/procesos/t_pedidos.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv9\"><img src=\"interfaz_modulos/procesos/captura_p.png\" name=\"Image4\" width=\"335\" height=\"60\" border=\"0\" id=\"Image4\" /></div>
                                <div id=\"apDiv10\"><img src=\"interfaz_modulos/procesos/alta_fac.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></div>
                                
                                ";
           }
        
        if ($Consumibles_Entradas=="YES")
          {
                $menuProcesos.="<div id=\"apDiv15\"><img src=\"interfaz_modulos/procesos/t_cons_en.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv16\"><a href=\"saci_content/procesos/carga_inicial_2.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image11','','interfaz_modulos/procesos/carga_ini_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/carga_ini.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></a></div>
                                <div id=\"apDiv17\"><a href=\"saci_content/procesos/carga_de_inventario.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image12','','interfaz_modulos/procesos/carga_inv_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/carga_inv.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></a></div>
                                <div id=\"apDiv18\"><a href=\"saci_content/procesos/entrada_de_almacen.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image13','','interfaz_modulos/procesos/entrada_al_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/entrada_al.png\" name=\"Image13\" width=\"335\" height=\"60\" border=\"0\" id=\"Image13\" /></a></div>
                                <div id=\"apDiv19\"><a href=\"saci_content/procesos/otros_conceptos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image14','','interfaz_modulos/procesos/otros_conc_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/otros_conc.png\" name=\"Image14\" width=\"335\" height=\"60\" border=\"0\" id=\"Image14\" /></a></div>";
          }
        else
          {
              $menuProcesos.="<div id=\"apDiv15\"><img src=\"interfaz_modulos/procesos/t_cons_en.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv16\"><img src=\"interfaz_modulos/procesos/carga_ini.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></div>
                                <div id=\"apDiv17\"><img src=\"interfaz_modulos/procesos/carga_inv.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></div>
                                <div id=\"apDiv18\"><img src=\"interfaz_modulos/procesos/entrada_al.png\" name=\"Image13\" width=\"335\" height=\"60\" border=\"0\" id=\"Image13\" /></div>
                                <div id=\"apDiv19\"><img src=\"interfaz_modulos/procesos/otros_conc.png\" name=\"Image14\" width=\"335\" height=\"60\" border=\"0\" id=\"Image14\" /></div>";
          }
        if ($Consumibles_Salidas=="YES")
          {
                
                        $menuProcesos.="<div id=\"apDiv20\"><img src=\"interfaz_modulos/procesos/t_cons_sal.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                        
                                        <div id=\"apDiv22\"><a href=\"saci_content/procesos/calculo_de_consumo_promedio.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image17','','interfaz_modulos/procesos/calculo_con_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/calculo_con.png\" name=\"Image17\" width=\"335\" height=\"60\" border=\"0\" id=\"Image17\" /></a></div>
                                        ";


          }
        else
          {
                 $menuProcesos.="<div id=\"apDiv20\"><img src=\"interfaz_modulos/procesos/t_cons_sal.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                        
                                        <div id=\"apDiv22\"><img src=\"interfaz_modulos/procesos/calculo_con.png\" name=\"Image17\" width=\"335\" height=\"60\" border=\"0\" id=\"Image17\" /></div>
                                       ";

          }
        if ($Invetaribales=="YES")
          {
                $menuProcesos.="<div id=\"apDiv24\"><img src=\"interfaz_modulos/procesos/t_inventariables.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv25\"><a href=\"saci_content/procesos/entrada.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image20','','interfaz_modulos/procesos/entrada_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/entrada.png\" name=\"Image20\" width=\"335\" height=\"60\" border=\"0\" id=\"Image20\" /></a></div>
                                <div id=\"apDiv26\"><a href=\"saci_content/procesos/movimientos_de_bienes.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image21','','interfaz_modulos/procesos/movimiento_db_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/procesos/movimiento_db.png\" name=\"Image21\" width=\"335\" height=\"60\" border=\"0\" id=\"Image21\" /></a></div>
                                <div id=\"apDiv27\"><a href=\"saci_content/procesos/carga_inventario_fisico_por_arch.php\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image22','','interfaz_modulos/procesos/carga_if_over.png',1)\"><img src=\"interfaz_modulos/procesos/carga_if.png\" name=\"Image22\" width=\"335\" height=\"60\" border=\"0\" id=\"Image22\" /></a></div>
";
          }
        else
          {
                $menuProcesos.="<div id=\"apDiv24\"><img src=\"interfaz_modulos/procesos/t_inventariables.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv25\"><img src=\"interfaz_modulos/procesos/entrada.png\" name=\"Image20\" width=\"335\" height=\"60\" border=\"0\" id=\"Image20\" /></div>
                                <div id=\"apDiv26\"><img src=\"interfaz_modulos/procesos/movimiento_db.png\" name=\"Image21\" width=\"335\" height=\"60\" border=\"0\" id=\"Image21\" /></div>";
          }
          
          return $menuProcesos;
  }
 public function menu_reportes($IdUsuario)
  {

        $menu_reporte = "";
        $objMenuReportes = new poolConnection();
        $con=$objMenuReportes->Conexion();
        $objMenuReportes->BaseDatos($con);
        $sql="Select * from sa_menu_reportes where IdUsuario='$IdUsuario'";
        $RSet=$objMenuReportes->Query($con,$sql);
        $i=0;
        while($row=mysqli_fetch_array($RSet))
        {
                    $Procesos=$row[Reportes];
                    $Pedidos=$row[Pedidos];
                    $Consumibles=$row[Consumibles];
                    $Inventarios=$row[Inventarios];


        }
        $objMenuReportes->Cerrar($con,$RSet);
        
        if($Procesos=="YES")
        {
            $menu_reporte.="<div id=\"apDiv4\"><img src=\"interfaz_modulos/reportes/t_vacio.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv5\"><a href=\"saci_content/reportes/catalogos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image2','','interfaz_modulos/reportes/catalogos_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/catalogos.png\" name=\"Image2\" width=\"335\" height=\"60\" border=\"0\" id=\"Image2\" /></a></div>
                            ";

        } 
        else
        {
               $menu_reporte.="<div id=\"apDiv4\"><img src=\"interfaz_modulos/reportes/t_vacio.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv5\"><img src=\"interfaz_modulos/reportes/catalogos.png\" name=\"Image2\" width=\"335\" height=\"60\" border=\"0\" id=\"Image2\" /></div>";
 
        }
        if($Pedidos=="YES")
        {
              $menu_reporte.="<div id=\"apDiv8\"><img src=\"interfaz_modulos/reportes/t_pedidos.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv9\"><a href=\"saci_content/reportes/alta_de_facturas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image5','','interfaz_modulos/reportes/alta_fac_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/alta_fac.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></a></div>
                            
                            <div id=\"apDiv11\"><a href=\"saci_content/reportes/desglose_de_pedidos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image7','','interfaz_modulos/reportes/desglose_ped_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/desglose_ped.png\" name=\"Image7\" width=\"335\" height=\"60\" border=\"0\" id=\"Image7\" /></a></div>
                            <div id=\"apDiv12\"><a href=\"saci_content/reportes/pedidos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image8','','interfaz_modulos/reportes/pedidos_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/pedidos.png\" name=\"Image8\" width=\"335\" height=\"60\" border=\"0\" id=\"Image8\" /></a></div>";

        } 
        else
        {
            $menu_reporte.="<div id=\"apDiv8\"><img src=\"interfaz_modulos/reportes/t_pedidos.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv9\"><img src=\"interfaz_modulos/reportes/alta_fac.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></div>
                            
                            <div id=\"apDiv11\"><img src=\"interfaz_modulos/reportes/desglose_ped.png\" name=\"Image7\" width=\"335\" height=\"60\" border=\"0\" id=\"Image7\" /></div>
                            <div id=\"apDiv12\"><img src=\"interfaz_modulos/reportes/pedidos.png\" name=\"Image8\" width=\"335\" height=\"60\" border=\"0\" id=\"Image8\" /></div>";
        }
        if($Consumibles=="YES")
        {
               $menu_reporte.="<div id=\"apDiv13\"><img src=\"interfaz_modulos/reportes/t_consumibles.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv14\"><a href=\"saci_content/reportes/generacion_de_notas_de_cargo.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image30','','interfaz_modulos/reportes/generacion_nc_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/generacion_nc.png\" name=\"Image30\" width=\"335\" height=\"60\" border=\"0\" id=\"Image30\" /></a></div>
                                <div id=\"apDiv15\"><a href=\"saci_content/reportes/reporte_de_entradas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image11','','interfaz_modulos/reportes/reporte_en_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/reporte_en.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></a></div>
                                <div id=\"apDiv16\"><a href=\"saci_content/reportes/reporte_de_salidas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image12','','interfaz_modulos/reportes/reporte_sal_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/reporte_sal.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></a></div>
                                <div id=\"apDiv17\"><a href=\"saci_content/reportes/movimentos_al_kardex.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image13','','interfaz_modulos/reportes/movimientos_kar_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/movimientos_kar.png\" name=\"Image13\" width=\"335\" height=\"60\" border=\"0\" id=\"Image13\" /></a></div>
                                <div id=\"apDiv18\"><a href=\"saci_content/reportes/inventario_de_consumibles.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image14','','interfaz_modulos/reportes/inventario_con_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/inventario_con.png\" name=\"Image14\" width=\"335\" height=\"60\" border=\"0\" id=\"Image14\" /></a></div>
                                <div id=\"apDiv21\"><img src=\"interfaz_modulos/reportes/t_consumibles.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv22\"><a href=\"saci_content/reportes/reporte_dai_1.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image18','','interfaz_modulos/reportes/reporte_dai_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/reporte_dai.png\" name=\"Image18\" width=\"335\" height=\"60\" border=\"0\" id=\"Image18\" /></a></div>
                                <div id=\"apDiv23\"><a href=\"saci_content/reportes/reporte_de_programas_de_entregas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image19','','interfaz_modulos/reportes/reporte_pe_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/reporte_pe.png\" name=\"Image19\" width=\"335\" height=\"60\" border=\"0\" id=\"Image19\" /></a></div>
                                <div id=\"apDiv24\"><a href=\"saci_content/reportes/manejo_de_la_capacidad_del_almacen.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image20','','interfaz_modulos/reportes/manejo_cap_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/manejo_cap.png\" name=\"Image20\" width=\"335\" height=\"60\" border=\"0\" id=\"Image20\" /></a></div>
                                <div id=\"apDiv25\"><a href=\"saci_content/reportes/pronosticos_de_consumo.php\" target=\"_self\" onmouseover=\"MM_swapImage('ImagePronosticos','','interfaz_modulos/reportes/pronosticos_con_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/pronosticos_con.png\" name=\"ImagePronosticos\" width=\"335\" height=\"60\" border=\"0\" id=\"ImagePronosticos\" /></a></div>
                                <div id=\"apDiv25a\"><a href=\"saci_content/reportes/historico_de_consumo.php\" target=\"_self\" onmouseover=\"MM_swapImage('ImageHistorico','','interfaz_modulos/reportes/historico_con_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/historico_con.png\" name=\"ImageHistorico\" width=\"335\" height=\"60\" border=\"0\" id=\"ImageHistorico\" /></a></div>
                                <div id=\"apDiv25b\"><a href=\"saci_content/reportes/existencias_con_sin_costopromedio.php\" target=\"_self\" onmouseover=\"MM_swapImage('ImageExistencias','','interfaz_modulos/reportes/existencias_sc_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/existencias_sc.png\" name=\"ImageExistencias\" width=\"335\" height=\"60\" border=\"0\" id=\"ImageExistencias\" /></a></div>";

        } 
        else
        {
            $menu_reporte.="<div id=\"apDiv13\"><img src=\"interfaz_modulos/reportes/t_consumibles.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv14\"><img src=\"interfaz_modulos/reportes/generacion_nc.png\" name=\"Image30\" width=\"335\" height=\"60\" border=\"0\" id=\"Image30\" /></div>
                                <div id=\"apDiv15\"><img src=\"interfaz_modulos/reportes/reporte_en.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></div>
                                <div id=\"apDiv16\"><img src=\"interfaz_modulos/reportes/reporte_sal.png\" name=\"Image12\" width=\"335\" height=\"60\" border=\"0\" id=\"Image12\" /></div>
                                <div id=\"apDiv17\"><img src=\"interfaz_modulos/reportes/movimientos_kar.png\" name=\"Image13\" width=\"335\" height=\"60\" border=\"0\" id=\"Image13\" /></div>
                                <div id=\"apDiv18\"><img src=\"interfaz_modulos/reportes/inventario_con.png\" name=\"Image14\" width=\"335\" height=\"60\" border=\"0\" id=\"Image14\" /></div>
                                <div id=\"apDiv21\"><img src=\"interfaz_modulos/reportes/t_consumibles.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                                <div id=\"apDiv22\"><img src=\"interfaz_modulos/reportes/reporte_dai.png\" name=\"Image18\" width=\"335\" height=\"60\" border=\"0\" id=\"Image18\" /></div>
                                <div id=\"apDiv23\"><img src=\"interfaz_modulos/reportes/reporte_pe.png\" name=\"Image19\" width=\"335\" height=\"60\" border=\"0\" id=\"Image19\" /></div>
                                <div id=\"apDiv24\"><img src=\"interfaz_modulos/reportes/manejo_cap.png\" name=\"Image20\" width=\"335\" height=\"60\" border=\"0\" id=\"Image20\" /></div>
                                <div id=\"apDiv25\"><img src=\"interfaz_modulos/reportes/pronosticos_con.png\" name=\"Image21\" width=\"335\" height=\"60\" border=\"0\" id=\"Image21\" /></div>";
  
        }
        if($Inventarios=="YES")
        {
            $menu_reporte.="<div id=\"apDiv26\"><img src=\"interfaz_modulos/reportes/t_inventariables.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv27\"><a href=\"saci_content/reportes/generacion_de_etiquetas_cabms.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image23','','interfaz_modulos/reportes/generacion_et_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/generacion_et.png\" name=\"Image23\" width=\"335\" height=\"60\" border=\"0\" id=\"Image23\" /></a></div>
                            <div id=\"apDiv29\"><a href=\"saci_content/reportes/resguardos.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image25','','interfaz_modulos/reportes/resguardos_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/resguardos.png\" name=\"Image25\" width=\"335\" height=\"60\" border=\"0\" id=\"Image25\" /></a></div>
                            <div id=\"apDiv30\"><a href=\"saci_content/reportes/reporte_de_entradas_y_salidas.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image26','','interfaz_modulos/reportes/reporte_es_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/reporte_es.png\" name=\"Image26\" width=\"335\" height=\"60\" border=\"0\" id=\"Image26\" /></a></div>
                            <div id=\"apDiv31\"><a href=\"saci_content/reportes/existencias.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image27','','interfaz_modulos/reportes/existencias_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"interfaz_modulos/reportes/existencias.png\" name=\"Image27\" width=\"335\" height=\"60\" border=\"0\" id=\"Image27\" /></a></div>";
        } 
        else
        {
               $menu_reporte.="<div id=\"apDiv26\"><img src=\"interfaz_modulos/reportes/t_inventariables.png\" width=\"335\" height=\"60\" border=\"0\" /></div>
                            <div id=\"apDiv27\"><img src=\"interfaz_modulos/reportes/generacion_et.png\" name=\"Image23\" width=\"335\" height=\"60\" border=\"0\" id=\"Image23\" /></div>
                            <div id=\"apDiv29\"><img src=\"interfaz_modulos/reportes/resguardos.png\" name=\"Image25\" width=\"335\" height=\"60\" border=\"0\" id=\"Image25\" /></div>
                            <div id=\"apDiv30\"><img src=\"interfaz_modulos/reportes/reporte_es.png\" name=\"Image26\" width=\"335\" height=\"60\" border=\"0\" id=\"Image26\" /></div>
                            <div id=\"apDiv31\"><img src=\"interfaz_modulos/reportes/existencias.png\" name=\"Image27\" width=\"335\" height=\"60\" border=\"0\" id=\"Image27\" /></div>";

        }
        return $menu_reporte; 
  }
  public function menu_reporte_catalogos($IdUsuario)
    {
        $menuCatalogo = "";
        $menuCatalogo.="<div id=\"apDiv3\"><a href=\"empleado.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image1','','../../interfaz_modulos/catalogos/empleado_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/empleado.png\" name=\"Image1\" width=\"335\" height=\"60\" border=\"0\" id=\"Image1\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv4\"><a href=\"cabms.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image2','','../../interfaz_modulos/catalogos/cabms_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/cabms.png\" name=\"Image2\" width=\"335\" height=\"60\" border=\"0\" id=\"Image2\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv5\"><a href=\"unidad_de_medida.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image5','','../../interfaz_modulos/catalogos/unidad_m_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/unidad_m.png\" name=\"Image5\" width=\"335\" height=\"60\" border=\"0\" id=\"Image5\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv6\"><a href=\"proveedor.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image6','','../../interfaz_modulos/catalogos/proveedor_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/proveedor.png\" name=\"Image6\" width=\"335\" height=\"60\" border=\"0\" id=\"Image6\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv7\"><a href=\"unidad_administrativa.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image7','','../../interfaz_modulos/catalogos/unidad_a_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/unidad_a.png\" name=\"Image7\" width=\"335\" height=\"60\" border=\"0\" id=\"Image7\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv8\"><a href=\"tipo_de_movimiento.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image8','','../../interfaz_modulos/catalogos/tipo_m_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/tipo_m.png\" name=\"Image8\" width=\"335\" height=\"60\" border=\"0\" id=\"Image8\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv9\"><a href=\"parametro.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image9','','../../interfaz_modulos/catalogos/parametro_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/parametro.png\" name=\"Image9\" width=\"335\" height=\"60\" border=\"0\" id=\"Image9\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv10\"><a href=\"estado_del_bien.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image10','','../../interfaz_modulos/catalogos/estado_b_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/estado_b.png\" name=\"Image10\" width=\"335\" height=\"60\" border=\"0\" id=\"Image10\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv11\"><a href=\"tipo_de_bien_inventariable.php\" target=\"_self\" onmouseover=\"MM_swapImage('Image11','','../../interfaz_modulos/catalogos/tipo_bi_over.png',1)\" onmouseout=\"MM_swapImgRestore()\"><img src=\"../../interfaz_modulos/catalogos/tipo_bi.png\" name=\"Image11\" width=\"335\" height=\"60\" border=\"0\" id=\"Image11\" /></a></div>";
        $menuCatalogo.="<div id=\"apDiv12\"></div>";
        $menuCatalogo.="<div id=\"apDiv13\"></div>";
        $menuCatalogo.="<div id=\"apDiv14\"></a></div>";
        return $menuCatalogo;
    }

}
?>
