<?php
$header_category = array("action", "animation", "comedy", "documentary", "drama", "suspense");
$header_length = array("0-5", "5-15", "15-30", "30-60");
$header_title = "Tinygiantz";
sort($header_category);
?>
<header id="header">
  <div id="title">
    <div class="abouttext">Bringing you the best and the most diverse short films from around the world</div>
    <a id="title-link" href="/" title="Go to the start page"><img id="menu-icon" src="/assets/pictures/icon_mobile_menu_small.png">&nbsp;<?php echo $header_title; ?></a>
    <div class="header-time-selection" id="title-submenu">
        <ul>
          <li><a href="/?page=search">SEARCH</a></li>
          <hr>
          <li><a href="/?page=about+us">ABOUT US</a></li>
          <li><a href="/?page=contact+us">CONTACT US</a></li>
          <li><a href="/?page=submit+a+film">SUBMIT A FILM</a></li>
          <hr>
          <li><a href="/?page=credited+names">CREDITED NAMES</a></li>
          <li><a href="/?page=release+years">RELEASE YEARS</a></li>
          <hr>
          <li><a href="http://www.tinygiantz.com/?format=rss">TINYGIANTZ RSS</a></li>
        </ul>
      </div>
  </div>
  <div id="header-navigation">
    <ul>
    <?php for ($i = 0; $i < count($header_category); $i++) {       
    if ($header_category[$i] == $category) {
      $header_category_class = "header-link-active";
    }
    else {
      $header_category_class = "header-link-inactive";
    }
    ?>
    <li class="header-navigation-category" id="header-navigation-action">
      <a class="<?php echo $header_category_class; ?>" href="/?category=<?php echo $header_category[$i]; ?>" title="<?php echo numberOfFilms($date, $connection, $header_category[$i]); ?>"><?php echo $header_category[$i]; ?></a>
      <div class="header-time-selection">
        <ul>
          <?php for ($j = 0; $j < count($header_length); $j++) {
          if ($header_category[$i] == $category && $header_length[$j] == $length) {
            $header_length_class = "header-link-active";
          }
          else {
            $header_length_class = "header-link-inactive";
          }
          ?>
          <li><a class="<?php echo $header_length_class; ?>" href="/?category=<?php echo $header_category[$i]; ?>&length=<?php echo $header_length[$j]; ?>" title="<?php echo numberOfFilms($date, $connection, $header_category[$i],$header_length[$j]); ?>"><?php echo $header_length[$j]; ?> MIN</a></li>
          <?php } ?>
        </ul>
      </div>
    </li>
    <?php } ?>
    </ul>
  </div>
</header>