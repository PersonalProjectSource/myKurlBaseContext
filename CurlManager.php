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
	      CURLOPT_URL            => $url, 
	      CURLOPT_RETURNTRANSFER => true, 
	      CURLOPT_NOBODY 		 => false,
	      CURLOPT_HEADER         => false 
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
	      CURLOPT_URL        => $url, 
	      CURLOPT_POST       => true,
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
}