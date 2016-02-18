<?php
$search_string = mysqli_real_escape_string($connection, htmlspecialchars($_GET["search"]));
$sql_search_query = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND (Title LIKE '%$search_string%' OR Description LIKE '%$search_string%' OR Director LIKE '%$search_string%' OR Producer LIKE '%$search_string%' OR Screenplay LIKE '%$search_string%' OR DoP LIKE '%$search_string%' OR Description LIKE '%$search_string%' OR Cast LIKE '%$search_string%' OR Description LIKE '%$search_string%' OR Year LIKE '%$search_string%' OR Trivia LIKE '%$search_string%') ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC";
$sql_search_result = mysqli_query($connection, $sql_search_query);
$sql_search_result_number = mysqli_num_rows($sql_search_result);
$sql_search_result_trail;
if ($sql_search_result_number != 1) {
  $sql_search_result_trail = "s";
}
?>
<div class="page-content-container">
  <div class="search-result-container">
    <div id="search-page-input">
      <form action="/" method="get">
	      <input type="search" class="search-box-input" name="search" value="" placeholder="Search" id="search-box-input" autocomplete="off">
				<input id="search-debug" type="hidden" name="" value="true">
	    </form>
    </div>
		<?php
		if ($_GET["page"] != "search") {
		?>
    <div class="search-result-number">
      Found <?php echo $sql_search_result_number . " film{$sql_search_result_trail} matching \"" . $search_string . "\"." ; ?>
    </div>
    <?php
		}
    while ($search_result = mysqli_fetch_assoc($sql_search_result)) {
			$last_period = strrpos($search_result["Picture"], ".");
			$image_format = substr($search_result["Picture"], $last_period);
    ?>
    <a class="search-result-item" href="/?postid=<?php echo $search_result["PostID"] ?>" title="Published on <?php echo $search_result["PublicationDate"]; ?> at <?php echo substr($search_result["PublicationTime"], 0, -3); ?> (CET)&#10;In <?php echo $search_result["Category"]; ?><?php if ($debug) { echo "&#10;Tinygiantz ID: " . $search_result["PostID"] . "&#10;" . $search_result["VideoHost"] . " ID: " . $search_result["VideoID"]; }?>">
      <div class="search-result-image" style="background: url(assets/pictures/posts/<?php echo $search_result["PostID"] . $image_format; ?>);background-position: center;background-size: cover;background-repeat: no-repeat;">
      </div>
      <div class="search-result-title">
        <?php echo $search_result["Title"]; ?>
      </div>
      <div class="search-result-description">
        <?php echo str_replace("<br>"," ",$search_result["Description"]); ?>
      </div>
    </a>
    <?php
    }
		if ($_GET["page"] != "search") {
    ?>
    <div class="search-result-number" id="search-result-number">
      Showing <span id="search-result-number-showing">10</span> of <span id="search-result-number-total"><?php echo $sql_search_result_number; ?></span> film<span id="search-result-trail"></span>.
    </div>
		</div>
		<button class="expand-search-results" id="expand-search-results" onclick="showMoreSearchResults();" title="Show the next 10 films">
			Show more films
		</button>
		<?php
		}
		?>
</div>