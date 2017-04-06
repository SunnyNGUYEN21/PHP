<?php

echo "<pre>";
print_r($_POST);
print_r($_GET);
print_r($_SESSION);
echo "<pre>";
foreach($_POST as $cle=>$val){
  $$cle=$val;
}

if(!isset($url) || !$base->isAlpha($url) || !is_file(PATH_CONTROLLER.$url.".php")):
  header("location:index.php?page=".$url."&message=url_invalide");
  exit();
//elseif(!isset($secure_key) || !$bas->isAlpha($identifiant)):
  //header("location:".$url."-message-cle_securite_invalide");
  //exit();
elseif(!isset($identifiant) || !$base->isAlpha($identifiant)):
  header("location:index.php?page=".$url."&message=identifiant_invalide");
  exit();
elseif(!isset($password) || !$base->isPassword($password)):
  header("location:index.php?page=".$url."&message=password_invalide");
  exit();
elseif($identifiant != $user):
  header("location:index.php?page=".$url."&message=identifiant_invalide");
  exit();
elseif(!password_verify($password, $mdp)):
  header("location:index.php?page=".$url."&message=password_invalide");
  exit();
else:
  $base::login($identifiant);
  if($_SESSION['logged']==true) header("location:index.php?page=".$url."&message=connecte");
  else header("location:index.php?page=".$url."&message=pas_connecte");
endif;
//header('location:index.php?page='.$page);
