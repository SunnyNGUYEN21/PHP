<?php
require_once('header.php');
$images = $diapos -> getImages($user);
?>
<p> Modifier la galerie photo de ma page </p>
<form action='index.php?page=Ajouter' method='POST' enctype = "multipart/form-data">
  <td>
    <input type="file" name="fichier" id="fichier">
    <button type="submit" class="btn btn-default" value="Ajouter">Ajouter</button>
  </td>

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
  <form action='index.php?page=Modifier' method='POST'>
      <td><img src="<?php echo PATH_IMAGE.$descrip[0]['Nom_Fichier']; ?>"</td>
  <td class="form-group">
    <input type="number" class="form-control" id="ordre" name="ordre" value="<?php echo $descrip[0]['Ordre'];?>">
  </td>
  <td> <?php echo $descrip[0]['Nom_Fichier'];?></td>
  <td class="form-group">
    <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $descrip[0]['Titre'];?>">
  </td>
  <td class="form-group">
      <textarea name="description" id="description"><?php echo $descrip[0]['Description'];?></textarea>
  </td>
  <td>
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $image['ImageID'];?>">
    <button type="submit" name="modif" class="btn btn-default">Modifier</button>
  </td>

</form>
<form action='index.php?page=Supprimer' method='POST'>
  <td>
    <input type="hidden" class"form-control" id="nom" name="nom" value="<?php echo $descrip[0]['Nom_Fichier']?>">
    <input type="hidden" class"form-control" id="id" name="id" value="<?php echo $image['ImageID'];?>">
    <button type="submit" name="suppr" class="btn btn-default">Supprimer</button>
  </td>
</form>
</tr>
<?php } ?>
  </table>
</div>
<?php
require_once('footer.php');
