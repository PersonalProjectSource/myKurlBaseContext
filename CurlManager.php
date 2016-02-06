<?php

require_once('CurlBaseContext.php');

Class CurlManager extends CurlBaseContext {

	private $curlId;
	private $curlResource;
	private $curlOptions;
	private $url;

	public static $curlsTab = ['curl1Index', 'curlTest'];

	public function __construct() {
		$this->curlResource = curl_init();
		echo "Construction de l'id \n";
		$this->curlId = $this->createUniqId();
		// pour le mode bouchon
		$this->debugConstructor();
	}

	// public function test() {
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.google.fr/?gfe_rd=cr&ei=Bs61VoP6DvDt8wfbwrHoDw');
	// 	// curl_setopt($ch, CURLOPT_URL, 'https://openid.etna-alternance.net/?referer=https%3A%2F%2Fintra.etna-alternance.net');
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$res = curl_exec($ch);

	// 	// $pattern = '/\<form .* \</form\>/';
	// 	// $pattern = '#<a.* href="(.+)">(.+)</.*>#';
	// 	$pattern = '#<a.* href="(.+)">.+</a>#i';
	// 	preg_match_all($pattern, $res, $matches);
	// 	// echo($res);
	// 	var_dump($matches[1]);
	// }


	/**
	*
	*/
	public function sendGetRequest() {

	}

	/**
	*
	*/
	public function sendPostRequest() {

	}

	/**
	*
	*/
	public function sendPutRequest() {

	}

	private function createUniqId() {
		// Verification du tableau des id curls
		// S'il n'est pas vide on prendra le dernier indice -1 pour l'affection du l'id.
		if (count(self::$curlsTab) > 0) {
			$this->curlId = count(self::$curlsTab) +1;
			// echo "test attribut de class : ". $this->curlId."\n";
		}

		return $this->curlId;
	}


	private function addCurlOptions($opt) {
		echo "ajout d'une option\n";
	}


	private function deleteCurlOptions($opt) {
		echo "suppression d'une option\n";
	}

	/**
	*	Display all curl caracterisitiques.
	*/
	public function showCurlResource() {
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

	public function debugConstructor() {
		$this->url = "http://myscope.local/app_dev.php";
		// for test.
		$this->curlOptions = array(
	      CURLOPT_URL            => $this->url, // Url cible (l'url la page que vous voulez télécharger)
	      CURLOPT_RETURNTRANSFER => true, // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
	      CURLOPT_NOBODY 		 => false,
	      CURLOPT_HEADER         => false // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
		);
	}
}