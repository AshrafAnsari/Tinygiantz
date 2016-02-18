<div class="page-content-container">
	<div class="subpage-container">
		<div class="subpage">
			<?php require "pages/" . str_replace(" ", "-", htmlspecialchars($_GET["page"])) . ".php"; ?>
		</div>
	</div>
</div>