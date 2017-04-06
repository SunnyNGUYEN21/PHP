<?php
  require_once(PATH_LIB.PATH_BDD.'bdd.php');
class Diapos extends BDD{
  function getImages($user){
    $req = $this -> executerRequete('SELECT Nom_Fichier, ImageID from Image where Info_Utilisateur = ?', array($user));
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

  function Modifier($id, $ordre, $titre, $description){
      $reqordre = $this -> executerRequete("SELECT Ordre from Image where ImageID != ? ORDER BY Ordre", array($id));
      $ordresBase = $reqordre->fetchAll(PDO::FETCH_ASSOC);
      $existe = 0;
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


  function Supprimer($id){
    $this -> executerRequete('DELETE FROM Image_description WHERE ImageID = ?', array($id));
    $this -> executerRequete('DELETE FROM Image WHERE ImageID = ?', array($id));
  }

  function Ajouter($nom, $user){
    $reqordre = $this -> executerRequete('SELECT MAX(Ordre) FROM image');
    $ordre = $reqordre -> fetch();
    $this -> executerRequete('INSERT INTO image (Nom_Fichier, Ordre, Date_Creation, Info_Utilisateur) VALUES (?, ?, ?, ?)', array($nom, $ordre[0]+1, date('Y-m-d'), $user));
    $this -> executerRequete('INSERT INTO image_description (Titre, Description) VALUES (?, ?)', array($nom, ""));
    return true;
  }
}
?>
