
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>css/AdminLTE.min.css">
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
page. However, you can choose any other skin. Make sure you
apply the skin class to the body tag so the changes take effect.
-->
<!-- <link rel="stylesheet" href="<?=base_url()?>css/skins/skin-blue.min.css"> -->
<link rel="stylesheet" href="<?=base_url()?>css/skins/_all-skins.min.css">

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect

-->
<body class="hold-transition <?=$tema?>  sidebar-mini " id="mymain">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="<?= base_url()?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Pto</b>Vts</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Punto</b>_Venta</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Menu de Navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              
              <!-- Menu Toggle Button -->
           
              <a <?php
            if($this->session->userdata('rol')=="1"){
              ?>href="<?=base_url()?>configuraciones" class="<?=$classConfiguraciones?>"     <?php
            }else{?> href="#" class="nolink"     
            	<?php
            }
            ?>>
                <!-- The user image in the navbar-->
                <?php
                $logo=$this->consultas->configLogo();
                $nombreEmpresa=$this->consultas->configNombreEmpresa();
                $nombreEmpresa = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($nombreEmpresa)))));
                ?>
                <img src="data:image/jpeg;base64,<?=base64_encode( $logo )?>" class="user-image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <?=$usuario['nombre']?>
              </a>
                     
          

              <!-- Boton de Cerrar session -->
              <li>
                <a href="<?= base_url()?>principal/logout" title="Salir" class="btn btn-block btn-danger btn-lg">
                	<i class="fa fa-power-off" aria-hidden="true"></i>
                	<span class="hidden-xs" > Salir </span></a>
              </li>

            </ul>
          </div>
        </nav>
      </header>

      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="data:image/jpeg;base64,<?=base64_encode( $logo )?>" class="user-image"/>
              <!-- <img src="<?= base_url()?>img/logo.png" class="img-circle" alt="User Image"> -->
            </div>
            <div class="pull-left info">
              <p class="nombre"><?=$nombreEmpresa?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> <?=$usuario['rol']?></a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <?php
            if($this->session->userdata('rol')=="1" || $this->session->userdata('rol')=="3"){
              ?>
              <li class="header">Navegación</li>

               <li><a href="<?= base_url()?>"><i class="fa fa-home" aria-hidden="true"></i> <span>Inicio</span></a></li>

              <li class="treeview <?=$classInventario?>">
                <a href="#"><i class="fa fa-book" aria-hidden="true"></i> <span>Inventario</span>
                  <span class="pull-right-container">
                    <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?=$classInventarioGeneral?>"><a href="<?=base_url()?>inventario"><i class="fa fa-eye" aria-hidden="true"></i>Vista General</a></li>
                  <?php
                  if($this->session->userdata('rol')=="1")
                  {
                    if($classInventarioModificar=="active")
                    {
                      ?>
                      <li class="<?=$classInventarioModificar?>"><a href="<?=base_url()?>modificar" class="nolink"><i class="fa fa-pencil" aria-hidden="true"></i>Modificar elemento</a></li>
                      <?php
                    }
                    ?>
                    <li class="<?=$classInventarioNuevo?>"><a href="<?=base_url()?>nuevoProducto"><i class="fa fa-cart-plus" aria-hidden="true"></i>Nuevo Producto</a></li>
                    
                    <?php
                  }
                  ?>
                </ul>
              </li>
              <?php
              if($this->session->userdata('rol')=="1")
              {
                ?>
                <li class="<?=$classUsuarios?>"><a href="<?=base_url()?>usuarios"><i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span></a></li>

                <li class="<?=$classProveedores?>"><a href="<?=base_url()?>proveedores"><i class="fa fa-user-secret" aria-hidden="true"></i> <span>Proveedores</span></a></li>

               <!-- <li class="<?=$classClientes?>"><a href="<?=base_url()?>clientes"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i> <span>Clientes</span></a></li> -->
                <?php
              }
              ?>
              <li class="<?=$classVentas?>"><a href="<?=base_url()?>ventas"><i class="fa fa-money" aria-hidden="true"></i> <span>Ventas</span></a></li>
              <li class="<?=$classMovimientos?>"><a href="<?=base_url()?>movimientos"><i class="fa fa-money" aria-hidden="true"></i> <span>Movimientos</span></a></li>
              <!-- <li class="<?=$classCreditos?>"><a href="" class="nolink"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Creditos <span class="label label-danger">Pronto</span></span></a></li> -->

              <?php
              if($this->session->userdata('rol')=="1")
              {
                ?>

              <li class="header">Configuraciones</li>

              <li class="<?=$classConfiguraciones?>"><a href="<?=base_url()?>configuraciones"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Configuraciones </span></a></li>
              <?php
            }
            }
            ?>

            <?php
            if($this->session->userdata('rol')=="2"){
              ?>
              <li class="header"></li>
              <li class="hidden" id="libuscar"><a href="#" id="buscarpr"><i class="fa fa-binoculars"  aria-hidden="true"></i> <span>Buscar</span></a></li>
            
              <?php
            }
            ?>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
