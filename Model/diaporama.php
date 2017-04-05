<?php
  require_once(PATH_LIB.PATH_BDD.'bdd.php');
class Diapos extends BDD{
  function getImages(){
    $req = $this -> executerRequete('SELECT Nom_Fichier from Image');
    $res = $req -> fetchAll();
    return $res;
  }

}

?>
