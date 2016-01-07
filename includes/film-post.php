<div onmouseleave="postMinimize(<?php echo $post["PostID"]; ?>);" class="post-container">
	<div class="post-footer">
			<table class="post-publication-date">
				<tr><td><?php echo $post["PublicationDate"]; ?></td><tr>
			</table>
	</div>
	<div class="post-video" onclick="playVideo(<?php echo $post["PostID"]; ?>);">
		<div class="video-responsive" style="background: url(<?php echo $post["Picture"]; ?>);background-position: center;background-size: cover;background-repeat: no-repeat;">
			<div class="video-overlay"></div>
			<iframe class="video-frame" id="video<?php echo $post["PostID"]; ?>" src="<?php echo $post["VideoURL"]; ?>?api=1&player_id=video<?php echo $post["PostID"]; ?>" width="100px" height="70px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
			</iframe>
		</div>
	</div>
	<div class="post-title">
		<a class="post-title-link" href="/?postid=<?php echo $post["PostID"] ?>"><?php echo $post["Title"]; ?></a>
	</div>
	<div class="expander-hover">
		<div class="post-description">
			<?php echo $post["Description"];	?>
		</div>
		<div class="post-readmore-container" id="post-readmore-container<?php echo $post["PostID"]; ?>">
			<button type="button" class="button-readmore" id="button-readmore<?php echo $post["PostID"]; ?>" onclick="postExpander(<?php echo $post["PostID"]; ?>);">Expand</button>
		</div>
		<div class="movie-trivia" id="expander<?php echo $post["PostID"]; ?>">
			<div class="post-film-credits" id="post-film-credits<?php echo $post["PostID"];?>">
			<?php if($post["Director"] != ""){ ?>
				<span class="post-expander-header"><?php echo $director; ?>: </span>
				<?php echo $post["Director"]; ?>
				<br><br>
			<?php } ?>
			<?php if($post["Producer"] != ""){ ?>
				<span class="post-expander-header"><?php echo $producer; ?>: </span>
				<?php echo $post["Producer"]; ?>
				<br><br>
			<?php } ?>
			<?php if($post["Screenplay"] != ""){ ?>
				<span class="post-expander-header">Screenplay: </span>
				<?php echo $post["Screenplay"]; ?>
				<br><br>
			<?php } ?>
			<?php if($post["DoP"] != ""){ ?>
				<span class="post-expander-header">DoP: </span>
				<?php echo $post["DoP"]; ?>
				<br><br>
			<?php } ?>
			<?php if($post["Cast"] != ""){ ?>
				<span class="post-expander-header">Cast: </span>
				<?php echo $post["Cast"]; ?>
				<br><br>
			<?php } ?>
			<?php if($post["Year"] != ""){ ?>
				<span class="post-expander-header">Year :</span>
				<?php echo $post["Year"]; ?>
			<?php } ?>
			</div>
			<div class="post-film-trivia" id="post-film-trivia<?php echo $post["PostID"]; ?>">
				<?php echo $post["Trivia"]; ?>
			</div>
		</div>
	</div>
</div>