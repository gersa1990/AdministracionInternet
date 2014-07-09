	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Editar pago
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  	<?php
				  	echo form_open("payments/edit/");
				  	?>				  	
				  	
				  	<input type="number" name="amount"   		placeholder="Cantidad monetaria" value="<?php print $paymentType['cantidad']; ?>" 		required="true" />
				  	<input type="text"   name="description"	placeholder="Descripción" 		 value="<?php print $paymentType['descripcion']; ?>"	required="true" />             
				  	<input type="hidden" name="typeOfPayment" value="<?php print $paymentType['id_tipo_pago']; ?>" />

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>
