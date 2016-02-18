<?php
$listed_films = array();
if ($_GET["debug"] == "true") {
	$debug = true;
}
$date = date("Y-m-d", time());
$connection = connectDB();
$post_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET["postid"]));
$pageNumber = mysqli_real_escape_string($connection, htmlspecialchars($_GET["page"])) + 0;
$pageNumberCurrent = 0;
if (is_int($pageNumber)) {
  $pageNumberCurrent = $pageNumber;
  if ($pageNumber == 1 || $pageNumber == 0) {
    $pageNumber = 0;
    $pageNumberCurrent = 1;
  }
  else {
    $pageNumber = ($pageNumber * 10) - 10;
  }
}
else {
  $pageNumber = 0;
}
$pageNumberNextMulti = $pageNumberCurrent + 1;
$pageNumberPreviousMulti = $pageNumberCurrent - 1;
if ($pageNumberCurrent == 1) {
  $pageNumberPreviousMulti = 1;
}
$category = mysqli_real_escape_string($connection, htmlspecialchars($_GET["category"]));
$length = mysqli_real_escape_string($connection, htmlspecialchars($_GET["length"]));

function connectDB() { // Opens a connection to the database.
	$sql_config = parse_ini_file("../config.ini"); // Opens the configuration file for the databse connection.
	return mysqli_connect($sql_config["servername"], $sql_config["username"], $sql_config["password"], $sql_config["dbname"]);
}

function numberOfFilms($date, $connection, $category, $length){
	if ($length){
		$length =  "AND VideoLength = '$length'";
	}
	else {
		$length =  "";
	}
	$sql_query_films = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <= '$date' AND Category = '$category' $length";
  $sql_result_films = mysqli_query($connection, $sql_query_films);
	$sql_result_films_number = mysqli_num_rows($sql_result_films);
	if ($sql_result_films_number == 1) {
		$trail = "";
	}
	else {
		$trail = "s";
	}
	return $sql_result_films_number . " film$trail";
}

function featuredFilms($title, $limit, $date, $connection, $debug, $listed_films) { // Fetches the featured films from the databse which are then displayed in the page sidebar.
	if ($title == "film of the day") {
		$group = "1";
		$category = "";
		$order = "RAND()";
	}
	else {
		if ($title == "editor's picks") {
			$group = "2";
			$category = "AND Featured = 'Yes'";
		}
		if ($title == "new in action") {
			$group = "3";
			$category = "AND Category = 'Action'";
		}
		if ($title == "new in animation") {
			$group = "4";
			$category = "AND Category = 'Animation'";
		}
		if ($title == "new in comedy") {
			$group = "5";
			$category = "AND Category = 'comedy'";
			$limit = "0,3";
		}
		if ($title == "new in documentary") {
			$group = "6";
			$category = "AND Category = 'documentary'";
		}
		if ($title == "new in drama") {
			$group = "7";
			$category = "AND Category = 'drama'";
		}
		if ($title == "new in suspense") {
			$group = "8";
			$category = "AND Category = 'suspense'";
		}
		$order = "PublicationDate DESC, PublicationTime DESC, PostID ASC";
	}
	$query_exclude;
	if ($group > 2){
		foreach ($listed_films as $id) {
			$query_exclude .= "AND PostID != $id ";
		}	
	}
	$sql_query = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <= '$date' $category $query_exclude ORDER BY $order LIMIT $limit";
	$sql_result = mysqli_query($connection, $sql_query);
	?>
	<?php
	if (mysqli_num_rows($sql_result) > 0) {
		?>
		<div class="page-sidebar-divider-title"><?php echo strtoupper($title); ?></div>
		<?php
		while ($post = mysqli_fetch_assoc($sql_result)) {
			$last_period = strrpos($post["Picture"], ".");
			$image_format = substr($post["Picture"], $last_period);
			?>
			<div onmouseleave="featuredFilmMinimize(<?php echo $group . $post["PostID"]; ?>);" onmouseenter="featuredFilmExpand(<?php echo $group . $post["PostID"]; ?>);" class="filmoftheday-container" id="featured-film-container<?php echo $group . $post["PostID"]; ?>" title="Published on <?php echo $post["PublicationDate"]; ?> at <?php echo substr($post["PublicationTime"], 0, -3); ?> (CET)<?php if ($debug) { echo "&#10;Tinygiantz ID: " . $post["PostID"] . "&#10;" . $post["VideoHost"] . " ID: " . $post["VideoID"] ; }?>">
				<a href="/?postid=<?php echo $post["PostID"]; ?>" class="featured-film-picture-container" style="background: url(assets/pictures/posts/<?php echo $post["PostID"] . $image_format; ?>);background-position: center;background-size: cover;background-repeat: no-repeat;">
					<div class="featured-film-title">
						<?php echo $post["Title"]; ?>
					</div>
				</a>
				<div class="featured-film-description" id="featured-film-description<?php echo $group . $post["PostID"]; ?>">
				<?php echo "" . $post["Description"] . ""; ?>
				</div>		
			</div>
			<?php
		}
	}
}

function advertisement($type, $debug) { // Generates the code for the advertisement blocks.
	$client = "6481618540997253"; // The AdSense client id.
	if ($type == "sidebar") { // Include the code for AdSense sidebar advertisement.
		$id = "8569478923"; // The AdSense advertisement id.
		$width = "300"; // The AdSense advertisement block width.
		$height = "600"; // The AdSense advertisement block height.
	}
	elseif ($type == "main") { // Include the code for AdSense main advertisement.
		$id = "5175360524"; // The AdSense advertisement id.
		$width = "728"; // The AdSense advertisement block width.
		$height = "90"; // The AdSense advertisement block height.
	}
	?>
	<div id="advertisement-<?php echo $type; ?>"  title="This is an advertisement<?php if ($debug) { echo "&#10;AdSense ID: " . $id; } ?>">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
					 style="display:inline-block;width:<?php echo $width; ?>px;height:<?php echo $height; ?>px"
					 data-ad-client="ca-pub-<?php echo $client; ?>"
					 data-ad-slot="<?php echo $id; ?>"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<?php
}

function sidebarFooter(){ // Generates the sidebar footer.
?>
<div class="sidebar-footer-copyright-container" id="sidebar-footer-copyright-container">
	<div class="sidebar-footer-copyright">
		<p class="text-align-center">
		© 2014-<?php echo Date(Y); ?> <a href="http://dev.tinygiantz.com" title="Bringing you the best and the most diverse short films from around the world">TINYGIANTZ.COM</a>
		<br>
		All rights reserved.
		<br>
		Web design by <a href="mailto:contact@ashraf.se?subject=Tinygiantz" title="Send an email to Ashraf">Ashraf Ansari</a>
		</p>
	</div>
</div>
<?php
}

function mainFooter($type, $pageIndexCurrent, $totalPagesSingle, $pageNumberCurrent, $totalPagesMulti, $footer_navigation_previous, $footer_navigation_next) { // Generates the main page navigation footer.
	if ($type == "single") {
		$current = $pageIndexCurrent;
		$total = $totalPagesSingle;
	}
	if ($type == "multi") {
		$current = $pageNumberCurrent;
		$total = $totalPagesMulti;
	}
	?>
	<div class="footer-navigation">
		<table class="footer-navigation-table">
			<tr>
				<td class="footer-navigation-previous">
				<?php echo $footer_navigation_previous; ?>
				</td>
				<td class="footer-navigation-current">
				Page&nbsp;<?php echo $current; ?>&nbsp;of&nbsp;<?php echo $total; ?>
				</td>
				<td class="footer-navigation-next">
				<?php echo $footer_navigation_next; ?>
				</td>
			<tr>
		</table>
	</div>
	<?php
}

?>