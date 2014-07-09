	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Estás seguro que deseas eliminarlo
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formDeleteProduct">
				  
				    <input type="text" name="nameProduct"  placeholder="Nombre" disabled required value="<?php print 'Producto: '.$product['nombre_producto']; ?>" />
				    <input type="text" name="macProduct"   placeholder="Mac Address" disabled required value="<?php print 'MAC: '.$product['mac_address_prestamo']; ?>" />
					<input type="text" name="serieProduct" placeholder="Serie del producto" disabled required value="<?php print 'Serie: '.$product['numero_serie_prestamo']; ?>" />
					<input type="hidden" id="idService" value="<?php print $product['id_servicio']; ?>">
					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>