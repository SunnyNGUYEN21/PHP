<?php
	abstract class BDD{

		// Objet PDO d'accès à la BD
		private static $bdd;

		// Exécute une requête SQL éventuellement paramétrée
		protected function executerRequete($sql, $params = null) {
			if ($params == null) {
				$resultat = self::getBdd()->query($sql);// exécution directe
			}
			else {
				$resultat = self::getBdd()->prepare($sql);// requête préparée
				$resultat->execute($params);
			}
			return $resultat;
		}

		private static function getBdd() {
			if(self::$bdd == null){
				require PATH_DEFINES.'config_bdd.php';
				self::$bdd = new PDO('mysql:host='.$BDD_host .';dbname='.$BDD_nombase ,$BDD_user,$BDD_mdp);
				self::$bdd->exec('SET NAMES utf8');
				self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			return self::$bdd;
		}

	}
?>
