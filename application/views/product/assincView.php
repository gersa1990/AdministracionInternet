<div id="login" class="requestService">
	  <h1 class="witoutMargin" >
	  	Buscar productos para asignar a la visita.
        <a href="javascript:void(0);" id="leanClose" onclick="$('#lean_overlay').click();">x</a>
	  </h1>

	  <form id="requestProducts">

		    <input type="text" name="name" id="searchProductForAdd" id="name" placeholder="Buscar producto" value="" required />
		    <img class="imgAutosinc hidden" src="<?php print base_url() ?>resources/images/autosinc/loading.gif">
		    <div class="resultsProducts">
		    	Resultados
		    </div>

	  </form>

	  <form id="requestSelectedProductsToAdd" class="hidden">

            <div class="" id="msgs" style="width: 78%;  margin: 0 auto; margin-bottom: 16px; min-height: 35px;">
                &nbsp;
            </div>

		  	<input type="text" id="nameProductSelected" disabled required placeholder="Nombre del producto">
		  	<input type="text" id="idProductSelected" disabled required>
		  	<input type="text" id="macAdressProduct" required placeholder="Mac Address del producto">
		  	<input type="text" id="serieProduct" required placeholder="Serie del producto">
            <input type="hidden" id="hashCustomer" required value="<?php print $_POST['hash']; ?>">
            <input type="text" id="descriptionProduct" placeholder="Descripción o cantidad del producto" required value="">
		  	<input type="submit" class="btn btn-danger" value="Asignar">
	  </form>

</div>

<script>

var timer;
var base_url = "<?php print base_url().'index.php/'; ?>";

$("#requestProducts").submit(function()
{
	return false;
});

$("#requestSelectedProductsToAdd").submit(function()
{
	$.post(base_url+"service/addProductsAssinc/",{  productID: $("#idProductSelected").val(),  productMACAddress: $("#macAdressProduct").val(),  serieProduct: $("#serieProduct").val(),  hash: $("#hashCustomer").val(), descriptionProduct : $("#descriptionProduct").val() }, function(dataResponse)
	{

        if (dataResponse != null && dataResponse != "") 
        {
            $("#msgs").html("<div class='alert alert-error'>Producto agregado con éxito</div>");
            $(".asincTableProducts").removeClass("hidden");
            clearInterval(timer);
            timer = setTimeout(function() 
            {   
                $('#lean_overlay').click();
                $("#msgs").html("&nbsp;");

                $.post(base_url+"service/getAssincDataFromProductAdded/",{ serviceID: dataResponse }, function(data)
                {

                    clearInterval(timer);
                    timer = setTimeout(function() 
                    { 
                        $("#productsAddedWithTheCustomer").append($.parseHTML( data ));
                        
                        $(function() {
                            $('a[rel*=leanModal]').leanModal({ top : 150, overlay : 0.9, closeButton: 'modal_close' 
                            });
                        });

                        $("#element_"+dataResponse).addClass("animateTrAdded");

                        setTimeout(function() 
                        { 
                            $("#element_"+dataResponse).removeClass("animateTrAdded");

                        },4000);

                        function deleteProductAsyncronus(idService)
                        {
                            $.post(base_url+"service/getDeleteFormProductFromId/",{serviceID: idService}, function(data)
                            {
                                $("#popup").html(data).css("top","10px");
                                $("#formDeleteProduct").submit(function()
                                {
                                    var serviceID = $("#idService").val();
                                    $.post(base_url+"service/deleteFromId/",{serviceID: serviceID}, function(data)
                                    {
                                        if (data) 
                                        {
                                            $("#lean_overlay").click();

                                            setTimeout(function()
                                            {
                                                $("#element_"+idService).addClass("animateTrDeleted");
                                            },1000);

                                            clearInterval(timer);
                                            timer = setTimeout(function() 
                                            {   
                                                $("#element_"+idService).fadeOut("slow");
                                            }, 4000);
                                        }
                                    });
                                    return false;
                                });
                            })
                        }
                        
                    },2000);
                    
                });

            }, 4000);
        }

	});

	return false;
});

$("#searchProductForAdd").on("keyup",function()
{
	$(".imgAutosinc").removeClass("hidden");

	clearInterval(timer);
    timer = setTimeout(function() 
    {	
    	$.post(base_url+"products/searchProducts/",{products: $("#searchProductForAdd").val()}, function(data)
    	{
    		$(".resultsProducts").html(data);

    		$(".resultsProducts .addProductFounded").each(function(item)
    		{
    			var id   =  $(this).attr("id");
    			var name =  "";
    			
    			$("#"+id).click(function(data)
    			{
    				$.post(base_url+"products/getNameProduct/",{id: id}, function(dataResponse)
    				{
    					name = dataResponse;

    					$("#requestProducts").slideUp("slow");
    					$("#requestSelectedProductsToAdd").slideDown("slow");

    					$("#nameProductSelected").val(name);
    					$("#idProductSelected").val(id);

    				});
    			});
    		});

    	}).done(function()
    	{
    		$(".imgAutosinc").addClass("hidden");
    	});

    }, 1000);
});

</script>