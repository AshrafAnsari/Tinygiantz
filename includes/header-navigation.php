<?php
$header_category = array("action", "animation", "comedy", "documentary", "drama", "suspense");
$header_length = array("0-5", "5-15", "15-30", "30-60");
$header_title = "Tinygiantz";
sort($header_category);

?>
<header id="header">
  <div id="title">
    <a id="title-link" href="/"><?php echo $header_title; ?></a>
  </div>
  <div id="header-navigation">
    <ul>
    <?php for($i = 0; $i < count($header_category); $i++){       
    if($header_category[$i] == $category){
      $header_category_class = "header-link-active";
    }
    else {
      $header_category_class = "header-link-inactive";
    }
    ?>
    <li class="header-navigation-category" id="header-navigation-action">
      <a class="<?php echo $header_category_class; ?>" href="/?category=<?php echo $header_category[$i]; ?>"><?php echo $header_category[$i]; ?></a>
      <div class="header-time-selection">
        <ul>
          <?php for($j = 0; $j < count($header_length); $j++){
          if($header_category[$i] == $category && $header_length[$j] == $length){
            $header_length_class = "header-link-active";
          }
          else {
            $header_length_class = "header-link-inactive";
          }
          ?>
          <li><a class="<?php echo $header_length_class; ?>" href="/?category=<?php echo $header_category[$i]; ?>&length=<?php echo $header_length[$j]; ?>"><?php echo $header_length[$j]; ?> MIN</a></li>
          <?php } ?>
        </ul>
      </div>
    </li>
    <?php } ?>
    </ul>
  </div>
</header>