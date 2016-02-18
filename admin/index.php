<!DOCTYPE html>
<html>
  <head>
  <?php include "includes/head.php"; ?>
  </head>
  <body>
  <?php
  session_start();
	$first_name = explode(" ", $_GET["name"]);
	$first_name = $first_name[0];
  require_once __DIR__ . "/assets/facebook-sdk/src/Facebook/autoload.php";
	$fb_config = parse_ini_file("../../config.ini");
  $fb = new Facebook\Facebook([
    "app_id" => $fb_config["id"],
    "app_secret" => $fb_config["secret"],
    "default_graph_version" => $fb_config["version"],
  ]);
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email'];
  $loginUrl = $helper->getReAuthenticationUrl('http://dev.tinygiantz.com/admin/login.php', $permissions);
  if($_GET["logout"] == true){
    session_unset();
    session_destroy();
		echo "<p id=\"logged-out\">Bye, $first_name! You have been logged out.<br>You may now close this window.</p>";
		echo "<p id=\"logged-out-back\"><a href=\"/admin\">Log in again</a></p>";
  }
	else {
  ?>
  <a id="login-button" href="<?php echo htmlspecialchars($loginUrl); ?>"><img src="assets/pictures/facebook-login-blue.png"></a>
	<?php
	}
	if ($_GET["authorized"] == "false") {
		echo "<p id=\"unathorized\">Sorry, $first_name. You are not authorized to log in.<br>Please log in with an authorized account.</p>";
	}
	if (!$_GET["authorized"] && !$_GET["logout"]) {
		echo "<p id=\"welcome-login\">Welcome to the administration panel for Tinygiantz.<br>You may log in with an authorized account.</p>";
	}
	?>
  </body>
</html>