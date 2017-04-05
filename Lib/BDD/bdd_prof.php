<?php
class BDD{
function __construct($host, $user, $pwd, $nombase){
  try{
    $bdd = new PDO('mysql:host='.$host.'; dbname='.$nombase, $user, $pwd);
    $bdd -> exec('SET NAMES utf-8');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
}

function executerRequete($sql, $params = null) {
try{
  if ($params == null) {
    $resultat = self::getBdd()->query($sql);// exécution directe
  }
  else {
    $resultat = self::getBdd()->prepare($sql);// requête préparée
    $resultat->execute($params);
  }
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
return $resultat;
}
}
 ?>
