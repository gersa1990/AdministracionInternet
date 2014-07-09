<script>
	
	var indice = 1;

</script>

<div class="wrapper">
	<div class="main">
		<br>
		<table class="table">
			<thead>
				<tr>
					<td colspan="3">
						Productos agregados
						<a rel="leanModal" id="asignProductsButton" style="width: 211px; float: right;" name="#popup" href="#popup" class="btn btn-danger" onclick="addProductAsyncronus()" /> Agregar </a>
					</td>
				</tr>
				<tr>
					<td>Número</td>
					<td>Producto</td>
					<td>Opciones</td>
				</tr>
			</thead>
			<tbody id="productsAdded">

			<?php $i = 1; foreach ($products as $key => $product) { ?>
				<tr id="product_<?php print $product['id_producto']; ?>">
					<td><?php print $i;  ?></td>
					<td id="name"><?php print $product['nombre_producto'];  ?></td>
					<td>
						<a rel="leanModal" id="" name="#popup" href="#popup" onclick="editProductAdded(<?php print $product['id_producto']; ?>)" /><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/edit.png" width="20"></a>					
					</td>
				</tr>
				<script>

					indice ++;

				</script>
			<?php $i++; } ?>
			</tbody>
		</table>
	</div>
</div>

<div id="lean_overlay"></div>
<div id="popup" class="wrapper"></div>

<script>

var base_url = "<?php print base_url(); ?>";

function editProductAdded(productID)
{
	$.post(base_url+"/products/getFormToEdit/",{productID: productID}, function(response)
	{
		$("#popup").html(response).css("top","10px");

		$("#formEditProduct").submit(function()
		{
			var name = $("#nameProduct").val();
			var id   = $("#idProduct").val();

			$.post(base_url+"/products/editProduct/",{nameProduct: name, idProduct : id}, function(response)
			{
				console.log(response);

				if (response == "Edited") 
				{
					$("#lean_overlay").click();

					setTimeout(function()
					{
						$("#product_"+id+" #name").html(name);

					},1000);
				}
			})

			return false;
		});
	});
}

function addProductAsyncronus ()
{
	$.post(base_url+"/products/gerFotmToAddProduct/", function(response)
	{
		$("#popup").html(response).css("top","10px");

		$("#formAddProduct").submit(function()
		{
			var name = $("#nameProduct").val();

			$.post(base_url+"/products/addAsyncronusProduct/", {nameProduct: name}, function(response)
			{
				if ($.isNumeric(response)) 
				{
					$.post(base_url+"/products/getRowProductAsyncronus/",{identifier: indice, productID: response}, function(responseRow)
					{

						$("#lean_overlay").click();

						$("#productsAdded").append($.parseHTML( responseRow ));

						$(function() {
				        	$('a[rel*=leanModal]').leanModal({ top : 150, overlay : 0.9, closeButton: 'modal_close' });
				      	});

					});
				}
			});

			return false;
		});
	});
}

</script>