<?php
require "includes/session.php";
require "includes/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/head.php"; ?>
</head>
<body>
  <div id="header">
    <div id="idle-alert">
    </div>
    <table>
      <tr>
        <td class="user-name" id="user-name">
          <?php echo $_SESSION["user_name"]; ?>
        </td>
        <td class="menu-link">
          <ul id="menu">
            <li>
              <a href="?page=new">New post</a>
            </li>
            <li>
              <a href="?page=edit">Edit post</a>  
            </li>
            <li>
              <a onclick="logOut();return false;" href="/admin/?logout=true&name=<?php echo $_SESSION["user_name"] ?>">Log out</a>  
            </li>
          </ul>
        </td>
        <td  class="menu-time">
          <span id="menu-date"></span> <span id="menu-time"></span>    
        </td>
      </tr>
    </table>
  </div>
  <?
  $page = $_GET["page"];
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  else {
    if ($page) {
      echo "<div id=\"main-container\">";
      include "$page.php";
      echo "</div>";
    }
  } 
  ?>
</body>
<script src="scripts/scripts.js"></script>
</html>