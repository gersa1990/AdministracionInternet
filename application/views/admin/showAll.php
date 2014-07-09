<div class="wrapper">
	<div class="main">
	<br>
	

	<?php if (isset($admins)) { ?>

	<table class="table">
		<thead>
			<tr>
				<td colspan="5">
					Administradores registrados
					<a rel="leanModal" id="asignProductsButton" style="width: 211px; float: right;" name="#popup" href="#popup" class="btn btn-danger" onclick="addAdminAsyncronus()" /> Agregar </a>
				</td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td>Usuario</td>
				<td>Contraseña</td>	
				<td>Tipo</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody style="text-align: left;" id="adminAdded">
		<?php foreach ($admins as $key => $admin) { ?>
			<tr id="admin_<?php print $admin['id_administrador']; ?>">
				
				<td><?php print $admin['nombre_administrador']." ".$admin['apellidos_administrador']; ?></td>
				<td><?php print $admin['usuario_administrador']; ?></td>
				<td><?php print $admin['contrasena_administrador']; ?></td>
				
				<td><?php print $admin['nombre_tipo_administrador']; ?></td>
				<td>
					<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="editAdmin(<?php print $admin['id_administrador']; ?>)" /><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/edit.png" width="20"></a>
					<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="deleteAdmin(<?php print $admin['id_administrador']; ?>)" /><img src="<?php print base_url() ?>resources/images/customer/buttons-actions/delete.png" width="20"></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php } else { ?>
	<div class="alert alert-error">No existen servicios instalados.</div>
	<?php } ?>
	
	</div>
</div>
<br/><br/><br/>

<div id="lean_overlay"></div>
<div id="popup" class="wrapper"></div>

<script>

var base_url = "<?php print base_url(); ?>";
	
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

function addAdminAsyncronus()
{
	$.post(base_url+"/admin/getFormToAddAdmin/", function(response)
	{
		$("#popup").html(response).css("top","10px");
	});
}

</script>