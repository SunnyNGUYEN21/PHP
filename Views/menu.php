<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if(isset($_SESSION['user'])) { ?>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php?page=diaporama" >Diaporama d'images</a></li>
        <li><a href="index.php?page=galerie">Galerie d'images</a></li>
      </ul>
      <?php } ?>
      <div class="nav navbar-nav navbar-right">
<?php
if(!isset($_SESSION['user'])){
?>
          <form class="navbar-form navbar-left" name="monFormulaireLogin" id="monFormulaireLogin" method="POST" action="index.php?page=login">
          <input type="hidden" class="form-control" name="url" value="<?php echo $page ;?>"

          <div class="form-group<?php echo (isset($_GET['message']) && $_GET['message'] == "identifiant_invalide"?"has-error has-feedback":"");?>">
            <input type="text" class="form-control" name="identifiant" placeholder="<?php echo LABEL_IDENTIFIANT;?>">
          </div>
          <div class="form-group<?php echo (isset($_GET['message']) && $_GET['message'] == "password_invalide"?"has-error has-feedback":"");?>">
            <input type="password" class="form-control" name="password" placeholder="<?php echo LABEL_PASSWORD;?>">
          </div>
          <button type="submit" class="btn btn-default"><?php echo BOUTON_CONNEXION;?></button>
        </form>
        <?php }else{ ?>
          <div class="form-group<?php echo (isset($_GET['message']) && $_GET['message'] == "identifiant_invalide"?"has-error has-feedback":"");?>">
            <h3>Connecté avec  <?php echo $_SESSION['user']; ?></h3>
          </div>
          <button class="btn btn-default"><a href="index.php?page=deconnection&url=<?php echo $page; ?>"><?php echo BOUTON_DECONNEXION;?></a></button>
          <?php } ?>
      </div>
    </div>
  </div>
</nav>
