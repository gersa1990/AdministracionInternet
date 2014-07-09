	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Editar administrador
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formEditAdmin">
				  	
				  	<span>Nombre </span>
				  	<input type="text" id="nameAdmin"    	placeholder="Nombre" 	 required value="<?php print $admin['nombre_administrador']; ?>" />
					
					<span>Apellidos </span>
					<input type="text" id="lastNameAdmin" 	placeholder="Apellidos"  required value="<?php print $admin['apellidos_administrador']; ?>" />
				    
				    <span>Usuario </span>
				    <input type="text" id="userAdmin" 		placeholder="Usuario" 	 required value="<?php print $admin['usuario_administrador']; ?>" />
				    
				    <span>Contraseña </span>
				    <input type="text" id="passAdmin" 		placeholder="Contraseña" required value="<?php print $admin['contrasena_administrador']; ?>" />

				    <span>Tipo de administrador </span>
					<select id="typeAdmin">
					<?php foreach ($typesAdmin as $key => $admins) { ?>
						<option value="<?php print $admins['id_tipo_admin']; ?>" <?php if ($admins['id_tipo_admin'] == $admin['id_administrador'] ) { print "selected"; } ?>>
							<?php print $admins['nombre_tipo_administrador']; ?>
						</option>
					<?php } ?>
					</select>
					
					<input type="hidden" id="idAdmin" value="<?php print $admin['id_administrador']; ?>">

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>

<script>

var base_url = "<?php print base_url(); ?>";
	
$("#formEditAdmin").submit(function()
{
	var nameAdmin 		= $("#nameAdmin").val();
	var lastNameAdmin	= $("#lastNameAdmin").val();
	var userAdmin		= $("#userAdmin").val();
	var passAdmin		= $("#passAdmin").val();
	var typeAdmin 		= $("#typeAdmin").val();
	var adminID 		= $("#idAdmin").val();

	$.post(base_url+"index.php/admin/editAdmin/",
							{
								name: 		nameAdmin, 
							 	lastName: 	lastNameAdmin,
							 	user: 		userAdmin,
							 	pass:       passAdmin,
							 	type: 		typeAdmin,
							 	id: 		adminID
							},  function(data)
	{
		if (data == "Edited")
		{
			$("#lean_overlay").click();

			$.post(base_url+"index.php/admin/getAsincAdminEdited/",{id: adminID}, function(response)
			{
				console.log(response);

				$("#admin_"+adminID).html(response);

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