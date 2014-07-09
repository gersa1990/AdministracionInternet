<script src="<?php print base_url() ?>resources/js/classie.js"></script>
		<script src="<?php print base_url() ?>resources/js/gnmenu.js"></script>
		
		<?php if (isset($Loggued)) { ?>
		<script>

			new gnMenu( document.getElementById( 'gn-menu' ) );

		</script>
		<?php } ?>

		<script src="<?php print base_url() ?>resources/js/script.js"></script>

	</body>

	<script>

		var base_url = "<?php print base_url().'index.php'; ?>";
		var timer;
		setConstBaseUrl(base_url);

		var height = $(window).height();

		$(function() {
        	$('a[rel*=leanModal]').leanModal({ top : 150, overlay : 0.9, closeButton: 'modal_close' });
      	});

      	$("#searchService").keyup(function()
      	{
      		clearInterval(timer);
            timer = setTimeout(function(data) 
            { 
            	var toSearchService = $("#searchService").val();

            	$.post(base_url+"/products/searchServiceAsyncronus/", {token : toSearchService}, function(dataResponse)
            	{
            		console.log(dataResponse);
            	});

            },2000);
      		
      	});

	</script>
</html>