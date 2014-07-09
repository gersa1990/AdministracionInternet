<tr id="element_<?php print $product['id_servicio']; ?>">
	
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

	<td>
		<?php print $product['fecha_expedicion_servicio']; ?>
	</td>

	<td>
		<?php print $product['fecha_instalacion_servicio']; ?>
	</td>

	<td>
		<?php print $product['status_servicio']; ?>
	</td>

	<td>
		<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="editProductAsyncronus(<?php print $product['id_servicio']; ?>)" ><img src="<?php print base_url(); ?>resources/images/customer/buttons-actions/edit.png" width="20"></img></a>
		<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="deleteProductAsyncronus(<?php print $product['id_servicio']; ?>)" ><img src="<?php print base_url(); ?>resources/images/customer/buttons-actions/delete.png" width="20"></img></a>	
	</td>

</tr>

<script>



</script>