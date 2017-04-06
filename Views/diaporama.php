<?php
require_once('header.php');
$diapositives = $diapos -> getImages($user);
//print_r($diapositives);
$nbDiapo = count($diapositives);
$i = 1;
echo '<div class="slideshow-container">';
foreach($diapositives as $key => $diapo){
  ?>
  <div class="mySlides fade">
    <div class="numbertext"><?php echo $i; ?>/ <?php echo $nbDiapo ; ?></div>
    <img src="<?php echo PATH_IMAGE.$diapo['Nom_Fichier'] ; ?>" style="width:100%">
    <div class="text">
      <?php
    $descrip = $diapos -> getDescription($diapo['ImageID']);
    echo $descrip[0]['Description'];
    ?>
  </div>
  </div>
  <?php
  $i++;
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
?>
<script src=<?php echo PATH_SCRIPT."diapo.js";?>></script>
