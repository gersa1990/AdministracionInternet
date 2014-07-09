<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Administracion sistema</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/normalize.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/demo.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/style1.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/component.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/ui-lightness/jquery-ui-1.10.4.css" />
		<link rel="stylesheet" href="<?php print base_url() ?>resources/css/jquery.datetimepicker.css">

		<script src="<?php print base_url() ?>resources/js/modernizr.custom.86080.js"></script>
		<script src="<?php print base_url() ?>resources/js/jquery-1.11.1.js"></script>
		<script src="<?php print base_url() ?>resources/js/jquery-ui-1.10.4.js"></script>
		<script src="<?php print base_url() ?>resources/js/leanModal/jquery.leanModal.min.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php print base_url() ?>resources/css/jquery.ptTimeSelect.css" />
		<script src="<?php print base_url() ?>resources/js/jquery.ptTimeSelect.js"></script>
		<script  src="<?php print base_url() ?>resources/js/jquery.datetimepicker.js"></script>

	</head>
	<body id="page">

		<?php if(isset($Loggued)){ ?>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main" style="z-index: 1;">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu">
						<span>Menu</span>
					</a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								
								<li class="gn-search-item">
									<input placeholder="Buscar servicio" type="search" class="gn-search"  id="searchService">
									<a class="gn-icon gn-icon-search">
										<span>
											Buscar servicio
										</span>
									</a>
									
								</li>
								<li>
									<a class="gn-icon gn-icon-download" href="<?php print base_url().'index.php/admin/showAll/'; ?>">
										Administradores
									</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-cog">
										Clientes
									</a>
									<ul class="gn-submenu">
										<li class="gn-search-item">
											<input placeholder="Buscar cliente" type="search" class="gn-search">
											<a class="gn-icon gn-icon-illustrator" type="search" class="gn-search">
												<span>
													Buscar cliente
												</span>
												
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="gn-icon gn-icon-cog" href="<?php print base_url().'index.php/products/' ?>">
										Productos
									</a>
									
								</li>
								<li>
									<a class="gn-icon gn-icon-help" href="<?php print base_url().'index.php/session/killSession' ?>">
										Salir
									</a>
									<a rel="leanModal" id="executeLean" name="#popup" href="#popup" class="hidden" onclick="" /></a>					
								</li>
							</ul>
						</div>
					</nav>
				</li>
				<li>
					<a href="<?php print base_url(); ?>">
						Inicio
					</a>
				</li>
				<li>
					<a href="<?php print base_url()."index.php/service/request/" ?>">
						Solicitar servicio
					</a>
				</li>
				<li>
					<a class="codrops-icon codrops-icon-prev" href="<?php print base_url().'index.php/service/showServiceInstalled/' ?>">
						<span>Servicios instalados</span>
					</a>
				</li>
				<li>
					<a class="codrops-icon codrops-icon-drop" href="<?php print base_url() ?>index.php/customer/showRequestForWaiting">
						<span>Visualizar servicios en espera</span>
					</a>
				</li>
			</ul>
			<?php }else{ ?>

			
					<div class="container">
						<ul id="gn-menu" class="gn-menu-main" style="z-index: 1; line-height: 47px; height: 44px;">
							<li style="float: left; border-right: 1px solid #c6d0da;">
								<a class="codrops-icon codrops-icon-prev" href="<?php print base_url() ?>">
									<span style="color: black;">Inicio</span>
								</a>
							</li>
							
						</ul>
					</div>

			<ul class="cb-slideshow">
	            <li><span>Image 01</span><div><h3>Economiza</h3></div></li>
	            <li><span>Image 02</span><div><h3>Provedores de internet</h3></div></li>
	            <li><span>Image 03</span><div><h3>Servicio eficiente</h3></div></li>
	            <li><span>Image 04</span><div><h3>Sin letras chiquitas</h3></div></li>
	            <li><span>Image 05</span><div><h3>¿QuÉ esperas?</h3></div></li>
	        </ul>

			<?php } ?>
			