<tr id="product_<?php print $product['id_producto']; ?>">
	<td><?php print $identifier; ?></td>
	<td id="name"><?php print $product['nombre_producto']; ?></td>
	<td>
		<a rel="leanModal" id="" name="#popup" href="#popup" onclick="editProductAdded(<?php print $product['id_producto']; ?>)">
			<img src="http://localhost/Dropbox/AdministracionInternet/resources/images/customer/buttons-actions/edit.png" width="20">
		</a>					
	</td>
</tr>