<?php
if($diapos -> Modifier($_POST['id'], $_POST['ordre'], $_POST['titre'], $_POST['description']) == 5) {
  header("location:index.php?page=galerie&message=ordre_déjà_utilisé");
}
else {
  header("location:index.php?page=galerie&message=image_modifiée");
}

require_once(PATH_VIEWS.'galerie.php');

 ?>
