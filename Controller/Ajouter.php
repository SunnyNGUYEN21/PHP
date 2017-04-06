<?php


$target_dir = "Image/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    header("location:index.php?page=galerie&message=image_deja_existante");
    $uploadOk = 0;
}
 // Check file size
if ($_FILES["fichier"]["size"] > 500000) {
    header("location:index.php?page=galerie&message=taille_trop_grande");
    $uploadOk = 0;
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header("location:index.php?page=galerie&message=mauvais_format");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
else {
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
        if($_FILES['fichier'] == NULL){
          $page = "galerie";
        }else{
        if($diapos -> Ajouter($_FILES['fichier']['name'], $_SESSION['user']) != false){
          header("location:index.php?page=galerie&message=image_ajoutée");
        }else{
          header("location:index.php?page=galerie&message=image_deja_existante");
        }
        }

    } else {
        $page = "404";
    }
}
?>
