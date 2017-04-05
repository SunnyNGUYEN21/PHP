<?php
$base -> deconnexion($_SESSION['user']);
header("location:index.php?page=".$_GET['url']."&message=deconnecte");
?>
