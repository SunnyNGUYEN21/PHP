<!-- Navbar -->
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
      <ul class="nav navbar-nav navbar-left">
	  <form class="navbar-form navbar-right" name='monFormulaireLogin' id='monFormulaireLogin' method="POST" action="index.php?page=login">
	  
	  <input type="hidden" class="form-control" name="url" value="<?php echo $page;?>">
	  
	  <div class="form-group<?php echo (isset($_GET['message']) && $_GET['message']=="identifiant_valide"? "has-error has-feedback":"");?>">
	  <input type="text" class="form-control" name="identifiant" placeholder="<?php echo LABEL_IDENTIFIANT;?>">
	  </div>
	  <div class="form-group<?php echo (isset($_GET['message']) && $_GET['message']=="password_invalide"? " has-error has-feedback":"");?>">
	  <input type="password" class="form-control" name="password" placeholder="<?php echo LABEL_PASSWORD;?>">
	  </div>
	  <button type="submit" class="btn btn-default"><?php echo BOUTON_CONNEXION;?></button>
	  </form>
	  
        <li><a href="#">WHO</a></li>
        <li><a href="#">WHAT</a></li>
        <li><a href="#">WHERE</a></li>
      </ul>
    </div>
  </div>
</nav>