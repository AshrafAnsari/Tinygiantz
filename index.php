<?php
//Loads the main functions which are used on the site.
require "functions/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	// Loads the header meta data.
	require "includes/head-meta.php";
	?>
</head>
<body class="preload">
	<?php
	// Loads the body top scripts.
	require "includes/body-top-scripts.php";
	// Loads the header navigation.
	require "includes/header-navigation.php";
	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}
	elseif ($_GET["search"] != "" || $_GET["page"] == "search") {
		// Loads the search page.
		require "includes/search.php";
	}
	elseif ($_GET["page"] != "" && !is_numeric($_GET["page"])) {
		// Loads the page loading template.
		require "includes/page.php";
	}
	else {
		// Loads the database queries which are used for the dynamic navigation links.
		require "includes/queries.php";
		// Loads the page sidebar.
		//require "includes/sidebar.php";
		?>
		<div class="page-content-container">
		<?php
		// Shows a single film post if a specific post id is requested.
		if ($post_id != "") {
			// Loads the film post if the request returns any record.
			if (mysqli_num_rows($sqlResultSinglePage) > 0) {
				if ($pageNumberPreviousTitle != "") {
					$footer_navigation_previous = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberPreviousSingle\" title=\"Go to previous film\">$pageNumberPreviousTitle</a>";	
				}
				if ($pageNumberNextTitle != "") {
					$footer_navigation_next = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberNextSingle\" title=\"Go to next film\">$pageNumberNextTitle</a>";	
				}
				while ($post = mysqli_fetch_assoc($sqlResultSinglePage)) {
					// Loads the film post template.
					require "includes/film-post.php";
				}
				// Loads the main page navigation footer for this single film post.
				mainFooter("single", $pageIndexCurrent, $totalPagesSingle, $pageNumberCurrent, $totalPagesMulti, $footer_navigation_previous, $footer_navigation_next);
			}
			// Does something else if the request doesn't return any record.
			else {}
		}
		// Shows multiple film posts if no specific post id is requested.
		else {
			// Loads the film posts if the request returns any records.
			if (mysqli_num_rows($sqlResultMultiPage) > 0) {
				if ($name) {
					echo "<div class=\"name-result-title\">Showing films where $name is credited.</div>";
				}
				$post_count = 0;
				while ($post = mysqli_fetch_assoc($sqlResultMultiPage)) {
					// Loads the film post template.
					require "includes/film-post.php";
					array_push($listed_films, $post["PostID"]);
					$post_count++;
					if ($post_count == 5) {
						// Loads the horizontal banner advertisement on the main page.
						advertisement("main", $debug);
					}
				}
				$navigation_query;
				if ($category != "") {
					$category_href = "category=" . $category . "&";
					$navigation_query .= $category_href;
				}
				if ($length != "") {
					$length_href = "length=" . $length . "&";
					$navigation_query .= $length_href;
				}
				if ($name != "") {
					$name_href = "name=" . $name . "&";
					$navigation_query .= $name_href;
				}
				if ($pageNumberCurrent != "1") {
					$footer_navigation_previous = "<a class=\"footer-navigation-link\" href=\"/?" . $navigation_query . "page=" . $pageNumberPreviousMulti . "\" title=\"Go to page " . $pageNumberPreviousMulti ."\">Previous page</a>";
				}
				if ($pageNumberCurrent != $totalPagesMulti) {
					$footer_navigation_next = "<a class=\"footer-navigation-link\" href=\"/?" . $navigation_query . "page=" . $pageNumberNextMulti . "\" title=\"Go to page " . $pageNumberNextMulti . "\">Next page</a>";
				}
				// Loads the main page navigation footer for this list of multiple film posts.
				mainFooter("multi", $pageIndexCurrent, $totalPagesSingle, $pageNumberCurrent, $totalPagesMulti, $footer_navigation_previous, $footer_navigation_next);
				}
				// Does something else if the request doesn't return any records.
				else {}
			}
		?>
		</div>
		<?php
		// Loads the page sidebar.
		require "includes/sidebar.php";
		}
	// Loads the body top scripts.
	require "includes/body-bottom-scripts.php";
	//Closes the connection to the database after the page is loaded.
	mysqli_close($connection);
	?>
</body>
</html>