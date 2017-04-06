<?php
  function alert($classeAlert, $messageAlert){
    ?>
    <div class="alert alert-<?php echo $classeAlert; ?>">
      <strong><?php echo $messageAlert; ?></strong>
    </div>
    <?php
  }
  if(isset($_GET['message'])) /*&& $base->isMessage($_GET['message'])*/:
    //$message = $base->isMessage($_GET['message']);
    $message = $_GET['message'];
    switch($message){
      case "cle_securite_invalide":
        alert('danger', MESSAGE_CLE_SECURITE_INVALIDE);
      break;
      case "url_invalide":
        alert('danger', MESSAGE_URL_INVALIDE);
      break;
      case "connecte":
        if($_SESSION['logged']==true) alert('success', MESSAGE_CONNECTE);
      break;
      case "deconnecte":
        if(!isset($_SESSION['logged'])) alert('success', MESSAGE_DECONNECTE);
        break;
      case "pas_connecte":
        alert('danger', MESSAGE_PAS_CONNECTE);
        break;
      case "pas_deconnecte":
        alert('danger', MESSAGE_PAS_DECONNECTE);
        break;
      case "password_invalide":
        alert('danger', MESSAGE_PASSWORD_INVALIDE);
        break;
      case "image_modifiée":
        alert('success', MESSAGE_IMAGE_MODIFIEE);
        break;
      case "image_supprimée":
        alert('success', MESSAGE_IMAGE_SUPPRIMEE);
        break;
      case "image_ajoutée":
        alert('success', MESSAGE_IMAGE_AJOUTEE);
        break;
      case "image_deja_existante":
        alert('danger', MESSAGE_IMAGE_DEJA_EXISTANTE);
        break;
      case "ordre_déjà_utilisé":
        alert('danger', MESSAGE_ORDRE_DEJA_UTILISE);
        break;
      case "taille_trop_grande":
        alert('danger', MESSAGE_TAILLE_TROP_GRANDE);
        break;
      case "mauvais_format":
        alert('danger', MESSAGE_MAUVAIS_FORMAT);
        break;
      default :

    }
endif;
