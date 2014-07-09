<div class="wrapper">
	<div class="main">
		<br>
		<div class="alert alert-error"><?php print "<strong>Fecha de instalación:</strong> ".$fecha_instalacion; ?></div>
		
		<h1 style="font-size:25px;  text-transform:uppercase;"> <strong><?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?></strong></h1>
		<table class="table">
			<thead>
				<tr>
					<td colspan="4">
						<h1>Productos prestados con el cliente
					</td>					
				</tr>
				<tr>
					<td>Nombre</td>
					<td>MAC Address</td>
					<td>Serie</td>
					<td>Notas</td>
				</tr>
			</thead>
			<tbody style="text-align:left;">
				
				<?php foreach ($products as $key => $product) { ?>
				<tr>
					<td>
						<?php print $product['nombre_producto']; ?>
					</td>
					<td>
						<?php print $product['mac_address_prestamo']; ?>
					</td>
					<td>
						<?php print $product['numero_serie_prestamo']; ?>
					</td>
					<td>
						<?php print $product['descripcion_cantidad_prestamo']; ?>
					</td>
				</tr>
					<?php } ?>
			</tbody>
		</table>

		<br>

		<table class="table">
			<thead>
				<tr>
					<td colspan="3">
						<strong>Pagos realizados</strong>
					</td>
				</tr>
				<tr>
					<td>Mes</td>
					<td>Fecha</td>
					<td>Cantidad</td>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($payments) && !empty($payments)) {
					foreach ($payments as $key => $payment){?>
				<tr>
					<td>
						<?php print $payment['concepto_parsed']; ?>
					</td>
					<td>
						<?php print $payment['fecha_pago_parsed']; ?>
					</td>
					<td>
						<?php print "$ ".$payment['cantidad']; ?>
					</td>
				</tr>
				<?php } }
				else{
					?>
					<tr>
						<td colspan="3"><?php print $console ?></td>
					</tr>
					<?php }
				if (isset($payments) && !empty($payments)) 
				{ 
				?>
					
					<tr>
						<td colspan="3"><strong>Total: <?php print "$".$total; ?></strong> </td>
					</tr>

				<?php
				}
				if (!empty($delays)) {
					foreach ($delays as $key => $delay) {
					?>
					<tr>
						<td>
							<strong>Pago atrasado</strong>
						</td>
						<td>
							<?php print $delay['fecha_vencida']; ?>
						</td>
						<td>
							<?php print "$".$delay['cantidad_vencida']; ?>
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