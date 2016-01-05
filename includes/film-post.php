<div onmouseleave="mouseleave(<?php echo $row['PostID']; ?>);" class="post-container">
	<div class="post-title">
		<a class="post-title-link" href="/?postid=<?php echo $row['PostID'] ?>"><?php echo $row['Title']; ?></a>
	</div>
	<div class="post-video" onclick="showVideo(<?php echo $row['PostID']; ?>);">
		<div class="video-responsive" style="background: url(<?php echo $row['Picture']; ?>);background-position: center;background-size: cover;background-repeat: no-repeat;">
			<div class="video-overlay"></div>
				<iframe class="video-frame" id="video<?php echo $row['PostID']; ?>" src="<?php echo $row['VideoURL']; ?>?api=1&player_id=video<?php echo $row['PostID']; ?>" width="100px" height="70px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
				</iframe>
			</div>
		</div>		
	<div class="expander-hover">
		<div class="post-description">
			<?php echo $row['Description'];	?>
		</div>
		<div class="post-readmore-container" id="post-readmore-container<?php echo $row['PostID']; ?>">
			<button type="button" class="button-readmore" id="button-readmore<?php echo $row['PostID']; ?>" onclick="mouseenter(<?php echo $row['PostID']; ?>);">More information and options</button>
		</div>
		<div id="post-button-container<?php echo $row['PostID']; ?>" class="post-button-container">
			<button type="button" id="button-credits<?php echo $row['PostID']; ?>" onclick="showCredits(<?php echo $row['PostID']; ?>);">Credits</button>
			<button type="button" id="button-trivia<?php echo $row['PostID']; ?>" onclick="showTrivia(<?php echo $row['PostID']; ?>);">Trivia</button>
			<button type="button">Links</button>
			<button type="button">Like</button>
			<button type="button">Share</button>
			<button type="button">Comment</button>
			<button type="button">Report</button>
		</div>
		<div class="movie-trivia" id="expander<?php echo $row['PostID']; ?>">
			<div class="post-film-credits" id="post-film-credits<?php echo $row['PostID'];?>">
			<?php if($row['Director'] != ""){ ?>
				<span class="post-expander-header"><?php echo $director; ?>: </span>
				<?php echo $row['Director']; ?>
				<br><br>
			<?php } ?>
			<?php if($row['Producer'] != ""){ ?>
				<span class="post-expander-header"><?php echo $producer; ?>: </span>
				<?php echo $row['Producer']; ?>
				<br><br>
			<?php } ?>
			<?php if($row['Screenplay'] != ""){ ?>
				<span class="post-expander-header">Screenplay: </span>
				<?php echo $row['Screenplay']; ?>
				<br><br>
			<?php } ?>
			<?php if($row['DoP'] != ""){ ?>
				<span class="post-expander-header">DoP: </span>
				<?php echo $row['DoP']; ?>
				<br><br>
			<?php } ?>
			<?php if($row['Cast'] != ""){ ?>
				<span class="post-expander-header">Cast: </span>
				<?php echo $row['Cast']; ?>
				<br><br>
			<?php } ?>
			<?php if($row['Year'] != ""){ ?>
				<span class="post-expander-header">Year :</span>
				<?php echo $row['Year']; ?>
			<?php } ?>
			</div>
			<div class="post-film-trivia" id="post-film-trivia<?php echo $row['PostID']; ?>">
				<?php echo $row['Trivia']; ?>
			</div>
		</div>
		<div class="post-footer">
			<table class="post-publication-date">
				<tr><td><?php echo $row['PublicationDate'] . " - " . substr($row['PublicationTime'], 0, -3) . " CET"; ?></td><tr>
			</table>
		</div>
	</div>
</div>