<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', '');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php// echo $cakeDescription ?>:
		<?php// echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-cerulean');
        echo $this->Html->css('bootstrap-responsive');
        echo $this->Html->css('datepicker');
        echo $this->Html->css('datetimepicker');
    
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('jquery.form');
        echo $this->Html->script('menu');
        echo $this->Html->script('parsley');
        echo $this->Html->script('angular.min');


		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');

      
	?>
       

    
    

    

    
</head>
<body>
    
 
        <div id="wrap">
            <!--Menu-->
            <header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="./simec/index.php/" class="brand">Inventario / Usuario: </a>            
            
            <div class="nav-collapse">
                <ul class="nav pull-left">
                    <button id="view-navbar" class="btn btn-navbar" type="button" style="display: inline">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </ul>
                <ul class="nav pull-right">
                    <li>
                        <a href="./index.php/users/logout">Salir</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</header>
            <nav class="navbar-inverse sidebar">
    <div class="navbar-inner">
        <ul id="sidebar-menu" class="nav nav-stacked">
            
            
            
            
            
             <li class="dropdown-submenu">
            <a href="" title="Opciones" class="menu-extermal hasChild dropdown-close sidebar-item">
                <i class="icon-white icon-large"></i>
                <span>Tablas Maestras</span>
            </a>                        
                <ul class="nav nav-stacked sub-nav submenu-extermal dropdown-menu">                                    
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Centro de costos</span>
                        </a>                            
                    </li>                                                                 
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Almacen</span>
                        </a>                            
                    </li>
                                                                                                                            
                    <li>                  
                        <a href="" title="Anexar actas de destrucción de sobrantes" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Area</span>
                        </a>                                    
                    </li>                                                                                                  
                    <li>           
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Responsable</span>
                        </a>                            
                    </li>                   
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Bodegas Principales</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Grupos</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Subgrupos</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Unidad</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Forma</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Iva</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Principio Activo</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Marcas</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Laboratorios</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Productos</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Terceros</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Conceptos de Ajustes</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Prefijos</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Dependencias</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Retencion</span>
                        </a>                            
                    </li>
                    <li>          
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Tipo Orden de Entrada</span>
                        </a>                            
                    </li>
                </ul>             
            </li>
            
            
            <li class="dropdown-submenu">
            <a href="" title="Opciones" class="menu-extermal hasChild dropdown-close sidebar-item">
                <i class="icon-white icon-large"></i>
                <span>Procesos</span>
            </a>                        
                <ul class="nav nav-stacked sub-nav submenu-extermal dropdown-menu">                                    
                    
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Stock</span>
                        </a>                            
                    </li>  
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Solicitud de Pedidos</span>
                        </a>                            
                    </li>  
                    
                    
                    
                    
                 </ul>
            </li>
        
            
            
            
            <li class="dropdown-submenu">
            <a href="" title="Opciones" class="menu-extermal hasChild dropdown-close sidebar-item">
                <i class="icon-white icon-large"></i>
                <span>Entradas de Inventario</span>
            </a>                        
                <ul class="nav nav-stacked sub-nav submenu-extermal dropdown-menu">                                    
                    
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Saldos Iniciales</span>
                        </a>                            
                    </li> 
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Comprobantes de Entrada</span>
                        </a>                            
                    </li> 
                    <li>
                        <a href="" class="menu-list sidebar-item">
                            <i class="icon-white icon-large"></i>
                            <span>Orden de Entrada</span>
                        </a>                            
                    </li> 
                    
                    
                    
                    
                 </ul>
            </li>
            
            
             <li>           
                <a href="/Proyectos/Menus/add" title="Modulos" class="menu-admon hasChild dropdown-close sidebar-item">
                    <i class="icon-cog icon-large icon-large">
                    </i>
                    <span>Menus</span>
                </a>                
                
            </li>    
              
      
        </ul>
            
       
                        
                    
                        
   
       
    </div>
        
        
        
</nav>
            <!--Content-->
            
            

            
            
            
            <div id="push"></div>

            <div id="content-container" class="container-fluid">
                <div class="row-fluid">
                    
                    
                    
                    <div id="content" >
                        
                        <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
                    </div>
                    
                </div>
            </div>

        </div>
    
        
        
        
        
        
        
        
        
        
<footer class="navbar">
    <div class="navbar-inner">
        <div class="footer-content">
            Poyectos - 1.0 - Copyright © 2008 - 2013 <a href="http://sisfo.com/">Sisfo S.A.S.</a> - <a href="http://puntoexe.com.co/">PuntoExe S.A.S.</a>
       
        <?php echo $this->element('sql_dump'); ?>
        </div>
    </div>
</footer>

    


    
    
    
    
    
    



	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
