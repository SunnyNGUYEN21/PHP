<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="Css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
    <header class="header">
        <section class="container">
            <div class = "row">
                <div class = "col-md-2 col-sm-2 col-xs-12">
                    <img src="<?php echo PATH_IMAGE.LOGO; ?>" alt="<?php echo DESCRIP_LOGO; ?>" class="img-circle" style="width:100%">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <h2><?php echo NOM_SITE; ?></h2>
                </div>
            </div>
        </section>
    </header>
    <!-- Menu -->
    <?php include (PATH_VIEWS.'menu.php'); ?>
    <?php require_once(PATH_VIEWS.'alert.php');?>
    <!-- Vue -->
