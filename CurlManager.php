<?php

require_once('CurlBaseContext.php');

Class CurlManager extends CurlBaseContext {

	const MODE_DEBUG = true;

	/**
	*	Effectue une requete GET.
	*	@Return : Le contenu de la page ciblée via l'url
	*/
	public function sendGetRequest($url) {
		echo "send du get\n";
		$options = array(
	      CURLOPT_URL            => $url, // Url cible (l'url la page que vous voulez télécharger)
	      CURLOPT_RETURNTRANSFER => true, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
	      CURLOPT_NOBODY 		 => false,
	      CURLOPT_HEADER         => false // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
		);
		$response = $this->sendRequest($options, self::MODE_DEBUG);

		return $response;
	}

	/**
	*	Effectue une requete POST.
	* 	@Return : Le contenu de la réponse
	*/
	public function sendPostRequest($url, array $params = array()) {
		echo "Send post request\n";
		$options = array(
	      CURLOPT_URL        => $url, // Url cible (l'url la page que vous voulez télécharger)
	      CURLOPT_POST       => 1, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
	      CURLOPT_POSTFIELDS => $params
		);
		$response = $this->sendRequest($options, self::MODE_DEBUG);

		return $response;
	}

	/**
	*
	*/
	public function sendPutRequest() {
		echo "send du put\n";
	}

	/**
	*
	*/
	public function sendPatchRequest() {
		echo "send du patch\n";
	}

	/**
	*	Display all curl caracterisitiques.
	*/
	public function introduce() {
		$displayed = "";
		$displayed .= "id_ressource : ".$this->curlId."\n";
		if (!empty($this->curlOptions)) {
			echo "pass-----";
			foreach ($this->curlOptions as $keyOpt => $option) {
				$displayed .= $keyOpt." => ".$option."\n";
			}
		} else {
			$displayed .= "No options\n";
		}
		echo $displayed."\n";
	}
}