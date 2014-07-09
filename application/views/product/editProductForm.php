	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Editar el producto número  <?php print $product['id_producto']; ?>
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formEditProduct">
				  	
				  	
				  	<span>Nombre del producto</span>
				  	<input type="text" id="nameProduct"    	placeholder="Nombre del producto" 	 required value="<?php print $product['nombre_producto']; ?>" />
					
					
					<input type="hidden" id="idProduct" value="<?php print$product['id_producto']; ?>">

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>