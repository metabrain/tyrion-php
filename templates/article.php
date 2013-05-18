<?php include('header.php'); ?>

	<div class="article">
            <span class="article_title">
		<?php echo $posts[$i]["title"]; ?>
	    </span>
	    <span class="article_date">
		<?php echo $post["date"]; ?>	
	    </span>
	    <div class="article_body">
		<?php echo $post["body"]; ?>
	    </div>
	</div>
	<?php //TODO add Google+ comment section ?>

<?php include('footer.php'); ?>
