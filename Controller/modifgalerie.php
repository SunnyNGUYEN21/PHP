<?php
require_once(PATH_MODEL.'diaporama.php');
$reussite = $diapos -> update_Diapo($_POST['id'], $_POST['ordre'], $_POST['titre'], $_POST['description']);
if($reussite == 5){
  header("location:index.php?page=galerie&message=ordre_déjà_utilisé");
}else{
  header("location:index.php?page=galerie&message=image_modifiée");
}
