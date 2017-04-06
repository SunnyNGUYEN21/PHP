<?php
  require_once(PATH_LIB.PATH_BDD.'bdd.php');
class Diapos extends BDD{
  function getImages($user){
    $req = $this -> executerRequete('SELECT nom_fichier, id from image where information_utilisateur = ? ORDER BY ordre', array($user));
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
  function getDescription($id){
    $req = $this -> executerRequete('SELECT titre, description from image_description where id = ?', array($id));
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  function getInfos($id){
    $req = $this -> executerRequete('SELECT ordre, nom_fichier, titre, description FROM image, image_description WHERE image.id = ? AND image_description.id = ?', array($id, $id));
    $res  = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  function update_Diapo($id, $ordre, $titre, $description){
    $reqordre = $this -> executerRequete("SELECT ordre from image ORDER BY ordre");
    $ordresBase = $reqordre->fetchAll(PDO::FETCH_ASSOC);
    foreach($ordresBase as $key => $ordreBase){
      if($ordreBase['ordre'] == $ordre){
        $existe = 1;
      }
    }
    if($existe == 1){
      return 5;
    }else{
      $this -> executerRequete('UPDATE image SET ordre = ? , date_modification = ? WHERE id = ?', array($ordre, date('Y-m-d'), $id));
      $this -> executerRequete('UPDATE image_description SET titre = ? , description = ? WHERE id = ?', array($titre, $description, $id));
      return 0;
    }
    }

function delete_Diapo($id){
  $this -> executerRequete('DELETE FROM image_description WHERE id = ?', array($id));
  $this -> executerRequete('DELETE FROM image WHERE id = ?', array($id));
}

function ajouter_Diapo($nom, $user){
  $reqordre = $this -> executerRequete("SELECT MAX(ordre) FROM image");
	$ordre = $reqordre->fetch();
  $titre = explode(".", $nom);
  $req = $this -> executerRequete("SELECT id FROM image WHERE nom_fichier = ?", array($nom));
  $exist = $req -> fetch();
  if($exist[0] == NULL){
    $this -> executerRequete('INSERT INTO image (nom_fichier, ordre, date_creation, information_utilisateur) VALUES (? , ?, ?, ?)', array($nom, $ordre[0]+1  , date('Y-m-d'), $user));
    $this -> executerRequete('INSERT INTO image_description (titre, description) VALUES (?, ?)', array($titre[0], ""));
  }else{
    return false;
  }
  return true;
  }
}
?>
