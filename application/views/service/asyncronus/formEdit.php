	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Editar producto
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formEditProduct">
				  	
				  	<span>Nombre </span>
				    <input type="text" name="nameProduct"  placeholder="Nombre" required value="<?php print $product['nombre_producto']; ?>" />
				    <span>Mac Address</span>
				    <input type="text" name="macProduct"   placeholder="Mac Address" required value="<?php print $product['mac_address_prestamo']; ?>" />
					<span>Número de serie</span>
					<input type="text" name="serieProduct" placeholder="Serie del producto" required value="<?php print $product['numero_serie_prestamo']; ?>" />
					<span>Descripción o cantidad prestada</span>
					<input type="text" name="descriptionProduct" placeholder="Descripción" required value="<?php print $product['descripcion_cantidad_prestamo']; ?>">
					<input type="hidden" id="idService" value="<?php print $product['id_servicio']; ?>">
					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div