
	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Administradores
				  </h1>

				  <?php
					echo form_open("index.php/session/sessionIgniter/");
				  ?>
				    <input type="user" name="user" placeholder="Usuario" required />
				    <input type="password" name="password" placeholder="Contraseña" required />
				    <input type="submit" class="btn-submit" value="Iniciar sesión" />
				  </form>
				    <a rel="leanModal" id="editarEspecialidad" name="#popup" href="#popup" class="btn btn-danger" onclick="requestFromNewCustomer()" />Solicitar presupuesto </a>
				</div>
		</div>
	</div>
</div>

<div id="lean_overlay"></div>
<div id="popup" class="wrapper"></div>

<script>

var base_url = "<?php print base_url(); ?>";
var exist_error = "<?php print $error; ?>";

if (exist_error) 
{
	alert("Usuario o contraseña no coinciden. Comunicate con tu administrador. ");
}

function requestFromNewCustomer()
{
	$.post(base_url+"/service/sendRequestToNewCustomer/", function(dataReceived)
	{
		$("#popup").html(dataReceived).css("top","10px");
		$(".main").css("margin-top","-17px").css("top","0px");
	});
}

</script>