<?php if (isset($products)) 
{ 
	foreach ($products as $key => $product) { ?>
	<div class="resultShowed">
		<span><?php print $product['nombre_producto']." => ".$product['id_producto']; ?></span><button class="addProductFounded" id="<?php print $product['id_producto'] ?>">Agregar</button>
	</div>
<?php } } ?>