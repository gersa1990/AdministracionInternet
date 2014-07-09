<?php

if (isset($postData))
{
	$formData = $postData;
}
else
{
	$formData = array('name' 							=> "",
					  'paternaLastName' 				=> "",
					  'maternLastName'					=> "",
					  'cellPhone'						=> "",
					  'email'							=> "",
					  'street_address'					=> "",
					  'neighborhood'					=> "",
					  'postal_code'						=> "",
					  'administrative_area_level_1'		=> "",
					  'sublocality'						=> "",
					  'references'						=> "",
					  'dayForVisit'						=> "",
					  'timeForVisit'					=> "",
					  );
}

$day = $formData['dayForVisit'];

?>

<div class="wrapper">
		<div class="main">
				<div id="login" class="requestService">
				  <h1 class="witoutMargin">
				  	Favor de llenar la solicitud y verificar sus datos.
				  	<a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
				  </h1>

				  <?php
				  	echo validation_errors();
				  	$attr = array('id' => "requestFromService" );
					echo form_open("index.php/customer/addRequestFromService/", $attr);
				  ?>

				    <input type="text" name="name" id="name" placeholder="Nombre(s)" value="<?php print $formData['name']; ?>" required />
				    
				    <input type="text" name="paternaLastName" id="paternaLastName" class="two-columns" placeholder="Apellido paterno" value="<?php print $formData['paternaLastName']; ?>" required />
				    <input type="text" name="maternLastName" id="maternLastName" class="two-columns" placeholder="Apellido materno" value="<?php print $formData['maternLastName']; ?>" required />

				    <br/>

				    <hr width="77%">
				    
				    <span id="googleGeolocate" style="margin-left: 69px !important;">
				  			Llenar datos automáticamente. <input id="autocompleteData" type="checkbox">
				  	</span>

				  	<br/><br/>

				    <input type="text" name="street_address" id="street_address" value="<?php print $formData['street_address']; ?>" placeholder="Dirección" required />
				    
				    <input type="text" name="administrative_area_level_1" value="<?php print $formData['administrative_area_level_1']; ?>" id="administrative_area_level_1" class="three-columns" placeholder="Estado" required />
				    <input type="text" name="sublocality" id="sublocality" value="<?php print $formData['sublocality']; ?>" class="three-columns" placeholder="Mpo/Delegación" required />
				    <input type="text" name="neighborhood" id="neighborhood" value="<?php print $formData['neighborhood']; ?>" class="three-columns" placeholder="Colonia" required />
				    
				    <input type="text" name="references" class="two-columns" value="<?php print $formData['references']; ?>" placeholder="Entre calles" />
				    <input type="text" id="postal_code" name="postal_code" class="two-columns" value="<?php print $formData['postal_code']; ?>" placeholder="Código postal" />

					<a class="btn btn-danger" style="margin-left: -81px; width: 12% !important;padding: 8px !important;margin-top: -7px; border-radius: 0px;" href="http://tucodigo.mx/" target="_blank">Verificar</a>
					<br/>
					<hr width="77%">


				    <input type="text" name="cellPhone" class="two-columns" value="<?php print $formData['cellPhone']; ?>" placeholder="Teléfono" />
				    <input type="text" name="email" class="two-columns" value="<?php print $formData['email']; ?>" placeholder="Correo" />
				    <input type="text" class="two-columns"			id="dayForVisit" placeholder="Día para visita" value="<?php print $formData['dayForVisit']; ?>" required />
				    <input type="text" name="timeForVisit" class="two-columns"			id="timeForVisit" placeholder="Horario para visita" value="<?php print $formData['timeForVisit']; ?>" required />
				    <input type="hidden" name="dayForVisit" id="dayForVisitFormated" value="<?php print $formData['dayForVisit']; ?>" required />

				    <p>&nbsp;</p>

				    <input type="submit" class="btn-submit" value="Solicitar" />
				  </form>
				</div>
		</div>
	</div>

	<script>

	$('#timeForVisit').datetimepicker(
	{
		datepicker:false,
  		format:'h:i a', style: "position: absolute; z-index: 100000;"
	});

	$("#name").focusout(function()
	{
		$("#name").val(clearAccent($("#name").val()));
	});

	$("#paternaLastName").focusout(function()
	{
		$("#paternaLastName").val(clearAccent($("#paternaLastName").val()));
	});

	$("#maternLastName").focusout(function()
	{
		$("#maternLastName").val(clearAccent($("#maternLastName").val()));
	});

	if (navigator.userAgent.indexOf('Firefox') !=-1){

		$("#googleGeolocate").slideUp("slow");
  	} 
  	else
  	{
  		$("#autocompleteData").click(function(data)
		{
			var started = $("#autocompleteData").prop("checked");
		
			if (started)
			{
				getAutoLocation();
			}
		});
  	}
	
	

	function doneLocation()
	{
		var response = returnLocate();

		for(var i in response)
		{
			$("#"+i).val(response[i]);
		}
	}

	$("#dayForVisit").val("<?php print $day; ?>");

	$( "#dayForVisit" ).datepicker(
	{ 
		monthNames: [ 
				"Enero", 
				"Febrero", 
				"Marzo", 
				"Abril", 
				"Mayo", 
				"Junio", 
				"Julio", 
				"Agosto", 
				"Septiembre", 
				"Octubre", 
				"Noviembre", 
				"Diciembre" 
			] ,
			minDate: 0,
		}
	).change(function(data)
	{
		var dateToDB = $(this).val();

		$("#dayForVisitFormated").val(dateToDB);

		var dateFormat = $( "#dayForVisit" ).datepicker( "option", "dateFormat" );
		$( "#dayForVisit" ).datepicker( "option", "dateFormat", "DD,  d MM, yy" );
	});

	var dayNamesMin = $( "#dayForVisit" ).datepicker( "option", "dayNamesMin" );
	$("#dayForVisit").datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] );

	var dayNames = $( "#dayForVisit" ).datepicker( "option", "dayNames" );
	$( "#dayForVisit" ).datepicker( "option", "dayNames", [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ] );

	var dateFormat = $( "#dayForVisit" ).datepicker( "option", "dateFormat" );
	$( "#dayForVisit" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

	var day = "<?php print $day; ?>";

	if (day) 
	{
		$("#dayForVisit").val(day);
		var dateFormat = $( "#dayForVisit" ).datepicker( "option", "dateFormat" );
		$( "#dayForVisit" ).datepicker( "option", "dateFormat", "DD,  d MM, yy" );
	}

	</script>