<?php
require_once(PATH_MODEL.'diaporama.php');
$diapos -> delete_Diapo($_POST['id']);
unlink(PATH_IMAGE.$_POST['nom']);
header("location:index.php?page=galerie&message=image_supprimée");
