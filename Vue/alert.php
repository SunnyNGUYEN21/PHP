<?php
	function alert ($classAlert, $messageAlert)
	{
		?>
		<div class="alert alert-<?php echo $classeAlert; ?>">
			<strong><?php echo $messageAlert; ?></strong>
			</div>
			<?php
	}
	
	
	
	
	
if(isset($_GET['message']) && $base->isMessage($_ET['message']));
	$message = $base->isMessage($_GET['message']);
	switch($message) {
		switch ($message) {
			case "cle_securite_invalide":
			alert('danger' MESSAGE_CLE_SECURITE_IVALIDE);
			break;
			case "url_invalide":
			alert('danger' MESSAGE_URL_INVALIDE);
			break;
			case "connecte" :
				if($_SESSION['logged']==true) alert('success',MESSAGE_CONNECTE);
				break;
				case "deconnecte":
					if(!isset($_GET['logged'])) alert('success',MESSAGE_DECONNECTE):
				break;
				case "pas_connecte":
					alert('danger', MESSAGE_PAS_CONNECTE);
				break;
				case "pas_deconnecte":
					alert('danger'MESSAGE_PAS_DECONNECTE);
					break;
				case "password_invalide" :
					alert('danger',MESSAGE_PASSWORD_INVALIDE);
					break;
		}
	}