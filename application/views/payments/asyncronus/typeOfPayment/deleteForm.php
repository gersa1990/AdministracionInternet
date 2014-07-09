	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Eliminar
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  	<?php
				  	echo form_open("payments/delete/");
				  	?>		

				  	<center><span>Pago por <?php print "$".$paymentType['cantidad']; ?></span>	</center> 	  	
				  	
				  	
				  	<input type="hidden" name="typeOfPayment" value="<?php print $paymentType['id_tipo_pago']; ?>" />

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>