<?php
session_start();
require_once __DIR__ . "/assets/facebook-sdk/src/Facebook/autoload.php";
$fb_config = parse_ini_file("../../config.ini");
$fb = new Facebook\Facebook([
  "app_id" => $fb_config["id"],
  "app_secret" => $fb_config["secret"],
  "default_graph_version" => $fb_config["version"],
]);
$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  exit;
}
if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
  } else {
    header('HTTP/1.0 400 Bad Request');
  }
  exit;
}
$oAuth2Client = $fb->getOAuth2Client();
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
$fb->setDefaultAccessToken($accessToken);
try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  exit;
}
if (in_array($userNode->getId(),$fb_config["user"])) {
  $_SESSION["user_id"] = $userNode->getId();
  $_SESSION["user_name"] = $userNode->getName();
  $_SESSION["expire"] = time();
  header("Location: http://dev.tinygiantz.com/admin/main.php?page=edit");
  exit;  
}
else {
  header("Location: http://dev.tinygiantz.com/admin/?authorized=false&name={$userNode->getName()}");
  exit;
}
?>