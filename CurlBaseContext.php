<?php

require_once('ICurl.php');

abstract class CurlBaseContext implements ICurl {

	public function testAbs() {
		echo "abs connection ok  !\n";
	}

	public function introduce() {
		echo "introduce CurlContext\n";
	}	

	/**
	*	Gere la comunication Curl
	*/
	public function sendCurlRequest($url) {
	
		// $url = "www.google.fr";
		$url = "http://myscope.local/app_dev.php";
		// Tableau contenant les options de téléchargement
		$options = array(
	      CURLOPT_URL            => $url, // Url cible (l'url la page que vous voulez télécharger)
	      CURLOPT_RETURNTRANSFER => true, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
	      CURLOPT_NOBODY 		 => false,
	      CURLOPT_HEADER         => false // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
		);

		// Création d'un nouvelle ressource cURL
		$CURL = curl_init();
		// Configuration des options de téléchargement
		curl_setopt_array($CURL, $options);
		// Exécution de la requête
		$content = curl_exec($CURL);      // Le contenu téléchargé est enregistré dans la variable $content. Libre à vous de l'afficher.
		echo $content;
		// Fermeture de la session cURL
		curl_close($CURL);
	}
}
	