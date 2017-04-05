<?php
  require_once(PATH_LIB.PATH_BDD.'bdd.php');
class Diapos extends BDD{
  function getImages($user){
    $req = $this -> executerRequete('SELECT Nom_Fichier, ImageID from Image where Info_Utilisateur = ? ORDER BY Ordre', array($user));
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
  function getDescription($id){
    $req = $this -> executerRequete('SELECT Titre, Description from image_description where ImageID = ?', array($id));
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  function getInfos($id){
    $req = $this -> executerRequete('SELECT Ordre, Nom_Fichier, Titre, Description FROM image, image_description WHERE image.imageID = ? AND image_description.imageID = ?', array($id, $id));
    $res  = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  function update_Diapo($id, $ordre, $titre, $description){
    $reqordre = $this -> executerRequete("SELECT Ordre from Image ORDER BY Ordre");
    $ordresBase = $reqordre->fetchAll(PDO::FETCH_ASSOC);
    foreach($ordresBase as $key => $ordreBase){
      if($ordreBase['Ordre'] == $ordre){
        $existe = 1;
      }
    }
    if($existe == 1){
      return 5;
    }else{
      $this -> executerRequete('UPDATE image SET Ordre = ? , Date_Modification = ? WHERE ImageID = ?', array($ordre, date('Y-m-d'), $id));
      $this -> executerRequete('UPDATE image_description SET Titre = ? , Description = ? WHERE ImageID = ?', array($titre, $description, $id));
      return 0;
    }
    }

function delete_Diapo($id){
  $this -> executerRequete('DELETE FROM image_description WHERE ImageID = ?', array($id));
  $this -> executerRequete('DELETE FROM image WHERE ImageID = ?', array($id));
}

function ajouter_Diapo($nom, $user){
  $reqordre = $this -> executerRequete("SELECT MAX(Ordre) FROM image");
	$ordre = $reqordre->fetch();
  $titre = explode(".", $nom);
  $req = $this -> executerRequete("SELECT ImageID FROM image WHERE Nom_Fichier = ?", array($nom));
  $exist = $req -> fetch();
  if($exist[0] == NULL){
    $this -> executerRequete('INSERT INTO image (Nom_Fichier, Ordre, Date_Creation, Info_Utilisateur) VALUES (? , ?, ?, ?)', array($nom, $ordre[0]+1  , date('Y-m-d'), $user));
    $this -> executerRequete('INSERT INTO image_description (Titre, Description) VALUES (?, ?)', array($titre[0], ""));
  }else{
    return false;
  }
  return true;
  }
}
?>
