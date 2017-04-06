<?php
$diapos -> Supprimer($_POST['id']);
unlink(PATH_IMAGE.$_POST['nom']);
header("location:index.php?page=galerie&message=image_supprimée");
 ?>
