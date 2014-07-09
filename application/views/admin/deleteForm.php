	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Estás seguro que deseas eliminarlo?
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <form id="formDeleteAdmin">
				  	
				  	<span>Nombre </span>
				  	<label style="width: 75%;"><?php print $admin['nombre_administrador'].' '.$admin['apellidos_administrador']; ?></label>
				  
					<input type="hidden" id="idAdmin" value="<?php print $admin['id_administrador']; ?>">
					<input type="submit" class="btn-submit" value="Aceptar" />
				 	
				  </form>
				</div>
		</div>
	</div>
</div>


<script>

var base_url = "<?php print base_url(); ?>";

$("#formDeleteAdmin").submit(function()
{
	var adminID = $("#idAdmin").val();

	$.post(base_url+"/admin/deleteAdmin/",{id: adminID}, function(response)
	{
		$("#lean_overlay").click();

		if (response)
		{
			setTimeout(function()
			{
				$("#admin_"+adminID).slideUp("slow");
			},1000);
			
		}
	});

	return false;
});

</script>