<div class="wrapper">
	<div class="main">
	<br>

	<?php if(isset($waitings)){ ?>
		<table class="table">
			<thead>
				<tr>
					<td colspan="10">
						Servicios en espera
					</td>
				</tr>
				<tr>
					<td>Cliente</td>
					<td>Fecha solicitada</td>
					<td>Dirección</td>
					<td>Contacto </td>
					<td>Referencias</td>
					<td>Solicitó</td>
					<td>Status</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($waitings as $pos => $customer) { ?>
				<tr>
					<td>
						<?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?>
					</td>
					<td>
						<?php print $customer['fecha_solicitada_peticion'];
								if (!empty($customer['hora_deseada_visita'])) {

									print "<br> a las ".$customer['hora_deseada_visita'];
								}
						 ?>
					</td>
					<td>
						<?php print $customer['calle_cliente']." ".$customer['colonia_cliente']." CP: ".$customer['codigo_postal_cliente']." ".$customer['ciudad_cliente']." ".$customer['municipio_cliente']; ?>
					</td>
					<td>
						<?php

							if (!empty($customer['telefono_cliente'])) {
							 	
							 	print $customer['telefono_cliente']." <br>";
							} 
							if (!empty($customer['correo_cliente'])) {
							 	
							 	print " y ".$customer['correo_cliente'];
							}
						?>
					</td>
					<td>
						<?php print $customer['referencias_cliente']; ?>
					</td>
					<td>
						<?php print $customer['usuario_peticion']; ?>
					</td>
					<td>
						<?php print $customer['status']; ?>
					</td>
					<td>
						<a href="<?php print base_url().'index.php/admin/editService/'.$customer['hash_peticion']; ?>"><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/edit.png" width="20"></a>						
						<a href="<?php print base_url().'index.php/admin/takeService/'.$customer['hash_peticion']; ?>"><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/contact.png" width="25"></a>											
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	</div>
</div>