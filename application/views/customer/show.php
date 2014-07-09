<div class="wrapper">
	<div class="main">
	<br>
	<div class="alert alert-error">Si proporcionas tu correo, puedes recibir en cualquier momento el estado de tu servicio.</div>

	<?php if (isset($customer)) { ?>

		<table class="table">
			<thead>
				<tr>
					<?php if (isset($Loggued)) {?>
						<td colspan="9">
					<?php }else{ ?>
						<td colspan="8">
					<?php } ?>

					Datos de la solicitud de "<?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?>"
					<button class="btn btn-danger" id="editInTable">Editar</button>
					</td>
				</tr>
				<tr>
					<td>Teléfono o Correo</td>
					<td>Dirección</td>
					<td>Lugar</td>

					<?php if (isset($request)) { ?>
					
					<td>Fecha solicitada</td>
					<td>Estatus</td>
					
					<?php } ?>

					<td>Referencias</td>

					<?php if (isset($Loggued)) {?>
						<td>Relizada por</td>
					<?php } ?>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php print $customer['telefono_cliente']."<br>".$customer['correo_cliente']; ?></td>
					<td><?php print $customer['calle_cliente']." <br/>Colonia: ".$customer['colonia_cliente']." <br/>CP: ".$customer['codigo_postal_cliente']; ?></td>
					<td><?php print $customer['ciudad_cliente'].", ".$customer['municipio_cliente']; ?></td>

					<?php if (isset($request)) { ?>

					<td><?php print $request['fecha_solicitada_peticion'];
							
							if (!empty($request['hora_deseada_visita'])) {

								print "<br>Horario: ".$request['hora_deseada_visita'];
							}
					?></td>
					<td><?php print ($request['status']) == 0 ? "Pendiente" : "Procesada"; ?></td>
					
					<?php } ?>

					<td><?php print $customer['referencias_cliente']; ?></td>

					<?php if (isset($Loggued)) {?>
						<td><?php print $request['usuario_peticion']; ?></td>
					<?php } ?>
				
				</tr>
			</tbody>	
		</table>
		<?php } ?>
	</div>
</div>