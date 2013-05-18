<?php include('header.php'); ?>

    <?php for($i=0; $i<sizeof($posts); $i++) { 
	$post = $posts[$i]; ?>
	<div class="article_preview">
            <a class="article_title" href="<?php echo $post["path"]; ?>">
		<?php echo $post["title"]; ?>
	    </a>
	    <span class="article_date">
		<?php echo $post["date"]; ?>	
	    </span>
	    <div class="article_body_preview">
		<?php echo substr($post["body"], 0, 80*3); echo "..."; ?>
	    </div>
	    
	    <?php //TODO add field to json for an "abstract" the post is about. ?>

	</div>

    <?php }; ?>

<?php include('footer.php'); ?>
