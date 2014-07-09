<div class="wrapper">
	<div class="main">
	<br>
	
	<?php if (isset($customer)) { ?>

		<table class="table">
			<thead>
				<tr>
					<td>
						<span style="padding: 8px; margin-top: 0px; float: left;"> Datos de la solicitud <?php print "  ".$request['hash_peticion']."     <strong>STATUS: </strong>".$request['status']; ?></span>
						<a rel="leanModal" id="asignProductsButton" style="width: 211px; float: right;" name="#popup" href="#popup" class="btn btn-danger" onclick="getAsincForm()" /> Asignar productos </a>
					</td>
				</tr>
				
			</thead>
			<tbody>

				<tr>
					<td> <strong>Nombre:</strong> <?php print $customer['nombre_cliente']." ".$customer['apellido_paterno_cliente']." ".$customer['apellido_materno_cliente']; ?></td>
				</tr>
				<tr>
					<td><strong>Dirección: </strong><?php print $customer['calle_cliente']." <strong>Colonia: </strong>".$customer['colonia_cliente']." <strong>CP: </strong>".$customer['codigo_postal_cliente']; ?></td>
				</tr>
				<tr>
					<td><strong>Lugar: </strong><?php print $customer['ciudad_cliente'].", ".$customer['municipio_cliente']; ?></td>
				</tr>
				<tr>
					<td><strong>Referencias: </strong><?php print $customer['referencias_cliente']; ?></td>
				</tr>
				<tr>
					<td> 
					<?php 

						if(!empty($customer['telefono_cliente']))
						{
							print "<strong>Teléfono: <strong>".$customer['telefono_cliente'];
						} 
						if (!empty($customer['correo_cliente'])) {
							print "<br><strong>Correo: <strong>".$customer['correo_cliente'];
						}

					?>
					</td>
				</tr>
				<tr>
					<td>
						<?php
						if(!empty($request['usuario_peticion']))
						{
							print "<strong>Petición realizada por: </strong>".$request['usuario_peticion'];
						} 
						?>
					</td>
				</tr>
				<tr>
					<td>
						
						<?php 
							print "<strong>Día que se realizó la petición: </strong>".$request['fecha_realizada_peticion']; 
						?>

					</td>
				</tr>
				<tr>
					<td>

						<?php 
							print "<strong>Fecha que se solicita la visita: </strong>".$request['fecha_solicitada_peticion']; 
						?>

					</td>
				</tr>
			</tbody>	
		</table>
		<?php } ?>

		<br/>
		<?php if (!isset($service) && empty($service) || count($service) <= 0){ ?>
		<table class="table hidden asincTableProducts">
		<?php } else { ?>
		<table class="table">
		<?php } ?>
			<thead>
				<tr>
					<td colspan="8">
						Productos instalados con este cliente
					</td>
				</tr>
				<tr>
					<td>Producto</td>
					<td>MAC Address</td>
					<td>Número de serie</td>
					<td>Descripción</td>
					<td>Fecha expedición</td>
					<td>Fecha de instalación</td>
					<td>Instalado</td>
					<td>Opciones</td>
				</tr>
			</thead>
			<tbody id="productsAddedWithTheCustomer">
			<?php foreach ($service as $key => $dataService) { ?>
				<tr id="element_<?php print $dataService['id_servicio']; ?>">
					<td>
						<?php print $dataService['nombre_producto']; ?>
					</td>
					
					<td>
						<?php print $dataService['mac_address_prestamo']; ?>
					</td>

					<td>
						<?php print $dataService['numero_serie_prestamo']; ?>	
					</td>

					<td>
						<?php print $dataService['descripcion_cantidad_prestamo']; ?>
					</td>

					<td>
						<?php print $dataService['fecha_expedicion_servicio']; ?>
					</td>

					<td>
						<?php print $dataService['fecha_instalacion_servicio']; ?>
					</td>

					<td>
						<?php print $dataService['status_servicio']; ?>
					</td>

					<td>
						<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="editProductAsyncronus(<?php print $dataService['id_servicio']; ?>)" /><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/edit.png" width="20"></a>
						<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="deleteProductAsyncronus(<?php print $dataService['id_servicio']; ?>)" /><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/delete.png" width="20"></a>
					</td>

				</tr>
			<?php } ?>
			</tbody>
		</table>

		<br><br><br>
	</div>
</div>



<div id="lean_overlay"></div>
<div id="popup" class="wrapper"></div>

<script>

var base_url = "<?php print base_url().'index.php'; ?>";

var __hash = "<?php print $hash; ?>";
var timer;

function getAsincForm()
{
	$.post(base_url+"/products/getFormToAsignProducts/",{hash: __hash }, function(data)
	{
		$("#popup").html(data).css("top","10px");
	});
}

function editProductAsyncronus(idService)
{
	$.post(base_url+"/service/fetEditFormProductFromId/",{serviceID: idService}, function (data)
	{
		$("#popup").html(data).css("top","10px");
		$("#formEditProduct").submit(function()
		{
			
			return false;
		});
	});
}

function deleteProductAsyncronus(idService)
{
	$.post(base_url+"/service/getDeleteFormProductFromId/",{serviceID: idService}, function(data)
	{
		$("#popup").html(data).css("top","10px");
		$("#formDeleteProduct").submit(function()
		{
			var serviceID = $("#idService").val();
			$.post(base_url+"service/deleteFromId/",{serviceID: serviceID}, function(data)
			{
				if (data) 
				{
					$("#lean_overlay").click();

					setTimeout(function()
					{
						$("#element_"+idService).addClass("animateTrDeleted");
					},1000);

					setTimeout(function() 
		            {   
		                $("#element_"+idService).fadeOut("slow");
		            }, 4000);
				}
			});
			return false;
		});
	})
}


</script>