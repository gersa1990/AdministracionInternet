	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Agregar administrador
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formAddAdmin">
				  	
				  	<input type="text" id="nameAdmin"    	placeholder="Nombre" 	 required />
					
					<input type="text" id="lastNameAdmin" 	placeholder="Apellidos"  required />
				    
				    <input type="text" id="userAdmin" 		placeholder="Usuario" 	 required />
				    
				    <input type="text" id="passAdmin" 		placeholder="Contraseña" required />

				    <span>Tipo de administrador </span>
					<select id="typeAdmin">
					<?php foreach ($typesAdmin as $key => $admins) { ?>
						<option value="<?php print $admins['id_tipo_admin']; ?>" >
							<?php print $admins['nombre_tipo_administrador']; ?>
						</option>
					<?php } ?>
					</select>

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>

<script>

var base_url = "<?php print base_url(); ?>";
	
$("#formAddAdmin").submit(function()
{
	var nameAdmin 		= $("#nameAdmin").val();
	var lastNameAdmin	= $("#lastNameAdmin").val();
	var userAdmin		= $("#userAdmin").val();
	var passAdmin		= $("#passAdmin").val();
	var typeAdmin 		= $("#typeAdmin").val();
	var adminID 		= $("#idAdmin").val();

	$.post(base_url+"index.php/admin/addAdmin/",
							{
								name: 		nameAdmin, 
							 	lastName: 	lastNameAdmin,
							 	user: 		userAdmin,
							 	pass:       passAdmin,
							 	type: 		typeAdmin

							},  function(data)
	{

		if (data)
		{
			$("#lean_overlay").click();

			$.post(base_url+"index.php/admin/getAsincAdminAdded/",{id: data}, function(response)
			{
				$("#adminAdded").append(response).css("top","10px");

				var base_url = "<?php print base_url(); ?>";

				$(function() {
		        	$('a[rel*=leanModal]').leanModal({ top : 150, overlay : 0.9, closeButton: 'modal_close' });
		      	});
	
				function editAdmin(admin){

					$.post(base_url+"/admin/editAdminForm/",{admin: admin},function(data)
					{
						$("#popup").html(data).css("top","10px");
					});
				}

				function deleteAdmin(admin){

					$.post(base_url+"/admin/deleteAdminForm/",{admin: admin},function(data)
					{
						$("#popup").html(data).css("top","10px");
					});
				}

			});
		}
	});

	return false;
});



</script>