<div id="post-edit-container">
  <table id="post-edit-container-buttons">
    <tr>
      <td class="buttons-left">
        <button class="post-edit-container-button">
        Check picture
        </button>
        <button class="post-edit-container-button" onclick="closeEditPost();">
        Check video
        </button>
      </td>
      <td class="buttons-right">
        <button class="post-edit-container-button">
        Save
        </button>  
        <button class="post-edit-container-button" onclick="closeEditPost();">
        Close
        </button>    
      </td>
    </tr>
  </table>
    <table id="post-edit-table">
    <tr>
      <th>YouTube or Vimeo link</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-videolink" type="text"></td>
    </tr>
    <tr>
      <th>Title</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-title" type="text"></td>
    </tr>
    <tr>
      <th>Description</th>
    </tr>
    <tr>
      <td><textarea class="post-edit-table-text" id="post-edit-table-input-description"></textarea></td>
    </tr>
    <tr>
      <th>Length</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-length" type="text"></td>
    </tr>
    <tr>
      <th>Category</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-category" type="text"></td>
    </tr>
    <tr>
      <th>Director</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-director" type="text"></td>
    </tr>
    <tr>
      <th>Producer</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-producer" type="text"></td>
    </tr>
    <tr>
      <th>Screenplay</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-screenplay" type="text"></td>
    </tr>
    <tr>
      <th>DoP</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-dop" type="text"></td>
    </tr>
    <tr>
      <th>Cast</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-cast" type="text"></td>
    </tr>
    <tr>
      <th>Year</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-year" type="text"></td>
    </tr>
    <tr>
      <th>Trivia</th>
    </tr>
    <tr>
      <td><textarea class="post-edit-table-text" id="post-edit-table-input-trivia"></textarea></td>
    </tr>
    <tr>
      <th>Link</th>
    </tr>
    <tr>
      <td><input class="post-edit-table-input" id="post-edit-table-input-link" type="text"></td>
    </tr>
  </table>
</div>
<input id="edit-filter" type="text" oninput="filter()" placeholder="Search...">
<?php
require "includes/session.php";
$query = "SELECT * FROM Films ORDER BY PublicationDate DESC";
$query = mysqli_query($connection, $query);
echo "<table id=\"edit-table\">";
echo "<tr><th class=\"post-title-header\">Title</th><th class=\"post-id-header\">ID</th><th class=\"post-status-header\">Status</th><th class=\"post-date-header\">Date</th><th class=\"post-puiblisher-header\">Publisher</th></tr>";
while($result = mysqli_fetch_assoc($query)){
  echo "<tr onclick=\"editPost({$result["PostID"]});\">";
  echo "<td class=\"post-title\">";
  echo $result["Title"];
  echo "</td>";
  echo "<td class=\"post-id\">";
  echo $result["PostID"];
  echo "</td>";
  echo "<td class=\"post-status\">";
  echo $result["PostStatus"];
  echo "</td>";
  echo "<td class=\"post-date\">";
  echo $result["PublicationDate"];
  echo "</td>";
  echo "<td class=\"post-puiblisher\">";
  echo $result["Publisher"];
  echo "</td>";
  echo "</tr>";
}
echo "</table>";
?>
<script src="scripts/scripts.js"></script>