<?php
require_once('header.php');
$diapositives = $diapos -> getImages();
//print_r($diapositives);
foreach($diapositives as $diapo){
  ?>
<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / <? echo strlen(diapo) ; ?></div>
    <img src="<?php echo PATH_IMAGE.$diapo[0] ; ?>" style="width:100%">
    <div class="text">Caption Text</div>
  </div>
  <?php
}
?>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
<?php
require_once('footer.php');
