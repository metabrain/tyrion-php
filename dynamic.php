<?php include "config.php" ?>

<div id="blog">
<script>
	$(document).ready(function() {
		bloggify(null);
        });

	function rebind() {
		$('#blog a').bind('click', bloggify);
	}

	function bloggify(event) {
		if(event!=null)
			event.preventDefault();
		var url = <?php echo $config["server_root"];?>+$(this).attr('href');
		$(this).removeAttr("onclick");
		$('#blog').load(url, function() {
			rebind();
			//alert('Load was performed.');
		});
	}
</script>
</div>
