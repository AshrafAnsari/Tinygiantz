<?php require "includes/film-post-preformat.php"; ?>
<div onmouseleave="postMinimize(<?php echo $post["PostID"]; ?>);" class="post-container" title="<?php echo $post["Title"]; ?>">
	<div class="post-footer">
			<table class="post-publication-date"
				<tr><td><span title="Published on <?php echo $post["PublicationDate"]; ?> at <?php echo substr($post["PublicationTime"], 0, -3); ?> (CET)<?php if ($debug) { echo "&#10;Tinygiantz ID: " . $post["PostID"] . "&#10;" . $post["VideoHost"] . " ID: " . $post["VideoID"]; }?>"><?php echo $post["PublicationDate"]; ?></span></td><tr>
			</table>
	</div>
	<div class="post-video" onclick="playVideo(<?php echo $post["PostID"]; ?>);">
		<div class="video-responsive" style="background: url(assets/pictures/posts/<?php echo $post["PostID"] . $image_format; ?>);background-position: center;background-size: cover;background-repeat: no-repeat;">
			<div class="video-overlay"></div>
			<p class="video-overlay-title"><?php echo $post["Title"]; ?></p>
			<iframe class="video-frame" id="video<?php echo $post["PostID"]; ?>" src="" data-video-source="<?php echo $post["VideoURL"]; ?>?wmode=opaque&api=1&autoplay=1" width="100px" height="70px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
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
			<hr class="post-footer-links">
			<button type="button" class="button-readmore" id="button-readmore<?php echo $post["PostID"]; ?>" onclick="postExpander(<?php echo $post["PostID"]; ?>);" title="Credits"><span class="button-label">Credits</span></button>
			<button type="button" class="button-readmore" id="button-share<?php echo $post["PostID"]; ?>" title="Share">
				<span class="button-label">Share</span>
			</button>
			<button type="button" class="button-readmore" id="button-report<?php echo $post["PostID"]; ?>" title="Report">
				<span class="button-label">Report</span>
			</button>
		</div>
		<div class="movie-trivia" id="expander<?php echo $post["PostID"]; ?>">
			<div class="post-film-credits" id="post-film-credits<?php echo $post["PostID"];?>">
				<div class="left">
					<?php if ($post["Director"] != "") { ?>
				<p>
					<span class="post-expander-header"><?php echo $director; ?></span>
				</p>
				<p>
					<?php
					$names = explode(", ", $post["Director"]);
					foreach ($names as $name2) {
						$link = str_replace(" ", "+", $name2);
						echo "<a href=\"/?name=$link\">$name2</a>";
					}
					?>
				</p>
				<?php } ?>
				<?php if ($post["Producer"] != "") { ?>
				<p>
					<span class="post-expander-header"><?php echo $producer; ?></span>
				</p>
				<p>
					<?php
					$names = explode(", ", $post["Producer"]);
					foreach ($names as $name2) {
						$link = str_replace(" ", "+", $name2);
						echo "<a href=\"/?name=$link\">$name2</a>";
					}
					?>
				</p>
				<?php } ?>
				<?php if ($post["Screenplay"] != "") { ?>
				<p>
					<span class="post-expander-header">Screenplay</span>
				</p>
				<p>
					<?php
					$names = explode(", ", $post["Screenplay"]);
					foreach ($names as $name2) {
						$link = str_replace(" ", "+", $name2);
						echo "<a href=\"/?name=$link\">$name2</a>";
					}
					?>
				</p>
				<?php } ?>
				<?php if ($post["DoP"] != "") { ?>
				<p>
					<span class="post-expander-header">DoP</span>
				</p>
				<p>
					<?php
					$names = explode(", ", $post["DoP"]);
					foreach ($names as $name2) {
						$link = str_replace(" ", "+", $name2);
						echo "<a href=\"/?name=$link\">$name2</a>";
					}
					?>
				</p>
				<?php } ?>
				<?php if ($post["Cast"] != "") { ?>
				<p>
					<span class="post-expander-header">Cast</span>
				</p>
				<p>
					<?php
					$names = explode(", ", $post["Cast"]);
					foreach ($names as $name2) {
						$link = str_replace(" ", "+", $name2);
						echo "<a href=\"/?name=$link\">$name2</a>";
					}
					?>
				</p>
				<?php } ?>
				<?php if ($post["Year"] != "") { ?>
				<p>
					<span class="post-expander-header">Year</span>
				</p>
				<p>
					<?php echo $post["Year"]; ?>
				</p>
				<?php } ?>
				</div>
				<div class="right">
					<?php if ($post["Trivia"] != "") { ?>
				<p>
					<span class="post-expander-header">Trivia</span>
				</p>
				<p>
					<?php echo $post["Trivia"]; ?>
				</p>
				<?php } ?>
					<p>
					<span class="post-expander-header">Links</span>
					</p>
					<p>
						Link to IMDB or other...
					</p>
				</div>
			</div>
			<!--
			<div class="post-film-share" id="post-film-share<?php //echo $post["PostID"];?>">
				<div class="fb-like" data-href="http://dev.tinygiantz.com/?postid=<?php //echo $post["PostID"]; ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true">		</div>
				<div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://dev.tinygiantz.com/?postid=<?php //echo $post["PostID"]; ?>"></div>
				<div class="g-plus" data-action="share" data-annotation="none" data-href="http://dev.tinygiantz.com/?postid=<?php //echo $post["PostID"]; ?>"></div>
				<a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://dev.tinygiantz.com/?postid=<?php //echo $post["PostID"]; ?>">Tweet</a>
			</div>
			-->
		</div>
	</div>
</div>