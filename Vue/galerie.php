<?php
require_once('header.php');

$images = $diapos -> getImages($user);
//print_r($images);
require_once('diaporama.php'); ?>
<h1> Modifier la galerie photo de ma page </h1><br>
<form class="form-inline" action='index.php?page=ajouter_Galerie' method="post" enctype="multipart/form-data">
  <input type="file" name="fichier" id="fichier" class="form-control">
  <button type="submit" class="btn btn-default">Ajouter</button>
</form>
<div class="table-responsive">
  <table class="table">
    <tr>
    <th></th>
    <th> Ordre des images</th>
    <th> Nom du fichier</th>
    <th> Titre de l'image</th>
    <th>Description de l'image</th>
    <th></th>
    <th></th>
</tr>


      <?php
      foreach ($images as $key => $image) {
        $descrip = $diapos -> getInfos($image['ImageID']);
        ?>
        <tr>
    <form action='index.php?page=modifier_Galerie' method='POST'>
      <td>
        <img src="<?php echo PATH_IMAGE.$descrip[0]['Nom_Fichier']; ?>" width=10%>
        <input type="hidden" id="id" name="id" value=<?php echo $image['ImageID']; ?>>
      </td>
  <td class="form-group">
    <input type="number" class="form-control" id="ordre" name="ordre" value="<?php echo $descrip[0]['Ordre']; ?>">
  </td>
  <td><?php echo $descrip[0]['Nom_Fichier']; ?></td>
  <td class="form-group">
    <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $descrip[0]['Titre']; ?>">
  </td>
  <td class="form-group">
      <textarea name="description" id="description" name="description"><?php echo isset($descrip[0]['Description']) ? $descrip[0]['Description'] : ""; ?></textarea>
  </td>
  <td>
    <button type="submit" class="btn btn-default">Modifier</button>
  </td>
</form>
  <td>
  <form action='index.php?page=supprimer_Galerie' method='post'>
    <input type="hidden" id="id" name="id" value=<?php echo $image['ImageID']; ?>>
    <input type="hidden" id="nom" name="nom" value=<?php echo $descrip[0]['Nom_Fichier']; ?>>
    <button type="submit" name="suppr" class="btn btn-default">Supprimer</button>
  </td>

</form>
</tr>
<?php } ?>

  </table>
</div>
<?php
require_once('footer.php');
