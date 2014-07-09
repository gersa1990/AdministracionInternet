
<td><?php print $admin['nombre_administrador']." ".$admin['apellidos_administrador']; ?></td>			
<td><?php print $admin['usuario_administrador']; ?></td>
<td><?php print $admin['contrasena_administrador']; ?></td>
<td><?php print $admin['nombre_tipo_administrador']; ?></td>

<td>
	<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="editAdmin(<?php print $admin['id_administrador']; ?>)"><img src="http://localhost/Dropbox/AdministracionInternet/resources/images/customer/buttons-actions/edit.png" width="20"></a>
	<a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" onclick="deleteAdmin(<?php print $admin['id_administrador']; ?>)"><img src="http://localhost/Dropbox/AdministracionInternet/resources/images/customer/buttons-actions/delete.png" width="20"></a>
</td>
