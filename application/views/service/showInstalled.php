<div class="wrapper">
	<div class="main">
	<br>
	

	<?php if (isset($serviceCleaned)) { ?>

	<table class="table">
		<thead>
			<tr>
				<td colspan="4">
					Servicios instalados
				</td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td>Fecha de cobro</td>
				<td>Productos instalados</td>
				<td>Dirección</td>
			</tr>
		</thead>
		<tbody style="text-align: left;">
		<?php foreach ($serviceCleaned as $key => $service) { ?>
			<tr>
				
				<td><?php print $service['nombre_cliente']." ".$service['apellido_paterno_cliente']." ".$service['apellido_materno_cliente']; ?></td>
				<td><?php print $service['fecha_instalacion_servicio']; ?></td>
				<td>
				<?php 
					if (isset($service['added'])) {

						print "<strong>Producto 1:</strong>  ".$service['nombre_producto']." ".$service['descripcion_cantidad_prestamo']."<br/>";
						print "<strong>Mac adress: </strong> ".$service['mac_address_prestamo']." <strong>No. serie: </strong>".$service['numero_serie_prestamo']."<br/><br/>";

						foreach ($service['added'] as $key => $added) {
							
							print "<strong>Producto ".($key+2).": </strong> ".$service['nombre_producto']." ".$service['descripcion_cantidad_prestamo'];
							print "<br/><strong>Mac adress: </strong> ".$added['mac_address_prestamo']." <strong>No. serie: </strong>".$added['numero_serie_prestamo']."<br/><br/>";
						}
					}else{

						print "<strong>Producto: </strong> ".$service['nombre_producto']." ".$service['descripcion_cantidad_prestamo'];
						print "<br/><strong>Mac adress: </strong> ".$service['mac_address_prestamo']." <strong>No. serie: </strong>".$service['numero_serie_prestamo'];
					}
				?>
				</td>
				<td><?php 
						print "<strong>Calle:</strong> ".$service['calle_cliente']." <br/><strong>Colonia:</strong> ".$service['colonia_cliente']." <strong>CP:</strong> ".$service['codigo_postal_cliente']."<br/><strong>Lugar: </strong> ".$service['municipio_cliente']." ".$service['ciudad_cliente']; 

						if (!empty($service['referencias_cliente'])) {
							print "<br/><strong>Referencias: </strong>".$service['referencias_cliente'];
						}
						if (!empty($service['telefono_cliente'])) {
							print "<br/><strong>Teléfono: </strong>".$service['telefono_cliente'];
						}
						if (!empty($service['correo_cliente'])) {
							print "<br/><strong>Correo: </strong>".$service['correo_cliente'];
						}
					?>
				</td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php } else { ?>
	<div class="alert alert-error">No existen servicios instalados.</div>
	<?php } ?>
	
	</div>
</div>
<br/><br/><br/>

