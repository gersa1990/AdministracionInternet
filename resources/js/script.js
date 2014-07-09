var base_url = "";

function setConstBaseUrl(base)
{
	this.base_url = base;
}

function printBaseUrl()
{
	console.log("base: "+this.base_url);
}


/*##########################################
Form session initiqal
############################################*/

$('#toggle-login').click(function(){
  $('#login').toggle();
});

var height = $(window).height();

$(".main #login").css("margin-top","120px");
$("body").css("mih-height",height);

/*##########################################
End form session initiqal
############################################*/

function firstUpper(string)
{ 
	return string.charAt(0).toUpperCase() + string.slice(1); 
} 

function clearAccent(text)
{

    var  text = text.replace(/[áàäâå]/, 'a');
    text = text.replace(/[éèëê]/, 'e');
    text = text.replace(/[íìïî]/, 'i');
    text = text.replace(/[óòöô]/, 'o');
    text = text.replace(/[úùüû]/, 'u');
    text = text.replace(/[ýÿ]/, 'y');
    text = text.replace(/[ñ]/, 'n');
    text = text.replace(/[ç]/, 'c');
    
    return firstUpper(text);
}



////////// CLASES ///////////////////////////


/*##########################################

############################################*/

var objLocate 	= new geoLocate();

function geoLocate()
{
	var country          				= ""; //Estado
	var sublocality    					= ""; //Delegación
	var administrative_area_level_1    	= ""; //Municipio
	var postal_code 					= ""; // Código postal
	var neighborhood 					= ""; // Colonia
	var street_address 					= "";

	var betweenStrets 					= ""; // Beta
}

function returnLocate()
{
	return this.objLocate;
}

function getAutoLocation()
{

	if (navigator.geolocation)
	{
		return navigator.geolocation.getCurrentPosition(showPosition);
	}
	else
	{
		alert( "Geolocalización no está soprtada por este navegador.");
	}
}
	
function showPosition(position)
{
	
	if (!position)
	{
		alert("Geolocalización no está soportada por este navegador. Por favor utiliza Chrome.");
	}

	$.post("http://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=true", function(callBackGoogle)
	{
		callBackGoogle = callBackGoogle["results"];

		console.log(callBackGoogle);
		
		var item 		= "";

		for (var i = 0; i <= callBackGoogle.length ; i++) 
		{
			
			item = callBackGoogle[i];

			if (item)
			{
				var token = item["types"][0];
				var resul = item["address_components"][0]["long_name"];

				switch(token)
				{
					case "country":
						objLocate.country = clearAccent(resul);
					break;

					case "sublocality":
						objLocate.sublocality = clearAccent(resul);
					break;

					case "administrative_area_level_1":
						objLocate.administrative_area_level_1 = clearAccent(resul);
					break;

					case "postal_code":
						objLocate.postal_code = clearAccent(resul);
					break;

					case "neighborhood":
						objLocate.neighborhood = clearAccent(resul);
					break;

					case "street_address":
						objLocate.street_address = clearAccent(item['address_components'][1]['long_name']+" # "+item['address_components'][0]['long_name']);
					break;
				}
			}
		}

		doneLocation();
	});
}


