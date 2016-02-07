<?php

require_once('ICurl.php');

abstract class CurlBaseContext implements ICurl {

	protected $curlId;
	protected $curlResource;
	protected $curlOptions;
	protected $url;

	public static $curlsTab = ['curl1Index', 'curlTest'];

	public abstract function sendGetRequest($url);
	public abstract function sendPostRequest($url, array $params = array());
	public abstract function sendPutRequest();
	public abstract function sendPatchRequest();

	public function __construct() {
		$this->curlResource = curl_init();
		echo "Construction de l'id \n";
		$this->curlId = $this->createUniqId();
		// pour le mode bouchon
		$this->debugConstructor();
	}

	/**
	*	Display all curl caracterisitiques.
	*/
	public function introduce() {
		$displayed = "";
		$displayed .= "id_ressource : ".$this->curlId."\n";
		if (!empty($this->curlOptions)) {
			foreach ($this->curlOptions as $keyOpt => $option) {
				$displayed .= $keyOpt." => ".$option."\n";
			}
		} else {
			$displayed .= "No options\n";
		}
		echo $displayed."\n";
	}

	/**
	*	Gere la comunication Curl
	*/
	public function sendRequest($options = null, $debug = false) {

		$CURL = curl_init();
		// --- Configuration des options de téléchargement ---
		if (null != $options) {
			curl_setopt_array($CURL, $options);
			// --- Exécution de la requête et affectation du résultat dans la variable $content ---
			$response = curl_exec($CURL);
		} else {
			echo "Aucune options pour la requete n'a été précisée";
		}
		// --- Affiche le contenu vers le sortie standard pour le mode debug ---
		if (true == $debug) {
			echo $response;
		}
		// --- Fermeture de la session cURL ---
		curl_close($CURL);

		return $response;
	}

	private function addCurlOptions($curl, $opt) {
		echo "ajout d'une option\n";
		curl_setopt($curl, $opt, $value);

		return $curl;
	}


	private function deleteCurlOptions($opt) {
		echo "suppression d'une option\n";
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

	public function debugConstructor() {
		$this->url = "http://myscope.local/app_dev.php";
		// for test.
		$this->curlOptions = array(
	      CURLOPT_URL            => $this->url, 
	      CURLOPT_RETURNTRANSFER => true, 
	      CURLOPT_NOBODY 		 => false,
	      CURLOPT_HEADER         => false
		);
	}

	public function debugClass() {

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
}
	