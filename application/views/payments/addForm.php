	<div class="wrapper">
		<div class="main">
				<div id="login">
				  <h1 class="witoutMargin">
				  	Agregar nuevo producto
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <?php 
				  echo form_open(base_url()."index.php/payments/add/");
				  ?>
				  	
				  	
				  	
				  	<input type="number" name="amount"   		placeholder="Cantidad monetaria" 	required/>
				  	<input type="text"   name="description"	placeholder="Descripción" 			required/>             

					<input type="submit" class="btn-submit" value="Aceptar" />
				  
				  </form>
				</div>
		</div>
	</div>
</div>