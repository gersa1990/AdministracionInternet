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
				  	Favor de verificar sus datos.
				  </h1>

				  <?php
				  	echo validation_errors();
				  	$attr = array('id' => "requestFromService" );
					echo form_open("index.php/customer/editRequestFromService/", $attr);
				  ?>

				    <input type="text" name="name" id="name" placeholder="Nombre(s)" value="<?php print $formData['name']; ?>" required />
				    
				    <input type="text" name="paternaLastName" id="paternaLastName" class="two-columns" placeholder="Apellido paterno" value="<?php print $formData['paternaLastName']; ?>" required />
				    <input type="text" name="maternLastName" id="maternLastName" class="two-columns" placeholder="Apellido materno" value="<?peft: -81px; width: 12% !important;padding: 8px !important;margin-top: -7px; border-radius: 0px;" href="http://tucodigo.mx/" target="_blank">Verificar</a>
					<br/>
					<hr width="77%">


				    <input type="text" name="cellPhone" class="two-columns" value="<?php print $formData['cellPhone']; ?>" placeholder="Teléfono" />
				    <input type="text" name="email" class="two-columns" value="<?php print $formData['email']; ?>" placeholder="Correo" />
				    <input type="text" class="two-columns"			id="dayForVisit" placeholder="Día para visita" value="<?php print $formData['dayForVisit']; ?>" required />
				    <input type="text" name="timeForVisit"  class="two-columns"			id="timeForVisit" placeholder="Horario para visita" value="<?php print $formData['timeForVisit']; ?>" required />
				    <input type="hidden" name="dayForVisit" id="dayForVisitFormated" value="<?php print $formData['dayForVisit']; ?>" required />
				    <input type="hidden" name="hash" value="<?php print $hash; ?>" required>
				    <p>&nbsp;</p>

				    <input type="submit" class="btn-submit" value="Solicitar" />
				  </form>
				</div>
		</div>
	</div>

	<script>

	var time = "<?php print $formData['timeForVisit']; ?>";


	console.log(time);

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
	
	$("#autocompleteData").click(function(data)
	{
		var started = $("#autocompleteData").prop("checked");
		
		if (started)
		{
			getAutoLocation();
		}
	});

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