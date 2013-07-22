<?php include "config.php" ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<div id="blog">
<script>
	$(document).ready(function() {
		bloggify(null);
	});

	function rebind() {
		$('#blog a').not('#ribbon a').bind('click', bloggify);
	}
 
	function fixImages() {
		$('#blog img').each(function( index ) {
			$(this).attr('src','<?php echo $config["images"];?>'+$(this).attr('src'));
		});
	}

	function bloggify(event) {
		if(event!=null)
			event.preventDefault();
		var url = '<?php echo $config["server_root"];?>'+$(this).attr('href');
		$(this).removeAttr("onclick");
		$('#blog').load(url, function() {
			fixImages();
			rebind();
			//alert('Load was performed.');
		});
	}
</script>
</div>

