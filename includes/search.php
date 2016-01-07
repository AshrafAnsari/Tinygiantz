<?php
$search_string = htmlspecialchars($_GET["search"]);
$sql_search_query = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND (Title LIKE '%$search_string%' OR Description LIKE '%$search_string%') ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC";
$sql_search_result = mysqli_query($connection, $sql_search_query);
?>
<div class="page-content-container">
  <div class="search-result-container">
  <?php
  while($search_result = mysqli_fetch_assoc($sql_search_result)) {
  ?>
  <a class="search-result-item" href="/?postid=<?php echo $search_result["PostID"] ?>">
    <div class="search-result-title">
      <?php echo $search_result["Title"]; ?>
    </div>
    <div class="search-result-description">
      <?php echo $search_result["Description"]; ?>
    </div>
  </a>
  <?php
  }
  ?>
  </div>
  <button class="expand-search-results" id="expand-search-results" onclick="showMoreSearchResults();">
    Show more resutls
  </button>
</div>