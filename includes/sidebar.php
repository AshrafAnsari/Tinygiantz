<div class="page-sidebar-container">
  <form action="/" method="get">
    <input type="search" class="search-box-input" name="search" value="" placeholder="Search" id="search-box-input" autocomplete="off">
    <input id="search-debug" type="hidden" name="" value="true">
  </form>
  <?php
  if ($post_id == "") {
    featuredFilms("film of the day", 1, $date, $connection, $debug, $listed_films);
    featuredFilms("editor's picks", 3, $date, $connection, $debug, $listed_films);
    advertisement("sidebar", $debug);
    featuredFilms("new in action", 3, $date, $connection, $debug, $listed_films);
    featuredFilms("new in animation", 3, $date, $connection, $debug, $listed_films);
    featuredFilms("new in comedy", 3, $date, $connection, $debug, $listed_films);
    featuredFilms("new in documentary", 3, $date, $connection, $debug, $listed_films);
    featuredFilms("new in drama", 3, $date, $connection, $debug, $listed_films);
    featuredFilms("new in suspense", 3, $date, $connection, $debug, $listed_films);
  }
  ?>
  <div id="footer-share">
    <div class="fb-like" data-href="http://dev.tinygiantz.com/?postid=<?php echo $post["PostID"]; ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
    <div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://dev.tinygiantz.com"></div>
    <div class="g-plus" data-action="share" data-annotation="none" data-href="http://dev.tinygiantz.com"></div>
    <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://dev.tinygiantz.com">Tweet</a>
  </div>
  <?php
  sidebarFooter();
  ?>
</div>