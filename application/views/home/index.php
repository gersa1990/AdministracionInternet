<?php 

	$nextDatePayProximos 	= $nextDatePay['proximos']; 
	$servicesPayeds			= $nextDatePay['payed'];
	$serviceDueDates		= $nextDatePay['delayed'];
?>
	<div class="containerMain">
		<div class="wrapper">
			<div class="main">

				<div class="alert alert-error">Los siguientes registros están contemplados en un rango de 15 días hacia atras y 15 días proximos.</div>


				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Servicios proximos a vencer</a></li>
						<li><a href="#tabs-2">Servicios pagados</a></li>
						<li><a href="#tabs-3">Servicios vencidos</a></li>
					</ul>

					
						<div id="tabs-1">
							
							<table class="table">
								<thead>
									<tr>
										<td>
											Nombre
										</td>
										<td>
											Dirección
										</td>

										<td>
											Fecha de instalación
										</td>

										<td>
											Detalles
										</td>
									</tr>
								</thead>
								<tbody style="text-align: left;">
									<?php

									if (isset($nextDatePayProximos)) 
									{
										foreach ($nextDatePayProximos as $key => $customer) 
										{ 
										?>
										
											<tr>
							
												<td>
													<?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?>
												</td>
							
												<td>
													<?php print "<strong>Calle: </strong>".$customer['calle_cliente']."  <br/><strong>Colonia: </strong>".$customer['colonia_cliente']." <strong>CP: </strong> ".$customer['codigo_postal_cliente']."  <br/><strong>Lugar: </strong> ".$customer['municipio_cliente']." ".$customer['ciudad_cliente']; ?>
												</td>

												<td>
													<?php print $customer['fecha_instalacion_servicio']; ?>
												</td>

												<td>
													<a class="btn btn-info" href="<?php print base_url().'index.php/customer/detail/'.$customer['id_cliente_parsed']; ?>">Consultar</a>
												</td>
							
											</tr>
										
										<?php
										}
									}

									?>
								</tbody>
							</table>


						</div>

						<div id="tabs-2">

							<table class="table">
								<thead>
									<tr>
										<td>
											Nombre
										</td>
										<td>
											Dirección
										</td>

										<td>
											Fecha de instalación
										</td>

										<td>
											Detalles
										</td>
									</tr>
								</thead>
								<tbody style="text-align: left;">
									<?php

									if (isset($servicesPayeds)) 
									{
										foreach ($servicesPayeds as $key => $customer) 
										{ 
										?>
										
											<tr>
							
												<td>
													<?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?>
												</td>
							
												<td>
													<?php print "<strong>Calle: </strong>".$customer['calle_cliente']."  <br/><strong>Colonia: </strong>".$customer['colonia_cliente']." <strong>CP: </strong> ".$customer['codigo_postal_cliente']."  <br/><strong>Lugar: </strong> ".$customer['municipio_cliente']." ".$customer['ciudad_cliente']; ?>
												</td>

												<td>
													<?php print $customer['fecha_instalacion_servicio']; ?>
												</td>

												<td>
													<a class="btn btn-info" href="<?php print base_url().'index.php/customer/detail/'.urlencode($customer['id_cliente_parsed']) ?>">Consultar</a>
												</td>
							
											</tr>
										
										<?php
										}
									}

									?>
								</tbody>
							</table>


						</div>

						<div id="tabs-3">
							
							<table class="table">
								<thead>
									<tr>
										<td>
											Nombre
										</td>
										<td>
											Dirección
										</td>
										<td>
											Fecha de instalación
										</td>
										<td>
											Fecha de facturación
										</td>
										<td>
											Detalles
										</td>
									</tr>
								</thead>
								<tbody style="text-align: left;">
									<?php

									if (isset($serviceDueDates)) 
									{
										foreach ($serviceDueDates as $key => $customer) 
										{ 
										?>
											<tr>
							
												<td>
													<?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?>
												</td>
							
												<td>
													<?php print "<strong>Calle: </strong>".$customer['calle_cliente']." <br><strong>Colonia: </strong>".$customer['colonia_cliente']." <br/><strong>CP: </strong> ".$customer['codigo_postal_cliente']." <br/><strong>Lugar: </strong> ".$customer['municipio_cliente']." ".$customer['ciudad_cliente']; ?>
												</td>

												<td>
													<?php print $customer['fecha_instalacion_servicio']; ?>
												</td>

												<td>
													<?php print $customer['fecha_facturacion_servicio']; ?>
												</td>

												

												<td>
													<a class="btn btn-info" href="<?php print base_url().'index.php/customer/detail/'.urlencode($customer['id_cliente_parsed']) ?>">Consultar</a>
												</td>
							
											</tr>
										
										<?php
										}
									}

									?>
								</tbody>
							</table>

						</div>

				</div>
				
			</div>
		</div>
	</div>	
</div>



<script>

 	$(function() {
		$( "#tabs" ).tabs();
	});

</script>